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

class Row extends \Ease\Html\DivTag
{
    /**
     * Twitter Bootstrap Row.
     *
     * @see https://getbootstrap.com/docs/5.0/layout/grid/#row-columns
     *
     * @param mixed $content    Initial content
     * @param int   $rowCols    with "auto" you can give the columns their natural width
     * @param array $properties Of Row Div
     */
    public function __construct($content = null, $rowCols = 0, $properties = [])
    {
        parent::__construct($content, $properties);
        $this->addTagClass('row');

        if ($rowCols) {
            $this->addTagClass('row-cols-'.$rowCols);
        }
    }

    /**
     * Add Column into Row.
     *
     * @see   http://getbootstrap.com/css/#grid
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
        $properties = [],
    ) {
        $added = $this->addItem(new Col($size, $content, $target, $properties));

        return $added;
    }
}
