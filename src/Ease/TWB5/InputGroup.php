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
 * Description of InputGroup.
 *
 * @author vitex
 */
class InputGroup extends \Ease\Container
{
    public $inputGroup;
    /**
     * @param string $heading
     * @param mixed  $preText
     */
    public function __construct($heading, \Ease\Html\Input $input, $preText = '')
    {
        parent::__construct();
        $input->setTagID();

        if ($heading) {
            $this->addItem(new \Ease\Html\LabelTag($input->getTagID(), $heading, ['class' => 'form-label']));
        }

        $input->addTagClass('form-control');
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
