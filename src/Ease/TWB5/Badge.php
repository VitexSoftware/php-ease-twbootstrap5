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
 * Description of Badge.
 *
 * @author vitex
 */
class Badge extends \Ease\Html\SpanTag
{
    /**
     * Badge Compatibily Class.
     *
     * @param mixed  $content
     * @param string $type
     * @param array<string,string>  $properties
     */
    public function __construct($content = null, $type = 'default', array $properties = [])
    {
        parent::__construct($content, $properties);
        $this->addTagClass('badge bg-'.$type);
    }
}
