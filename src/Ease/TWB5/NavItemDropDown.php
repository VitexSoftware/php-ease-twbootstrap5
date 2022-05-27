<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ease\TWB5;

/**
 * Description of Dropdown
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class NavItemDropDown extends \Ease\Html\DivTag
{
    /**
     *
     * @var \Ease\Html\DivTag 
     */
    private $dropdownMenu = null;

    /**
     * Dropdown menu
     * 
     * @param string $heading
     * @param array  $items
     */
    public function __construct($heading, $items = [])
    {
        $properties['class'] = 'nav-item dropdown';
        $handle              = $this->handle($heading);
        parent::__construct($handle, $properties);

        $this->dropdownMenu = new \Ease\Html\DivTag(null,
            ['class' => 'dropdown-menu', 'aria-labelledby' => $handle->getTagID()]);

        if (!empty($items)) {
            foreach ($items as $url => $label) {
                $this->addDropdownItem($label, $url);
            }
        }
    }

    /**
     * Dropdown handle
     * 
     * @param string $heading
     * 
     * @return \Ease\Html\ATag
     */
    public function handle($heading)
    {
        $handle = new \Ease\Html\ATag('#', $heading,
            ['class' => 'nav-link dropdown-toggle', 'data-toggle' => 'dropdown',
            'role' => 'button', 'aria-haspopup' => 'true', 'aria-expanded' => 'false']);
        $handle->setTagID($heading);
        return $handle;
    }

    /**
     * add one dropdown item
     * 
     * @param string $label or empty for divider
     * @param string $url
     */
    public function addDropdownItem($label, $url)
    {
        if (empty($label)) {
            $this->dropdownMenu->addItem(new \Ease\Html\DivTag(null,
                    ['class' => 'dropdown-divider']));
        } else {
            $this->dropdownMenu->addItem(new \Ease\Html\ATag($url, $label,
                    ['class' => 'dropdown-item']));
        }
    }

    public function finalize()
    {
        $this->addItem($this->dropdownMenu);
    }
}
