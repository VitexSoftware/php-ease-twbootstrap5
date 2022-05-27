<?php

namespace Ease\Example;

use Ease\Html\SpanTag;
use Ease\TWB5\Container;
use Ease\TWB5\Navbar;
use Ease\TWB5\WebPage;

include_once dirname(__DIR__) . '/vendor/autoload.php';

new \Ease\Locale('en_US','','');
$page = new WebPage(_('Page Example'));

$page->addCss('
html {
  position: relative;
  min-height: 100%;
}
body {
  margin-bottom: 60px; /* Margin bottom by footer height */
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 60px; /* Set the fixed height of the footer here */
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
}
');


$page->addToHeader(new Navbar('example', 'nav', []));

$page->addToMain('Main content');

$page->addToFooter(new Container(new SpanTag('Place sticky footer content here.'), ['class' => 'text-muted']));

echo $page;
