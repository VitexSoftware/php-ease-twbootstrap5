<?php

namespace Ease\TWB5;

use Ease\Html\DivTag;

/**
 * Twitter Bootrstap5 Alert.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2019-2024 info@vitexsoftware.cz (G)
 */
class Alert extends DivTag
{

    /**
     * Bootstrap5's Alert
     * @link https://getbootstrap.com/docs/5.0/components/alerts/
     *
     * @param string $type       success|info|warning|danger
     * @param mixed $content     to insert in
     * @param array $properties  additional
     */
    public function __construct($type, $content = null, $properties = [])
    {
        $properties['role'] = 'alert';
        parent::__construct($content, $properties);
        $this->addTagClass('alert alert-' . $type);
    }
}
