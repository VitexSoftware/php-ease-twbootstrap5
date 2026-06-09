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
 * Bootstrap 5 form group.
 *
 * Wraps a label, a form control and optional helper text using Bootstrap 5
 * markup (.mb-3 wrapper, .form-label label, .form-text helper). Replaces the
 * Bootstrap 4 .form-group based widget.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class FormGroup extends \Ease\Html\DivTag
{
    /**
     * Bootstrap 5 form group.
     *
     * @param mixed  $label       field label (string, Tag or array)
     * @param mixed  $content     form control widget (or any renderable content)
     * @param string $placeholder placeholder text put into the control
     * @param mixed  $helptext    helper text rendered below the control
     * @param string $addTagClass CSS class applied to the control (Bootstrap: form-control)
     */
    public function __construct(
        $label = null,
        $content = null,
        $placeholder = null,
        $helptext = null,
        $addTagClass = 'form-control',
    ) {
        parent::__construct(null, ['class' => 'mb-3']);

        // Resolve an id used to bind the label to the control.
        $id = null;

        if (\is_object($content) && method_exists($content, 'getTagID')) {
            $id = $content->getTagID();
        }

        if (empty($id) && \is_string($label) && $label !== '') {
            $id = \Ease\Functions::lettersOnly($label);
        }

        if (empty($id)) {
            $id = 'formgroup_'.\Ease\Functions::randomString();
        }

        if ($label !== null && $label !== '') {
            $this->addItem(new \Ease\Html\LabelTag((string) $id, $label, ['class' => 'form-label']));
        }

        if (\is_object($content)) {
            if ($addTagClass && method_exists($content, 'addTagClass')) {
                $content->addTagClass($addTagClass);
            }

            if ($placeholder && method_exists($content, 'setTagProperties')) {
                $content->setTagProperties(['placeholder' => $placeholder]);
            }

            if (method_exists($content, 'setTagID')) {
                $content->setTagID((string) $id);
            }

            if ($helptext && method_exists($content, 'setTagProperties')) {
                $content->setTagProperties(['aria-describedby' => 'desc'.$id]);
            }

            $this->addItem($content);
        } elseif ($content !== null) {
            $this->addItem($content);
        }

        if ($helptext) {
            $this->addItem(new \Ease\Html\DivTag($helptext, ['id' => 'desc'.$id, 'class' => 'form-text']));
        }
    }
}
