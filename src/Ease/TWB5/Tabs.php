<?php

declare(strict_types=1);

/**
 * This file is part of the EaseTWB5 package
 *
 * https://github.com/VitexSoftware/php-ease-twbootstrap5/
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ease\TWB5;

use Ease\Html\DivTag;
use Ease\Html\UlTag;

/**
 * @see https://getbootstrap.com/docs/5.2/components/navs-tabs/#javascript-behavior
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Tabs extends \Ease\Container
{
    /**
     * Navbar Identification.
     */
    public string $id;
    private array $tabs = [];
    private string $activeTab = '';

    /**
     * @param array<mixed>          $tabs
     * @param array<string, string> $properties
     */
    public function __construct(array $tabs = [], array $properties = [])
    {
        parent::__construct(null, $properties);
        $this->tabs = $tabs;
        $this->id = \array_key_exists('id', $properties) ? $properties['id'] : \Ease\Functions::randomString();
    }

    /**
     * Add New Tab.
     *
     * @param string $label
     * @param mixed  $content to render in tab body
     * @param bool   $active  add as active tab
     */
    public function addTab($label, $content, $active = false)
    {
        $this->tabs[$label] = \Ease\Document::embedablize($content);

        if ($active === true) {
            $this->activeTab = $label;
        }

        return $this->tabs[$label];
    }

    /**
     * Convert Tab Name to ID.
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
     * Tabs Handles.
     *
     * @return UlTag
     */
    public function tabHandles()
    {
        $handles = new UlTag(null, ['class' => 'nav nav-tabs', 'role' => 'tablist']);

        foreach ($this->tabs as $tabName => $tabContent) {
            $id = $this->id.'-'.self::strToID($tabName);

            $properties = [
                'class' => 'nav-link',
                'id' => $id.'-tab',
                'data-bs-toggle' => 'tab',
                'data-bs-target' => '#'.$id,
                'role' => 'tab',
                'aria-controls' => $id,
                'aria-selected' => ($tabName === $this->activeTab) ? 'true' : 'false'];

            // Add data-url attribute for AJAX tabs
            if (is_array($tabContent) && isset($tabContent['ajax'])) {
                $properties['data-url'] = $tabContent['ajax'];
            }

            if ($tabName === $this->activeTab) {
                $properties['class'] .= ' active';
            }

            $handles->addItemSmart(new \Ease\Html\ButtonTag(
                $tabName,
                $properties,
            ), ['class' => 'nav-item', 'role' => 'presentation']);
        }

        $handles->setTagId($this->id);

        return $handles;
    }

    /**
     * Tabs Bodies.
     *
     * @return DivTag
     */
    public function tabBodies()
    {
        $body = new DivTag(null, ['class' => 'tab-content']);

        foreach ($this->tabs as $tabName => $tabContent) {
            $id = $this->id.'-'.self::strToID($tabName);
            
            // For AJAX tabs, create empty div that will be populated by JavaScript
            $content = (is_array($tabContent) && isset($tabContent['ajax'])) ? '' : $tabContent;
            
            $tab = $body->addItem(new DivTag(
                $content,
                [
                    'class' => 'tab-pane fade',
                    'id' => $id,
                    'role' => 'tabpanel',
                    'tabindex' => '0',
                    'aria-controlledby' => $id.'-tab',
                ],
            ));

            if ($tabName === $this->activeTab) {
                $tab->addTagClass('show active');
            }
        }

        return $body;
    }

    /**
     * Create new Dynamic Tab.
     *
     * @param string $tabName jméno a titulek tabu
     * @param string $tabUrl  where to obtain tab content
     * @param bool   $active  Má být tento tab aktivní ?
     *
     * @return \Ease\Html\DivTag odkaz na vložený obsah
     */
    public function &addAjaxTab($tabName, $tabUrl, $active = false)
    {
        $this->tabs[$tabName] = ['ajax' => $tabUrl];

        if ($active) {
            $this->activeTab = $tabName;
        }

        \Ease\WebPage::singleton()->addJavaScript(<<<'EOD'

document.addEventListener('DOMContentLoaded', function() {
    // Handle AJAX tabs with data-url attribute
    var tabButtons = document.querySelectorAll('#
EOD.$this->id.<<<'EOD'
 button[data-url]');
    
    function loadTabContent(button) {
        var url = button.getAttribute('data-url');
        var targetId = button.getAttribute('data-bs-target');
        var targetPane = document.querySelector(targetId);
        
        // Only load if pane is empty
        if (targetPane && targetPane.innerHTML.trim() === '') {
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    targetPane.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error loading tab content:', error);
                    targetPane.innerHTML = '<div class="alert alert-danger">Error loading content</div>';
                });
        }
    }
    
    tabButtons.forEach(function(button) {
        // Load content for initially active tab
        if (button.classList.contains('active')) {
            loadTabContent(button);
        }
        
        // Load content when tab is shown
        button.addEventListener('shown.bs.tab', function(e) {
            loadTabContent(this);
        });
    });
});

EOD);

        return $this->tabs[$tabName];
    }

    /**
     * Assembling.
     */
    public function finalize(): void
    {
        if (empty($this->activeTab) && $this->tabs) {
            $this->activeTab = key($this->tabs);
        }

        $this->addItem($this->tabHandles());
        $this->addItem($this->tabBodies());
        parent::finalize();
    }
}
