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
use Ease\Html\SpanTag;

/**
 * Bootstrap Spinner loading indicator.
 *
 * @see https://getbootstrap.com/docs/5.3/components/spinners/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Spinner extends DivTag
{
    /**
     * Bootstrap Spinner.
     *
     * @param string                $type       border|grow
     * @param string                $color      primary|secondary|success|danger|warning|info|light|dark
     * @param string                $size       sm (empty = default)
     * @param string                $label      Visually hidden accessible label
     * @param array<string, string> $properties Additional properties
     */
    public function __construct(
        string $type = 'border',
        string $color = 'primary',
        string $size = '',
        string $label = 'Loading...',
        array $properties = []
    ) {
        $properties['role'] = 'status';
        parent::__construct(new SpanTag($label, ['class' => 'visually-hidden']), $properties);

        $spinnerClass = 'spinner-'.$type;

        if ($size) {
            $spinnerClass .= ' spinner-'.$type.'-'.$size;
        }

        if ($color) {
            $spinnerClass .= ' text-'.$color;
        }

        $this->addTagClass($spinnerClass);
    }
}
