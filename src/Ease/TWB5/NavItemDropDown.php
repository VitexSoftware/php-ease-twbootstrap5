<?php

namespace Ease\TWB5;

/**
 * Description of Dropdown
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class NavItemDropDown extends \Ease\Html\LiTag
{
    /**
     *
     * @var \Ease\Html\DivTag
     */
    private $dropdownMenu = null;

    /**
     * DropDown menu
     *
     * @param string $heading
     * @param array  $items
     */
    public function __construct($heading, $items = [])
    {
        $properties['class'] = 'nav-item dropdown';
        $handle = $this->handle($heading);
        parent::__construct(null, $properties);
        parent::addItem($handle);

        $this->dropdownMenu = new \Ease\Html\UlTag(null, ['class' => 'dropdown-menu']);

        if (!empty($items)) {
            foreach ($items as $url => $label) {
                $this->addDropdownItem($label, $url);
            }
        }
    }

    /**
     * DropDown handle
     *
     * @param string $heading
     *
     * @return \Ease\Html\ATag
     */
    public function handle($heading)
    {
        $handle = new \Ease\Html\ATag(
            '#',
            $heading,
            ['class' => 'nav-link dropdown-toggle',
            'role' => 'button',
            'data-bs-toggle' => 'dropdown',
            'role' => 'button',
            'aria-expanded' => 'false']
        );
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
            $this->dropdownMenu->addItem(new \Ease\Html\DivTag(
                null,
                ['class' => 'dropdown-divider']
            ));
        } else {
            $this->dropdownMenu->addItem(new \Ease\Html\ATag(
                $url,
                $label,
                ['class' => 'dropdown-item']
            ));
        }
    }

    public function finalize()
    {
        $this->addItem($this->dropdownMenu);
    }
}
