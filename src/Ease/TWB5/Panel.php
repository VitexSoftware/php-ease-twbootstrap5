<?php

namespace Ease\TWB5;

use \Ease\Html\DivTag;

/**
 * Description of Panel
 * 
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Panel extends Card {

    /**
     * Hlavička panelu.
     *
     * @var \Ease\Html\DivTag
     */
    public $header = null;

    /**
     * Tělo panelu.
     *
     * @var \Ease\Html\DivTag
     */
    public $body = null;

    /**
     * Patička panelu.
     *
     * @var \Ease\Html\DivTag
     */
    public $footer = null;

    /**
     * Typ Panelu.
     *
     * @var string succes|wanring|info|danger
     */
    public $type = 'default';

    /**
     * Panel Twitter Bootstrapu.
     *
     * @param string|mixed $heading
     * @param string       $type    succes|wanring|info|danger
     * @param mixes        $body    tělo panelu
     * @param mixed        $footer  patička panelu. FALSE = nezobrazit vůbec
     */
    public function __construct($heading = null, $type = null, $body = null,
            $footer = null) {
        parent::__construct(null, $type ? ['class' => 'bg-' . $type] : null );
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
     * @return pointer Odkaz na vložený objekt
     */
    public function &addItem($pageItem, $pageItemName = null) {
        $added = $this->body->addItem($pageItem, $pageItemName);

        return $added;
    }

    public function finalize() {
        if ($this->header->getItemsCount()) {
            parent::addItem($this->header);
        }
        if ($this->body->getItemsCount()) {
            parent::addItem($this->body);
        }
        if ($this->footer->getItemsCount()) {
            parent::addItem($this->footer);
        }
    }

}
