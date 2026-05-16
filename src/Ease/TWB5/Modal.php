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
 * Bootstrap Modal dialog.
 *
 * @see https://getbootstrap.com/docs/5.3/components/modal/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Modal extends DivTag
{
    public DivTag $header;
    public DivTag $body;
    public DivTag $footer;

    /**
     * Bootstrap Modal.
     *
     * @param string                $id         Unique modal ID
     * @param mixed                 $title      Modal title
     * @param mixed                 $body       Modal body content
     * @param mixed                 $footer     Modal footer content (null = no footer)
     * @param string                $size       sm|lg|xl (empty = default)
     * @param array<string, string> $properties Additional modal div properties
     */
    public function __construct(
        string $id,
        $title = null,
        $body = null,
        $footer = null,
        string $size = '',
        array $properties = []
    ) {
        parent::__construct(null, array_merge(['tabindex' => '-1', 'aria-hidden' => 'true'], $properties));
        $this->addTagClass('modal fade');
        $this->setTagID($id);
        $this->setTagProperty('aria-labelledby', $id.'Label');

        $this->header = new DivTag(null, ['class' => 'modal-header']);
        $this->header->addItem(new H5Tag($title, ['class' => 'modal-title', 'id' => $id.'Label']));
        $this->header->addItem(new ButtonTag('', [
            'class' => 'btn-close',
            'data-bs-dismiss' => 'modal',
            'aria-label' => 'Close',
        ]));

        $this->body = new DivTag($body, ['class' => 'modal-body']);
        $this->footer = new DivTag($footer, ['class' => 'modal-footer']);

        $content = new DivTag(null, ['class' => 'modal-content']);
        $content->addItem($this->header);
        $content->addItem($this->body);

        if ($footer !== null) {
            $content->addItem($this->footer);
        }

        $dialogClass = 'modal-dialog';

        if ($size) {
            $dialogClass .= ' modal-'.$size;
        }

        $this->addItem(new DivTag($content, ['class' => $dialogClass]));
    }

    /**
     * Returns a button that opens this modal.
     *
     * @param mixed  $label Button label
     * @param string $type  primary|secondary|success|danger|warning|info|light|dark
     */
    public function triggerButton($label, string $type = 'primary'): ButtonTag
    {
        return new ButtonTag($label, [
            'class' => 'btn btn-'.$type,
            'data-bs-toggle' => 'modal',
            'data-bs-target' => '#'.$this->getTagID(),
        ]);
    }
}
