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
 * Form submit button styled by Twitter Bootstrap.
 */
class SubmitButton extends \Ease\Html\ButtonTag
{
    /**
     * Odesílací tlačítko formuláře Twitter Bootstrapu.
     *
     * @param string $value      vracená hodnota
     * @param string $type       primary|info|success|warning|danger|inverse|link
     * @param mixed  $properties
     */
    public function __construct($value = null, $type = null, $properties = [])
    {
        if (null === $type) {
            $properties['class'] = 'btn';
        } else {
            $properties['class'] = 'btn btn-'.$type;
        }

        parent::__construct($value, $properties);
    }
}
