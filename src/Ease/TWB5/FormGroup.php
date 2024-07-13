<?php

namespace Ease\TWB5;

/**
 * Description of FormGroup
 *
 * @author vitex
 */
class FormGroup extends \Ease\Html\DivTag {

    public function __construct($label,\Ease\Html\Input $input, $desc = '') {
        $id = $input->setTagID();
        parent::__construct(new \Ease\Html\LabelTag($id, $label));
        $input->addTagClass('form-control');
        $input->setTagProperties(['aria-describedby' => 'desc' . $id]);
        $this->addItem($input);
        if ($desc) {
            $this->addItem(new DivTag($desc, ['id' => 'desc' . $id, 'class' => 'form-text']));
        }
    }
}
