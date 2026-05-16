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
 * Bootstrap Progress bar.
 *
 * @see https://getbootstrap.com/docs/5.3/components/progress/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Progress extends DivTag
{
    /**
     * Bootstrap Progress bar.
     *
     * @param int                   $value      Current value (0–100)
     * @param int                   $min        Minimum value
     * @param int                   $max        Maximum value
     * @param string                $color      primary|secondary|success|danger|warning|info|light|dark
     * @param bool                  $striped    Apply striped style
     * @param bool                  $animated   Animate the stripes (implies $striped)
     * @param mixed                 $label      Text label inside the bar (null = none)
     * @param array<string, string> $properties Additional wrapper div properties
     */
    public function __construct(
        int $value = 0,
        int $min = 0,
        int $max = 100,
        string $color = 'primary',
        bool $striped = false,
        bool $animated = false,
        $label = null,
        array $properties = []
    ) {
        parent::__construct(null, $properties);
        $this->addTagClass('progress');

        $pct = $max > $min ? round(($value - $min) / ($max - $min) * 100) : 0;

        $barClass = 'progress-bar';

        if ($color) {
            $barClass .= ' bg-'.$color;
        }

        if ($striped || $animated) {
            $barClass .= ' progress-bar-striped';
        }

        if ($animated) {
            $barClass .= ' progress-bar-animated';
        }

        $bar = new DivTag($label, [
            'class' => $barClass,
            'role' => 'progressbar',
            'style' => 'width: '.$pct.'%',
            'aria-valuenow' => (string) $value,
            'aria-valuemin' => (string) $min,
            'aria-valuemax' => (string) $max,
        ]);

        $this->addItem($bar);
    }
}
