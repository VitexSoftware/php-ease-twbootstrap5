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

use Ease\Html\ButtonTag;
use Ease\Html\DivTag;

/**
 * Bootstrap Collapse — togglable content panel.
 *
 * @see https://getbootstrap.com/docs/5.3/components/collapse/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Collapse extends DivTag
{
    private string $collapseId;

    /**
     * Bootstrap Collapse.
     *
     * @param string                $id         Unique collapse ID
     * @param mixed                 $content    Content shown when expanded
     * @param bool                  $show       Start in expanded state
     * @param array<string, string> $properties Additional properties for the collapse div
     */
    public function __construct(
        string $id,
        $content = null,
        bool $show = false,
        array $properties = []
    ) {
        parent::__construct($content, $properties);
        $this->addTagClass('collapse'.($show ? ' show' : ''));
        $this->setTagID($id);
        $this->collapseId = $id;
    }

    /**
     * Returns a button that toggles this collapse panel.
     *
     * @param mixed  $label Button label
     * @param string $type  primary|secondary|success|danger|warning|info|light|dark
     */
    public function triggerButton($label, string $type = 'primary'): ButtonTag
    {
        return new ButtonTag($label, [
            'class' => 'btn btn-'.$type,
            'data-bs-toggle' => 'collapse',
            'data-bs-target' => '#'.$this->collapseId,
            'aria-expanded' => 'false',
            'aria-controls' => $this->collapseId,
        ]);
    }
}
