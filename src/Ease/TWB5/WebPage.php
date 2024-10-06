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
 * Stránka TwitterBootstrap5.
 *
 * @author     Vítězslav Dvořák <vitex@hippy.cz>
 * @copyright  2022-2024 info@vitexsoftware.cz (G)
 *
 * @see       https://getbootstrap.com/docs/5.2/getting-started/introduction/
 */
class WebPage extends \Ease\WebPage
{
    /**
     * Where to look for bootstrap stylesheet.
     *
     * @var string path or url
     */
    public string $bootstrapCSS = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css';

    /**
     * Where to look for bootstrap stylesheet theme.
     *
     * @var string path or url
     */
    public string $bootstrapThemeCSS = '';

    /**
     * Where to look for bootstrap stylesheet scripts.
     *
     * @var string path or url
     */
    public string $bootstrapJavaScript = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js';

    public \Ease\Html\HeaderTag $header;

    public \Ease\Html\MainTag $main;

    public \Ease\Html\FooterTag $footer;

    /**
     * Stránka s podporou pro twitter bootstrap.
     *
     * @param string $pageTitle
     */
    public function __construct($pageTitle = null)
    {
        parent::__construct($pageTitle);
        Part::twBootstrapize();

        $this->head->addItem(
            '<meta charset="utf-8"/>'.
            '<meta name="viewport" content="width=device-width, initial-scale=1"/>',
        );
        $this->header = new \Ease\Html\HeaderTag();
        $this->main = new \Ease\Html\MainTag();
        $this->footer = new \Ease\Html\FooterTag();
    }

    public function addToHeader($content)
    {
        return $this->header->addItem($content);
    }

    public function addToMain($content)
    {
        return $this->main->addItem($content);
    }

    public function addToFooter($content)
    {
        return $this->footer->addItem($content);
    }

    /**
     * Assembly page.
     */
    public function finalize(): void
    {
        if ((null === $this->header) === false) {
            $this->addAsFirst($this->header);
        }

        if ((null === $this->main) === false) {
            $this->addItem($this->main);
        }

        if ((null === $this->footer) === false) {
            $this->addItem($this->footer);
        }

        parent::finalize();
    }
}
