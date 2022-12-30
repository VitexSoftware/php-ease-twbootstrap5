<?php

declare (strict_types=1);
/**
 * Zaváděcí soubor pro provádění PHPUnit testů na EaseFrameworkem.
 *
 * @author     Vitex <vitex@hippy.cz>
 * @copyright  2012-2023 Vitex@hippy.cz (G)
 */
require_once __DIR__ . '/../vendor/autoload.php';

if ((php_sapi_name() != 'cli') && (session_status() == 'PHP_SESSION_NONE')) {
    session_start();
} else {
    $_SESSION = [];
}

define('EASE_APPNAME', 'EaseTWB5UnitTest');
define('EASE_LOGGER', 'syslog');

\Ease\Locale::singleton('cs_CZ');
\Ease\WebPage::singleton();
\Ease\Shared::user(\Ease\User::singleton(null, '\Ease\User'));
