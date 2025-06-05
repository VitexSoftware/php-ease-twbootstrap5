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
 * Odkazové tlačítko twbootstrabu.
 *
 * @author    Vítězslav Dvořák <vitex@hippy.cz>
 * @copyright 2023 Vitex@vitexsoftware.cz (G)
 *
 * @see      https://getbootstrap.com/docs/5.3/components/buttons/ Buttons
 */
class LinkButton extends \Ease\Html\ATag
{
    /**
     * Bootstrap's Link Button.
     *
     * @param string                $href       link destination
     * @param mixed                 $contents   button content
     * @param string                $type       primary|info|success|warning|danger|inverse|link
     * @param array<string, string> $properties additional properties
     */
    public function __construct(
        $href,
        $contents = null,
        $type = null,
        $properties = []
    ) {
        if (isset($properties['class'])) {
            $class = ' '.$properties['class'];
        } else {
            $class = '';
        }

        if (null === $type) {
            $properties['class'] = 'btn btn-default';
        } else {
            $properties['class'] = 'btn btn-'.$type;
        }

        $properties['class'] .= $class;
        parent::__construct($href, $contents, $properties);
    }
}
