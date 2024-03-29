<?php
declare (strict_types=1);
/**
 * Zaváděcí soubor pro provádění PHPUnit testů na EaseFrameworkem.
 *
 * @author     Vitex <vitex@hippy.cz>
 * @copyright  2022-2023 Vitex@hippy.cz (G)
 */

#namespace Test\Ease;

require_once '/var/lib/composer/php-vitexsoftware-ease-core-dev/autoload.php';
require_once '/var/lib/composer/php-vitexsoftware-ease-html-dev/autoload.php';
require_once '/var/lib/composer/php-vitexsoftware-ease-bootstrap5-dev/autoload.php';

if ((php_sapi_name() != 'cli') && (session_status() == 'PHP_SESSION_NONE')) {
    session_start();
} else {
    $_SESSION = [];
}

define('EASE_APPNAME', 'EaseTWB5UnitTest');
define('EASE_LOGGER', 'syslog');


\Ease\Locale::singleton('cs_CZ');

//\Ease\Shared::user(new \Ease\Anonym());
//\Ease\Shared::webPage(new \Ease\WebPage());

class User extends \Ease\User {
 
}

\Ease\Shared::user(new \User);
