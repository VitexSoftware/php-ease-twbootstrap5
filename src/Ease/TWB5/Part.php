<?php
/**
 * Twitter Bootstrap5 common class.
 *
 * @author Vitex <vitex@hippy.cz>
 */

namespace Ease\TWB5;

class Part extends \Ease\Part
{

    /**
     * Vložení náležitostí pro twitter bootstrap.
     */
    public function __construct()
    {
        parent::__construct();
        self::twBootstrapize();
    }

    /**
     * Opatří objekt vším potřebným pro funkci bootstrapu.
     */
    public static function twBootstrapize()
    {
        parent::jQueryze();
        \Ease\WebPage::singleton()->includeCSS(\Ease\WebPage::singleton()->bootstrapCSS);
        \Ease\WebPage::singleton()->includeJavaScript(\Ease\WebPage::singleton()->bootstrapJavaScript);
        return true;
    }
}
