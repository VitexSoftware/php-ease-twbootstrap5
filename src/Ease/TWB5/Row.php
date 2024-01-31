<?php

/**
 * Twitter Bootrstap Row.
 *
 * @author    Vitex <vitex@hippy.cz>
 * @copyright 2009-2024 Vitex@hippy.cz (G)
 */

namespace Ease\TWB5;

class Row extends \Ease\Html\DivTag
{
    /**
     * Twitter Bootrstap Row.
     *
     * @see https://getbootstrap.com/docs/5.0/layout/grid/#row-columns
     *
     * @param mixed $content    Initial content
     * @param int   $rowCols    With "auto" you can give the columns their natural width.
     * @param array $properties Of Row Div
     */
    public function __construct($content = null, $rowCols = 0, $properties = [])
    {
        parent::__construct($content, $properties);
        $this->addTagClass('row');
        if ($rowCols) {
            $this->addTagClass('row-cols-' . $rowCols);
        }
    }

    /**
     * Add Column into Row.
     *
     * @link   http://getbootstrap.com/css/#grid
     *
     * @param int    $size       Velikost políčka 1 - 12
     * @param mixed  $content    Obsah políčka
     * @param string $target     Typ zařízení xs|sm|md|lg
     * @param array  $properties Další vlastnosti tagu
     *
     * @return Col Column contains $content
     */
    public function &addColumn(
        $size,
        $content = null,
        $target = 'md',
        $properties = []
    ) {
        $added = $this->addItem(new Col($size, $content, $target, $properties));

        return $added;
    }
}
