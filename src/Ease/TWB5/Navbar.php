<?php

namespace Ease\TWB5;

use Ease\Document;
use Ease\Functions;
use Ease\Html\ATag;
use Ease\Html\ButtonTag;
use Ease\Html\DivTag;
use Ease\Html\LiTag;
use Ease\Html\NavTag;
use Ease\Html\SpanTag;
use Ease\Html\UlTag;
use Ease\TWB5\NavItemDropDown;
use Ease\TWB5\Part;

/**
 * Bootstrap5 NavBar.
 */
class Navbar extends NavTag {

    /**
     * Main menu content
     *
     * @var UlTag
     */
    public $leftContent = null;

    /**
     *
     * @var string
     */
    private $navBarName = 'nav';

    /**
     * Položky menu přidávané vpravo.
     *
     * @var UlTag
     */
    public $rightContent = null;

    /**
     * Brand link destination
     * 
     * @var string 
     */
    public $mainpage = '#';

    /**
     * App Menu
     *
     * @param string $brand
     * @param string $name
     * @param array  $properties
     */
    public function __construct($brand = null, $name = 'navbar',
            $properties = []) {
        if (is_array($properties) && array_key_exists('class', $properties)) {
            $originalClass = $properties['class'];
        } else {
            $originalClass = '';
        }

        $properties['class'] = trim('navbar ' . $originalClass);
        $this->navBarName = $name;

        parent::__construct([new ATag($this->mainpage, $brand, ['class' => 'navbar-brand']),
            $this->navBarToggler()], $properties);
        Part::twBootstrapize();

        $this->leftContent = new UlTag(null, ['class' => 'navbar-nav mr-auto']);
        $this->rightContent = new UlTag(null, ['class' => 'navbar-nav ml-auto']);
    }

    /**
     * Add new Menu Item into navbar
     * 
     * @param mixed   $content   to insert in menu
     * @param boolean $enabled   false give you gray nonclickable menu item
     * @param string  $placement "left" is default
     *
     * @return LiTag MenuItem added
     */
    public function addMenuItem($content, $enabled = true, $placement = 'left') {
        $contentClass[] = 'nav-item';
        if ($enabled === false) {
            $content->setTagProperties(['aria-disabled' => 'true', 'tabindex' => '-1']);
            $content->addTagClass('disabled');
        }

        switch (Functions::baseClassName($content)) {
            case 'ATag':
                $content->addTagClass('nav-link');
                if (basename(parse_url($content->getTagProperty('href'),
                                        PHP_URL_PATH)) == basename(Document::phpSelf())) {
                    $contentClass[] = 'active';
                }

                break;
            case 'Dropdown':
                $contentClass[] = 'dropdown';
                $content->addTagClass('nav-link');
                break;
        }

        $menuItem = new LiTag($content, ['class' => implode(' ', $contentClass)]);
        return $placement == 'left' ? $this->leftContent->addItem($menuItem) : $this->rightContent->addItem($menuItem);
    }

    /**
     * Add Dropdown menu to nav
     * 
     * @param string $label     submenu label
     * @param array  $items     ['url'=>'label','url2'=>'label2','divider1'=>'',...]
     * @param string $placement "left" is default
     * 
     * @return NavItemDropDown
     */
    public function addDropDownMenu($label, $items, $placement = 'left') {
        return $this->addMenuItem(new NavItemDropDown($label, $items), true, $placement);
    }

    /**
     * Navbar collapse helper
     * 
     * @return \Ease\Html\DivTag navbar collapse
     */
    public function navbarCollapse() {
        return new DivTag([$this->leftContent, $this->rightContent],
                ['class' => 'collapse navbar-collapse', 'id' => $this->navBarName . 'SupportedContent']);
    }

    /**
     * 
     */
    public function finalize() {
        $this->addItem($this->navbarCollapse());
        parent::finalize();
    }

    public function navBarToggler() {
        return new ButtonTag(new SpanTag(null,
                        ['class' => 'navbar-toggler-icon']),
                [
            'class' => 'navbar-toggler',
            'type' => 'button',
            'data-toggle' => 'collapse',
            'data-target' => '#' . $this->navBarName . 'SupportedContent',
            'aria-controls' => $this->navBarName . 'SupportedContent',
            'aria-expanded' => 'false',
            'aria-label' => _('Toggle navigation')]);
    }

}
