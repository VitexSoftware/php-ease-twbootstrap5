<?php

namespace Ease\Example;

use Ease\TWB5\Alert;
use Ease\TWB5\WebPage;

include_once dirname(__DIR__) . '/vendor/autoload.php';

new \Ease\Locale('en_US', '', '');
$page = new WebPage(_('Alert Example'));


$page->addToMain(new Alert("primary", "A simple primary alert—check it out!"));
$page->addToMain(new Alert("secondary", "A simple secondary alert—check it out!"));
$page->addToMain(new Alert("success", "A simple success alert—check it out!"));
$page->addToMain(new Alert("danger", "A simple danger alert—check it out!"));
$page->addToMain(new Alert("warning", " A simple warning alert—check it out!"));
$page->addToMain(new Alert("info", "  A simple info alert—check it out!"));
$page->addToMain(new Alert("light", "A simple light alert—check it out!"));
$page->addToMain(new Alert("dark", "A simple dark alert—check it out!"));

echo $page;
