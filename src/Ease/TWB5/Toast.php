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
use Ease\Html\SmallTag;
use Ease\Html\StrongTag;

/**
 * Bootstrap Toast notification.
 *
 * @see https://getbootstrap.com/docs/5.3/components/toasts/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Toast extends DivTag
{
    /**
     * Bootstrap Toast.
     *
     * @param mixed                 $title      Toast header title
     * @param mixed                 $body       Toast body content
     * @param mixed                 $subtitle   Small subtitle text shown next to title (e.g. timestamp)
     * @param bool                  $autohide   Automatically hide after delay
     * @param array<string, string> $properties Additional properties
     */
    public function __construct(
        $title = null,
        $body = null,
        $subtitle = null,
        bool $autohide = true,
        array $properties = []
    ) {
        $properties['role'] = 'alert';
        $properties['aria-live'] = 'assertive';
        $properties['aria-atomic'] = 'true';

        if (!$autohide) {
            $properties['data-bs-autohide'] = 'false';
        }

        parent::__construct(null, $properties);
        $this->addTagClass('toast');

        $header = new DivTag(null, ['class' => 'toast-header']);
        $header->addItem(new StrongTag($title, ['class' => 'me-auto']));

        if ($subtitle !== null) {
            $header->addItem(new SmallTag($subtitle, ['class' => 'text-body-secondary']));
        }

        $header->addItem(new ButtonTag('', [
            'class' => 'btn-close',
            'data-bs-dismiss' => 'toast',
            'aria-label' => 'Close',
        ]));

        $this->addItem($header);
        $this->addItem(new DivTag($body, ['class' => 'toast-body']));
    }
}
