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
 * Description of Card.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Card extends DivTag
{
    /**
     * Card Compatibily Class.
     *
     * @param mixed                 $content
     * @param array<string, string> $properties
     */
    public function __construct($content = null, array $properties = [])
    {
        if (\is_array($properties) && \array_key_exists('class', $properties)) {
            $properties['class'] = 'card '.$properties['class'];
        } else {
            $properties['class'] = 'card';
        }

        parent::__construct($content, $properties);
    }
}
