<?php

declare(strict_types=1);

/**
 * Badge
 *
 * @author     Vítězslav Dvořák <info@vitexsoftware.cz>
 * @copyright  2023 Vitex Software
 */

namespace Ease\TWB5;

/**
 * Description of Badge
 *
 * @author vitex
 */
class Badge extends \Ease\Html\DivTag
{
    /**
     * Badge Compatibily Class
     *
     * @param mixed  $content
     * @param string $type
     * @param array  $properties
     */
    public function __construct($content = null, $type = 'default', $properties = [])
    {
        parent::__construct($content, $properties);
        $this->addTagClass('bg-' . $type . ' rounded-pill');
    }
}
