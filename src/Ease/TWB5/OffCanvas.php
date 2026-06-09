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
use Ease\Html\H5Tag;

/**
 * Bootstrap Offcanvas slide-in panel.
 *
 * @see https://getbootstrap.com/docs/5.3/components/offcanvas/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class OffCanvas extends DivTag
{
    public DivTag $header;
    public DivTag $body;

    /**
     * Bootstrap Offcanvas.
     *
     * @param string                $id          Unique offcanvas ID
     * @param mixed                 $title       Header title
     * @param mixed                 $bodyContent Offcanvas body content
     * @param string                $placement   start|end|top|bottom
     * @param array<string, string> $properties  Additional offcanvas div properties
     */
    public function __construct(
        string $id,
        $title = null,
        $bodyContent = null,
        string $placement = 'start',
        array $properties = []
    ) {
        parent::__construct(null, array_merge([
            'tabindex' => '-1',
            'aria-labelledby' => $id.'Label',
        ], $properties));
        $this->addTagClass('offcanvas offcanvas-'.$placement);
        $this->setTagID($id);

        $this->header = new DivTag([
            new H5Tag($title, ['class' => 'offcanvas-title', 'id' => $id.'Label']),
            new ButtonTag('', ['class' => 'btn-close', 'data-bs-dismiss' => 'offcanvas', 'aria-label' => 'Close']),
        ], ['class' => 'offcanvas-header']);

        $this->body = new DivTag($bodyContent, ['class' => 'offcanvas-body']);

        $this->addItem($this->header);
        $this->addItem($this->body);
    }

    /**
     * Returns a button that toggles this offcanvas.
     *
     * @param mixed  $label Button label
     * @param string $type  primary|secondary|success|danger|warning|info|light|dark
     */
    public function triggerButton($label, string $type = 'primary'): ButtonTag
    {
        return new ButtonTag($label, [
            'class' => 'btn btn-'.$type,
            'data-bs-toggle' => 'offcanvas',
            'data-bs-target' => '#'.$this->getTagID(),
            'aria-controls' => $this->getTagID(),
        ]);
    }
}
