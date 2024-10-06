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

class Form extends \Ease\Html\Form
{
    public $formDiv;

    /**
     * Bootstrap Form.
     *
     * @see https://getbootstrap.com/docs/4.1/components/forms/
     *
     * @param array $formProperties    FormTag properties eg. ['enctype' => 'multipart/form-data']
     * @param array $formDivProperties FormDiv propertise eg. ['class'=>'form-row align-items-center']
     * @param mixed $formContents      Any other initial content
     */
    public function __construct($formProperties = [], $formDivProperties = [], $formContents = null)
    {
        parent::__construct($formProperties);
        $this->formDiv = parent::addItem(new \Ease\Html\DivTag($formContents, $formDivProperties));
    }

    /**
     * Vloží prvek do formuláře.
     *
     * @param mixed  $input       Vstupní prvek
     * @param string $caption     Popisek
     * @param string $placeholder předvysvětlující text
     * @param string $helptext    Dodatečná nápověda
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
     * Vloží další element do formuláře a upraví mu css.
     *
     * @param mixed  $pageItem     hodnota nebo EaseObjekt s metodou draw()
     * @param string $pageItemName Pod tímto jménem je objekt vkládán do stromu
     *
     * @return pointer Odkaz na vložený objekt
     */
    public function &addItem($pageItem, $pageItemName = null)
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
