<?php

namespace Ease\TWB5;

/**
 * Stránka TwitterBootstrap5.
 *
 * @author     Vítězslav Dvořák <vitex@hippy.cz>
 * @copyright  2022-2024 info@vitexsoftware.cz (G)
 *
 * @link       https://getbootstrap.com/docs/5.2/getting-started/introduction/
 */
class WebPage extends \Ease\WebPage
{
    /**
     * Where to look for bootstrap stylesheet
     * @var string path or url
     */
    public $bootstrapCSS = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css';

    /**
     * Where to look for bootstrap stylesheet theme
     * @var string path or url
     */
    public $bootstrapThemeCSS = '';

    /**
     * Where to look for bootstrap stylesheet scripts
     * @var string path or url
     */
    public $bootstrapJavaScript = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js';

    /**
     *
     * @var type
     */
    public $header = null;

    /**
     *
     * @var type
     */
    public $main = null;

    /**
     *
     * @var type
     */
    public $footer = null;

    /**
     * Stránka s podporou pro twitter bootstrap.
     *
     * @param string   $pageTitle
     */
    public function __construct($pageTitle = null)
    {
        parent::__construct($pageTitle);
        Part::twBootstrapize();

        $this->head->addItem(
            '<meta charset="utf-8"/>' .
            '<meta name="viewport" content="width=device-width, initial-scale=1"/>'
        );
    }

    public function addToHeader($content)
    {
        if (is_null($this->header)) {
            $this->header = new \Ease\Html\HeaderTag();
        }
        return $this->header->addItem($content);
    }

    public function addToMain($content)
    {
        if (is_null($this->main)) {
            $this->main = new \Ease\Html\MainTag();
        }
        return $this->main->addItem($content);
    }

    public function addToFooter($content)
    {
        if (is_null($this->footer)) {
            $this->footer = new \Ease\Html\FooterTag();
        }
        return $this->footer->addItem($content);
    }

    /**
     * Assembly page
     */
    public function finalize()
    {
        if (is_null($this->header) === false) {
            $this->addAsFirst($this->header);
        }
        if (is_null($this->main) === false) {
            $this->addItem($this->main);
        }
        if (is_null($this->footer) === false) {
            $this->addItem($this->footer);
        }
        parent::finalize();
    }
}
