<?php

/**
 * Twitter Bootstrap Container.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2009-2024 vitex@hippy.cz (G)
 */

namespace Ease\TWB5;

class Container extends \Ease\Html\DivTag
{
    /**
     * Twitter Bootstrap5 Container.
     *
     * @param mixed $content
     * @param array $properties of Container Row
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct($content, $properties);
        $this->addTagClass('container');
    }
}
