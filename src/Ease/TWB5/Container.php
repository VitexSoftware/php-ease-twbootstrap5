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
