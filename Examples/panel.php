<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Ease\TWB5\Panel;
use Ease\TWB5\Form;
use Ease\TWB5\WebPage;

$oPage = new WebPage('Panel Duplication Test');

$form = new Form([], [], 'Testovací obsah formuláře');
$panel = new Panel('Test Panel', 'default', $form, 'Popis panelu');

$oPage->addItem($panel);

echo $oPage;
