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

use Ease\Document;
use Ease\Functions;
use Ease\Html\ATag;
use Ease\Html\ButtonTag;
use Ease\Html\LiTag;
use Ease\Html\NavTag;
use Ease\Html\UlTag;

/**
 * Bootstrap5 NavBar.
 */
class Navbar extends NavTag
{
    /**
     * Main menu content.
     */
    public UlTag $leftContent;

    /**
     * Položky menu přidávané vpravo.
     */
    public UlTag $rightContent;

    /**
     * Brand link destination.
     */
    public string $mainpage = '#';
    private string $navBarName = 'nav';
    private \Ease\Html\DivTag $containerFluid;

    /**
     * App Menu.
     *
     * @param null|mixed $brand
     * @param mixed      $name
     * @param mixed      $properties
     */
    public function __construct($brand = null, $name = 'navbar', $properties = [])
    {
        if (\is_array($properties) && \array_key_exists('class', $properties)) {
            $originalClass = $properties['class'];
        } else {
            $originalClass = '';
        }

        $properties['class'] = trim('navbar '.$originalClass);
        $properties['role'] = 'navigation';
        $this->navBarName = $name;

        parent::__construct(null, $properties);
        Part::twBootstrapize();

        $this->leftContent = new UlTag(null, ['class' => 'navbar-nav ms-auto flex-nowrap navbar-expand mb-2 mb-lg-0', 'style' => '--bs-scroll-height: 100px;']);
        $this->rightContent = new UlTag(null, ['class' => 'navbar-nav ml-auto']); // TODO

        $this->containerFluid = $this->addItem(new \Ease\Html\DivTag([new ATag($this->mainpage, $brand, ['class' => 'navbar-brand']), $this->navBarToggler()], ['class' => 'container-fluid']));
    }

    /**
     * Add new Menu Item into NavBar.
     *
     * @param mixed  $content   to insert in menu
     * @param bool   $enabled   false give you gray NonClickable menu item
     * @param string $placement "left" is default
     *
     * @return LiTag MenuItem added
     */
    public function addMenuItem($content, $enabled = true, $placement = 'left')
    {
        $contentClass[] = 'nav-item';

        if ($enabled === false) {
            $content->setTagProperties(['aria-disabled' => 'true', 'tabindex' => '-1']);
            $content->addTagClass('disabled');
        }

        switch (Functions::baseClassName($content)) {
            case 'ATag':
                $content->addTagClass('nav-link');

                if (!empty($this->getTagProperty('href')) && strstr($this->getTagProperty('href'), '/') && basename(parse_url($content->getTagProperty('href'), \PHP_URL_PATH)) === basename(Document::phpSelf())) {
                    $contentClass[] = 'active';
                }

                break;
            case 'Dropdown':
                $contentClass[] = 'dropdown';
                $content->addTagClass('nav-link');

                break;
        }

        $menuItem = new LiTag($content, ['class' => implode(' ', $contentClass)]);

        return $placement === 'left' ? $this->leftContent->addItem($menuItem) : $this->rightContent->addItem($menuItem);
    }

    /**
     * Add DropDown menu to nav.
     *
     * @param string $label     SubMenu label
     * @param array  $items     ['url'=>'label','url2'=>'label2','divider1'=>'',...]
     * @param string $placement "left" is default
     *
     * @return NavItemDropDown
     */
    public function addDropDownMenu($label, $items, $placement = 'left')
    {
        return $this->addMenuItem(new NavItemDropDown($label, $items), true, $placement);
    }

    /**
     * NavBar collapse helper.
     *
     * @return \Ease\Html\DivTag NavBar collapse
     */
    public function navBarCollapse()
    {
        return new \Ease\Html\DivTag($this->leftContent, ['class' => 'collapse navbar-collapse', 'id' => $this->navBarName]);
    }

    /**
     * Finalize NavBar.
     */
    public function finalize(): void
    {
        $this->containerFluid->addItem($this->navbarCollapse());
        parent::finalize();
    }

    /**
     * NavBar Toggle.
     *
     * @return ButtonTag
     */
    public function navBarToggler()
    {
        return new \Ease\Html\ButtonTag(new \Ease\Html\SpanTag(null, ['class' => 'navbar-toggler-icon']), [
            'class' => 'navbar-toggler',
            'type' => 'button',
            'data-bs-toggle' => 'dropdown',
            'data-bs-target' => '#'.$this->navBarName,
            'aria-controls' => $this->navBarName,
            'aria-expanded' => 'false',
            'aria-label' => _('Toggle navigation'),
        ]);
    }

    /**
     * Search Form for NavBar.
     *
     * @param string $label
     * @param array  $formProperties
     */
    public function addSearchForm($label = 'Search', $formProperties = []): \Ease\TWB5\Form
    {
        $formProperties['role'] = 'search';
        $input = new \Ease\Html\InputTag('', '', ['class' => 'form-control me-2', 'type' => 'search', 'placeholder' => 'Search', 'aria-label' => $label]);
        $button = new \Ease\Html\ButtonTag($label, ['class' => 'btn btn-outline-success', 'type' => 'submit']);

        return $this->addItem(new \Ease\TWB5\Form($formProperties, ['class' => 'd-flex', 'role' => 'search'], [$input, $button]));
    }
}
