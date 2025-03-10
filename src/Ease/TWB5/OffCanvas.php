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

class OffCanvas extends DivTag
{
    public function __construct($id, $title, $bodyContent)
    {
        $header = new DivTag(
            [
                new H5Tag($title, ['class' => 'offcanvas-title', 'id' => $id.'Label']),
                new ButtonTag('', ['class' => 'btn-close', 'data-bs-dismiss' => 'offcanvas', 'aria-label' => 'Close']),
            ],
            ['class' => 'offcanvas-header'],
        );

        $body = new DivTag($bodyContent, ['class' => 'offcanvas-body']);

        parent::__construct([$header, $body], [
            'class' => 'offcanvas offcanvas-start show',
            'tabindex' => '-1',
            'id' => $id,
            'aria-labelledby' => $id.'Label',
        ]);
    }
}
