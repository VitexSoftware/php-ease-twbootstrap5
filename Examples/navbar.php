<?php

/**
 * https://getbootstrap.com/docs/5.3/components/navbar/
 */

namespace Ease\TWB5;

include_once dirname(__DIR__) . '/vendor/autoload.php';

new \Ease\Locale('en_US', '', '');
$page = new WebPage(_('Main Menu Example'));

$mainMenu = new Navbar('navbar');
$mainMenu->addTagClass('navbar-expand-lg');
$mainMenu->addTagClass('bg-body-tertiary');

$mainMenu->addMenuItem(new \Ease\Html\ATag('#', 'Home'));
$mainMenu->addMenuItem(new \Ease\Html\ATag('#', 'Link'));
$mainMenu->addDropDownMenu('Dropdown', ['#' => 'Action', '##' => 'Another action', '' => '', '###' => 'Something else here']);
$mainMenu->addMenuItem(new \Ease\Html\ATag('#', 'Link'), false);
$mainMenu->addSearchForm();

$page->addToHeader($mainMenu);

echo $page;
