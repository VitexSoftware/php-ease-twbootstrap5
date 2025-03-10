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

/**
 * Description of DropDown.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class NavItemDropDown extends \Ease\Html\LiTag
{
    private \Ease\Html\UlTag $dropdownMenu;

    /**
     * DropDown menu.
     *
     * @param string       $heading
     * @param array<mixed> $items
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
     * DropDown handle.
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
                'data-bs-toggle' => 'dropdown',
                'role' => 'button',
                'aria-expanded' => 'false'],
        );
        $handle->setTagID($heading);

        return $handle;
    }

    /**
     * add one DropDown item.
     *
     * @param string $label or empty for divider
     * @param string $url
     */
    public function addDropdownItem($label, $url): void
    {
        if (empty($label)) {
            $this->dropdownMenu->addItemSmart(new \Ease\Html\DivTag(
                null,
                ['class' => 'dropdown-divider'],
            ));
        } else {
            $this->dropdownMenu->addItemSmart(new \Ease\Html\ATag($url, $label, ['class' => 'dropdown-item']));
        }
    }

    public function finalize(): void
    {
        $this->addItem($this->dropdownMenu);
        parent::finalize();
    }
}
