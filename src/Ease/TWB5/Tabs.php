<?php

namespace Ease\TWB5;

use Ease\Html\DivTag;
use Ease\Html\UlTag;

/**
 * @see https://getbootstrap.com/docs/4.3/components/navs/#javascript-behavior
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Tabs extends \Ease\Container
{
    /**
     *
     * @var array
     */
    private $tabs = [];

    /**
     *
     * @var string
     */
    private $activeTab = '';

    public $id;

    /**
     *
     * @param array $tabs
     * @param array $properties
     */
    public function __construct($tabs = [], $properties = [])
    {
        parent::__construct(null, $properties);
        $this->tabs = $tabs;
        $this->id = array_key_exists('id', $properties) ? $properties['id'] : \Ease\Functions::randomString();
    }

    /**
     * Add New Tab
     *
     * @param string  $label
     * @param mixed   $content to render in tab body
     * @param boolean $active add as active tab
     */
    public function addTab($label, $content, $active = false)
    {
        $this->tabs[$label] = \Ease\Document::embedablize($content) ;
        if ($active === true) {
            $this->activeTab = $label;
        }
        return $this->tabs[$label];
    }

    /**
     * Convert Tab Name to ID
     *
     * @param string $tabLabel
     *
     * @return string
     */
    public static function strToID($tabLabel)
    {
        return preg_replace('/[^A-Za-z0-9_\\-]/', '', $tabLabel);
    }

    /**
     * Tabs Handles
     *
     * @return UlTag
     */
    public function tabHandles()
    {
        $handles = new UlTag(null, ['class' => 'nav nav-tabs']);
        foreach ($this->tabs as $tabName => $tabContent) {
            $id = self::strToID($tabName);

            $properties = [
                'class' => 'nav-link',
                'id' => $id . '-tab',
                'data-toggle' => 'tab',
                'role' => 'tab',
                'aria-controls' => $id,
                'aria-selected' => strval($tabName == $this->activeTab)];

            if ($tabName == $this->activeTab) {
                $properties['class'] .= ' active';
            }

            $handles->addItemSmart(new \Ease\Html\ATag(
                '#' . $id,
                $tabName,
                $properties
            ), ['class' => 'nav-item']);
        }
        return $handles;
    }

    /**
     * Tabs Bodies
     *
     * @return DivTag
     */
    public function tabBodies()
    {
        $body = new DivTag(null, ['class' => 'tab-content']);
        foreach ($this->tabs as $tabName => $tabContent) {
            $id  = self::strToID($tabName);
            $tab = $body->addItem(new DivTag(
                $tabContent,
                ['class' => 'tab-pane fade', 'id' => $id, 'role' => 'tabpanel',
                'aria-controlledby' => $id . '-tab']
            ));
            if ($tabName == $this->activeTab) {
                $tab->addTagClass('show active');
            }
        }
        return $body;
    }

    /**
     * Create new Dynamic Tab
     *
     * @param string $tabName    jméno a titulek tabu
     * @param string $tabUrl     where to obtain tab content
     * @param bool   $active     Má být tento tab aktivní ?
     *
     * @return \Ease\Html\DivTag odkaz na vložený obsah
     */
    public function &addAjaxTab($tabName, $tabUrl, $active = false)
    {
        $this->tabs[$tabName] = ['ajax' => $tabUrl];
        if ($active) {
            $this->activeTab = $tabName;
        }
        \Ease\WebPage::singleton()->addJavaScript('
$(\'#' . $this->id . ' a\').click(function (e) {
    e.preventDefault();

    var url = $(this).attr("data-url");
    var href = this.hash;
    var pane = $(this);

    // ajax load from data-url
    $(href).load(url,function(result){
        pane.tab(\'show\');
    });
});
            
');
        return $this->tabs[$tabName];
    }

    /**
     * Assembling
     */
    public function finalize()
    {
        if (empty($this->activeTab)) {
            $this->activeTab = key($this->tabs);
        }

        $this->addItem($this->tabHandles());
        $this->addItem($this->tabBodies());
        parent::finalize();
    }
}
