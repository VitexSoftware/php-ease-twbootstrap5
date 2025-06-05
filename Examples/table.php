<?php

namespace Ease\Example;

use Ease\Locale;
use Ease\TWB5\Table;
use Ease\TWB5\WebPage;

include_once dirname(__DIR__) . '/vendor/autoload.php';

new Locale('en_US','','');
$page = new WebPage(_('Table Example'));

$table = new Table(null, ['class'=>'table-dark table-striped']);
$table->addRowHeaderColumns(['#', 'First Name', 'Last Name', 'Username']);
$table->addRowColumns([1, 'Mark', 'Otto', '@mdo']);
$table->addRowColumns([2, 'Jacob', 'Thornton', '@fat']);
$table->addRowColumns([3, 'Larry', 'the Bird', '@twitter']);
$table->addRowFooterColumns(['', '', 'Total', 3]);

$page->addToMain($table);

echo $page;
