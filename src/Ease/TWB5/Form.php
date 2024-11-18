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

class Form extends \Ease\Html\Form
{
    public \Ease\Html\DivTag  $formDiv;

    /**
     * Bootstrap Form.
     *
     * @see https://getbootstrap.com/docs/4.1/components/forms/
     *
     * @param array<string,string> $formProperties    FormTag properties eg. ['enctype' => 'multipart/form-data']
     * @param array<string,string> $formDivProperties FormDiv propertise eg. ['class'=>'form-row align-items-center']
     * @param mixed $formContents      Any other initial content
     */
    public function __construct($formProperties = [], $formDivProperties = [], $formContents = null)
    {
        parent::__construct($formProperties);
        $this->formDiv = parent::addItem(new \Ease\Html\DivTag($formContents, $formDivProperties));
    }

    /**
     * Inserts an element into the form.
     *
     * @param mixed  $input       Input element
     * @param string $caption     Caption
     * @param string $placeholder Placeholder text
     * @param string $helptext    Additional help text
     */
    public function addInput(
        $input,
        $caption = null,
        $placeholder = null,
        $helptext = null
    ) {
        return $this->addItem(new InputGroup(
            $caption,
            $input,
            $placeholder,
            $helptext,
        ));
    }

    /**
     * Inserts another element into the form and adjusts its CSS.
     *
     * @param mixed  $pageItem     Value or EaseObject with draw() method
     * @param string $pageItemName The name under which the object is inserted into the tree
     *
     * @return Embedable|null Reference to the inserted object
     */
    public function &addItem($pageItem, $pageItemName = null): Embedable|null
    {
        if (\is_object($pageItem) && method_exists($pageItem, 'setTagClass')) {
            if (strtolower($pageItem->getTagType()) === 'select') {
                $pageItem->setTagClass(trim(str_replace(
                    'form_control',
                    '',
                    $pageItem->getTagClass().' form-control',
                )));
            } elseif ($pageItem->getTagProperty('type') === 'file') {
                $pageItem->setTagClass('form-control-file');
            }
        }

        $added = $this->formDiv->addItem($pageItem, $pageItemName);

        return $added;
    }
}
