<?php

declare(strict_types=1);

/**
 * @see https://getbootstrap.com/docs/5.0/forms/input-group/
 *
 * @author     Vítězslav Dvořák <info@vitexsoftware.cz>
 * @copyright  2024 Vitex Software
 */

namespace Ease\TWB5;

/**
 * Description of InputGroup
 *
 * @author vitex
 */
class InputGroup extends \Ease\Container
{
    public $inputGroup;
    /**
     *
     * @param string $heading
     * @param \Ease\Html\InputTag $input
     */
    public function __construct($heading, \Ease\Html\InputTag|\Ease\Html\TextareaTag|\Ease\Html\SelectTag $input, $preText = '')
    {
        parent::__construct();
        $input->setTagID();
        if ($heading) {
            $this->addItem(new \Ease\Html\LabelTag($input->getTagID(), $heading, ['class' => 'form-label']));
        }

        $this->inputGroup = $this->addItem(new \Ease\Html\DivTag('', ['class' => 'input-group']));
        if ($preText) {
            $pre = new \Ease\Html\SpanTag($preText, ['class' => 'input-group-text']);
            $pre->setTagID();
            $input->setTagProperty('aria-described-by', $pre->getTagID());
            $this->inputGroup->addItem($pre);
        }

        $this->inputGroup->addItem($input);
    }
}
