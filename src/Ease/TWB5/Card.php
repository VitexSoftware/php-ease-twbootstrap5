<?php

namespace Ease\TWB5;

use Ease\Html\DivTag;

/**
 * Description of Card
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Card extends DivTag
{
    public function __construct($content = null, $properties = [])
    {
        if (is_array($properties) && array_key_exists('class', $properties)) {
            $properties['class'] = 'card ' . $properties['class'];
        } else {
            $properties['class'] = 'card';
        }
        parent::__construct($content, $properties);
    }
}
