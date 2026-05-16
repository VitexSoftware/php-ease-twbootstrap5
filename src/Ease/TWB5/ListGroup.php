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
 * Bootstrap List Group.
 *
 * @see https://getbootstrap.com/docs/5.3/components/list-group/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class ListGroup extends UlTag
{
    /**
     * Bootstrap List Group.
     *
     * @param array<mixed>          $items      Simple array of items, or ['label' => 'url'] for linked items
     * @param bool                  $flush      Remove borders and rounded corners (.list-group-flush)
     * @param bool                  $numbered   Display numbered items (.list-group-numbered)
     * @param array<string, string> $properties Additional properties
     */
    public function __construct(
        array $items = [],
        bool $flush = false,
        bool $numbered = false,
        array $properties = []
    ) {
        parent::__construct(null, $properties);
        $this->addTagClass('list-group');

        if ($flush) {
            $this->addTagClass('list-group-flush');
        }

        if ($numbered) {
            $this->addTagClass('list-group-numbered');
        }

        foreach ($items as $key => $value) {
            if (is_string($key)) {
                $this->addListItem(new ATag($value, $key, ['class' => 'list-group-item list-group-item-action']));
            } else {
                $this->addListItem($value);
            }
        }
    }

    /**
     * Add one list-group item.
     *
     * @param mixed  $content Item content
     * @param string $color   primary|secondary|success|danger|warning|info|light|dark (empty = none)
     * @param bool   $active  Mark as active
     */
    public function addListItem($content, string $color = '', bool $active = false): LiTag
    {
        $liClass = 'list-group-item';

        if ($color) {
            $liClass .= ' list-group-item-'.$color;
        }

        if ($active) {
            $liClass .= ' active';
        }

        $item = new LiTag($content, ['class' => $liClass]);
        $this->addItem($item);

        return $item;
    }
}
