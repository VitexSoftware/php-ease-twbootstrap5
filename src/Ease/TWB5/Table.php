<?php

/**
 * Twitter Bootstrap5 Table class.
 *
 * @author Vitex <vitex@hippy.cz>
 */

namespace Ease\TWB5;

/**
 * Description of Table
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Table extends \Ease\Html\TableTag
{
    /**
     * TWB4 Table.
     *
     * @param mixed $content    tag content
     * @param array $properties table tag options
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct($properties, $content);
        $this->addTagClass('table');
    }
}
