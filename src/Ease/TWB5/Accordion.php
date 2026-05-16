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

/**
 * Bootstrap Accordion.
 *
 * @see https://getbootstrap.com/docs/5.3/components/accordion/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Accordion extends DivTag
{
    private string $accordionId;
    private bool $alwaysOpen;
    private int $itemCount = 0;

    /**
     * Bootstrap Accordion.
     *
     * @param string                $id         Unique accordion ID
     * @param array<string, mixed>  $items      ['Title' => content] pairs
     * @param bool                  $alwaysOpen Allow multiple sections open at once
     * @param array<string, string> $properties Additional properties
     */
    public function __construct(
        string $id,
        array $items = [],
        bool $alwaysOpen = false,
        array $properties = []
    ) {
        parent::__construct(null, $properties);
        $this->addTagClass('accordion');
        $this->setTagID($id);
        $this->accordionId = $id;
        $this->alwaysOpen = $alwaysOpen;

        foreach ($items as $title => $content) {
            $this->addAccordionItem($title, $content);
        }
    }

    /**
     * Add one accordion item.
     *
     * @param mixed $title   Header title
     * @param mixed $content Body content
     * @param bool  $active  Start expanded
     */
    public function addAccordionItem($title, $content, bool $active = false): DivTag
    {
        ++$this->itemCount;
        $itemId = $this->accordionId.'-item-'.$this->itemCount;

        $button = new ButtonTag($title, [
            'class' => 'accordion-button'.($active ? '' : ' collapsed'),
            'type' => 'button',
            'data-bs-toggle' => 'collapse',
            'data-bs-target' => '#'.$itemId,
            'aria-expanded' => $active ? 'true' : 'false',
            'aria-controls' => $itemId,
        ]);

        $header = new DivTag($button, ['class' => 'accordion-header']);

        $collapseProps = [
            'class' => 'accordion-collapse collapse'.($active ? ' show' : ''),
            'id' => $itemId,
        ];

        if (!$this->alwaysOpen) {
            $collapseProps['data-bs-parent'] = '#'.$this->accordionId;
        }

        $collapse = new DivTag(
            new DivTag($content, ['class' => 'accordion-body']),
            $collapseProps,
        );

        $item = new DivTag([$header, $collapse], ['class' => 'accordion-item']);
        $this->addItem($item);

        return $item;
    }
}
