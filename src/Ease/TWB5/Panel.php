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

use Ease\Embedable;
use Ease\Html\DivTag;

/**
 * Description of Panel.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Panel extends Card
{
    /**
     * Panel Head.
     */
    public DivTag $header;

    /**
     * Panel's body.
     */
    public DivTag $body;

    /**
     * footer content.
     */
    public DivTag $footer;

    /**
     * Panel type.
     *
     * @var string success|warning|info|danger
     */
    public string $type = 'default';

    /**
     * Twitter Bootstrap Panel.
     *
     * @param mixed|string $heading
     * @param string       $type    success|warning|info|danger
     * @param mixed        $body    panel body
     * @param mixed        $footer  panel foot FALSE = do not show at all
     */
    public function __construct(
        $heading = null,
        $type = 'default',
        $body = null,
        $footer = null
    ) {
        parent::__construct(null, $type ? ['class' => 'bg-'.$type] : null);
        $this->header = new DivTag($heading, ['class' => 'card-header']);
        $this->body = new DivTag($body, ['class' => 'card-body']);
        $this->footer = new DivTag($footer, ['class' => 'card-footer']);
    }

    /**
     * Vloží další element do objektu.
     *
     * @param mixed  $pageItem     hodnota nebo EaseObjekt s metodou draw()
     * @param string $pageItemName Pod tímto jménem je objekt vkládán do stromu
     *
     * @return null|Embedable Odkaz na vložený objekt
     */
    public function &addItem($pageItem, $pageItemName = null): null|Embedable
    {
        $added = $this->body->addItem($pageItem);

        return $added;
    }

    public function finalize(): void
    {
        if ($this->header->getItemsCount()) {
            parent::addItem($this->header);
        }

        if ($this->body->getItemsCount()) {
            parent::addItem($this->body);
        }

        if ($this->footer->getItemsCount()) {
            parent::addItem($this->footer);
        }

        parent::finalize();
    }
}
