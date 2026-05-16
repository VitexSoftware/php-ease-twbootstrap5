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
use Ease\Html\NavTag;
use Ease\Html\OlTag;

/**
 * Bootstrap Breadcrumb navigation.
 *
 * @see https://getbootstrap.com/docs/5.3/components/breadcrumb/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Breadcrumb extends NavTag
{
    private OlTag $list;

    /**
     * Bootstrap Breadcrumb.
     *
     * Accepts an ordered array of ['label' => 'url'] pairs. The last item is
     * automatically marked as the active (current) page and rendered without a link.
     *
     * @param array<string, string> $items      ['Label' => 'url', 'Current Page' => ''] pairs
     * @param string                $ariaLabel  Accessible label for the nav element
     * @param array<string, string> $properties Additional nav properties
     */
    public function __construct(
        array $items = [],
        string $ariaLabel = 'breadcrumb',
        array $properties = []
    ) {
        $properties['aria-label'] = $ariaLabel;
        parent::__construct(null, $properties);

        $this->list = new OlTag(null, ['class' => 'breadcrumb']);

        $keys = array_keys($items);
        $lastKey = end($keys);

        foreach ($items as $label => $url) {
            $this->addCrumb($label, $url, $label === $lastKey);
        }

        $this->addItem($this->list);
    }

    /**
     * Add one breadcrumb item.
     *
     * @param string $label  Display label
     * @param string $url    Link URL (ignored when $active is true)
     * @param bool   $active Mark as the current/active page
     */
    public function addCrumb(string $label, string $url = '', bool $active = false): LiTag
    {
        $liProps = ['class' => 'breadcrumb-item'.($active ? ' active' : '')];

        if ($active) {
            $liProps['aria-current'] = 'page';
            $item = new LiTag($label, $liProps);
        } else {
            $item = new LiTag(new ATag($url, $label), $liProps);
        }

        $this->list->addItem($item);

        return $item;
    }
}
