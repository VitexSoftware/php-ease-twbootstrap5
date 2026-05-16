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

/**
 * Bootstrap Button Group.
 *
 * @see https://getbootstrap.com/docs/5.3/components/button-group/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class ButtonGroup extends DivTag
{
    /**
     * Bootstrap Button Group.
     *
     * @param mixed                 $buttons    Button element(s) to include
     * @param string                $size       lg|sm (empty = default)
     * @param bool                  $vertical   Stack buttons vertically
     * @param string                $ariaLabel  Accessible group label
     * @param array<string, string> $properties Additional properties
     */
    public function __construct(
        $buttons = null,
        string $size = '',
        bool $vertical = false,
        string $ariaLabel = '',
        array $properties = []
    ) {
        $properties['role'] = 'group';

        if ($ariaLabel) {
            $properties['aria-label'] = $ariaLabel;
        }

        parent::__construct($buttons, $properties);

        $groupClass = $vertical ? 'btn-group-vertical' : 'btn-group';

        if ($size) {
            $groupClass .= ' btn-group-'.$size;
        }

        $this->addTagClass($groupClass);
    }
}
