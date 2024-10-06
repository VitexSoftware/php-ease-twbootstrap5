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

/**
 * Description of FormGroup.
 *
 * @author vitex
 */
class FormGroup extends \Ease\Html\DivTag
{
    public function __construct($label, \Ease\Html\Input $input, $desc = '')
    {
        $id = $input->setTagID();
        parent::__construct(new \Ease\Html\LabelTag($id, $label));
        $input->addTagClass('form-control');
        $input->setTagProperties(['aria-describedby' => 'desc'.$id]);
        $this->addItem($input);

        if ($desc) {
            $this->addItem(new DivTag($desc, ['id' => 'desc'.$id, 'class' => 'form-text']));
        }
    }
}
