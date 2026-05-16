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

use Ease\Html\ATag;
use Ease\Html\LiTag;
use Ease\Html\NavTag;
use Ease\Html\SpanTag;
use Ease\Html\UlTag;

/**
 * Bootstrap Pagination.
 *
 * @see https://getbootstrap.com/docs/5.3/components/pagination/
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Pagination extends NavTag
{
    private UlTag $list;

    /**
     * Bootstrap Pagination.
     *
     * @param int                   $currentPage  Current (1-based) page number
     * @param int                   $totalPages   Total number of pages
     * @param string                $urlPattern   URL pattern; use %d as page placeholder
     * @param string                $size         lg|sm (empty = default)
     * @param string                $ariaLabel    Accessible label for the nav element
     * @param array<string, string> $properties   Additional nav properties
     */
    public function __construct(
        int $currentPage,
        int $totalPages,
        string $urlPattern = '?page=%d',
        string $size = '',
        string $ariaLabel = 'Page navigation',
        array $properties = []
    ) {
        $properties['aria-label'] = $ariaLabel;
        parent::__construct(null, $properties);

        $listClass = 'pagination';

        if ($size) {
            $listClass .= ' pagination-'.$size;
        }

        $this->list = new UlTag(null, ['class' => $listClass]);

        $this->addPrevNext('&laquo;', $currentPage > 1 ? sprintf($urlPattern, $currentPage - 1) : null, $currentPage <= 1);

        for ($i = 1; $i <= $totalPages; ++$i) {
            $this->addPage($i, sprintf($urlPattern, $i), $i === $currentPage);
        }

        $this->addPrevNext('&raquo;', $currentPage < $totalPages ? sprintf($urlPattern, $currentPage + 1) : null, $currentPage >= $totalPages);

        $this->addItem($this->list);
    }

    /**
     * Add a numbered page item.
     */
    private function addPage(int $number, string $url, bool $active): void
    {
        $liClass = 'page-item'.($active ? ' active' : '');
        $aProps = ['class' => 'page-link', 'href' => $url];

        if ($active) {
            $aProps['aria-current'] = 'page';
        }

        $this->list->addItem(new LiTag(new ATag($url, (string) $number, $aProps), ['class' => $liClass]));
    }

    /**
     * Add a previous/next control item.
     */
    private function addPrevNext(string $label, ?string $url, bool $disabled): void
    {
        $liClass = 'page-item'.($disabled ? ' disabled' : '');

        if ($disabled) {
            $link = new SpanTag($label, ['class' => 'page-link', 'aria-hidden' => 'true']);
        } else {
            $link = new ATag($url, $label, ['class' => 'page-link']);
        }

        $this->list->addItem(new LiTag($link, ['class' => $liClass]));
    }
}
