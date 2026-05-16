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

use Ease\Html\ATag;
use Ease\Html\LiTag;
use Ease\Html\UlTag;

/**
 * Bootstrap Nav — standalone navigation component.
 *
 * @see https://getbootstrap.com/docs/5.3/components/navs-tabs/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Nav extends UlTag
{
    /**
     * Bootstrap Nav.
     *
     * @param array<string, string> $items      ['Label' => 'url'] pairs
     * @param string                $style      tabs|pills (empty = plain nav)
     * @param bool                  $fill       Proportionally fill available width (.nav-fill)
     * @param bool                  $justified  Equal-width items (.nav-justified)
     * @param array<string, string> $properties Additional properties
     */
    public function __construct(
        array $items = [],
        string $style = '',
        bool $fill = false,
        bool $justified = false,
        array $properties = []
    ) {
        parent::__construct(null, $properties);
        $this->addTagClass('nav');

        if ($style) {
            $this->addTagClass('nav-'.$style);
        }

        if ($fill) {
            $this->addTagClass('nav-fill');
        }

        if ($justified) {
            $this->addTagClass('nav-justified');
        }

        foreach ($items as $label => $url) {
            $this->addNavItem($label, $url);
        }
    }

    /**
     * Add one nav item.
     *
     * @param string $label    Link text
     * @param string $url      Link destination
     * @param bool   $active   Mark as active
     * @param bool   $disabled Mark as disabled
     */
    public function addNavItem(string $label, string $url, bool $active = false, bool $disabled = false): LiTag
    {
        $aClass = 'nav-link';

        if ($active) {
            $aClass .= ' active';
        }

        if ($disabled) {
            $aClass .= ' disabled';
        }

        $aProps = ['class' => $aClass];

        if ($active) {
            $aProps['aria-current'] = 'page';
        }

        $link = new ATag($url, $label, $aProps);
        $item = new LiTag($link, ['class' => 'nav-item']);
        $this->addItem($item);

        return $item;
    }
}
