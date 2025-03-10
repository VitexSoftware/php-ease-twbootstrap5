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
 * Twitter Bootstrap5 Alert.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2019-2024 info@vitexsoftware.cz (G)
 */
class Alert extends DivTag
{
    /**
     * Bootstrap5's Alert.
     *
     * @see https://getbootstrap.com/docs/5.3/components/alerts/
     *
     * @param string                $type                      success|info|warning|danger
     * @param mixed                 $content                   to insert in
     * @param array<string, string> $properties<string,string> additional
     */
    public function __construct(string $type, $content = null, $properties = [])
    {
        $properties['role'] = 'alert';
        parent::__construct($content, $properties);
        $this->addTagClass('alert alert-'.$type);
    }
}
