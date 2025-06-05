<?php
namespace Ease\Example;


use \Ease\TWB5\OffCanvas;
use \Ease\Html\ButtonTag;
use \Ease\Html\ATag;
use \Ease\Html\DivTag;
use \Ease\Html\UlTag;
use \Ease\Html\LiTag;
use Ease\TWB5\WebPage;

include_once dirname(__DIR__) . '/vendor/autoload.php';


// Create the content for the OffCanvas
$dropdownMenu = new UlTag([
    new LiTag(new ATag('#', 'Action', ['class' => 'dropdown-item'])),
    new LiTag(new ATag('#', 'Another action', ['class' => 'dropdown-item'])),
    new LiTag(new ATag('#', 'Something else here', ['class' => 'dropdown-item']))
], ['class' => 'dropdown-menu']);

$dropdownButton = new ButtonTag('Dropdown button', [
    'class' => 'btn btn-secondary dropdown-toggle',
    'type' => 'button',
    'data-bs-toggle' => 'dropdown'
]);

$dropdown = new DivTag([$dropdownButton, $dropdownMenu], ['class' => 'dropdown mt-3']);

$offCanvasContent = new DivTag([
    new DivTag('Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.'),
    $dropdown
]);

// Create an OffCanvas instance
$offCanvas = new OffCanvas('offcanvasExample', 'Offcanvas', $offCanvasContent);

// Create a link to trigger the OffCanvas
$link = new ATag('#offcanvasExample', 'Link with href', [
    'class' => 'btn btn-primary',
    'data-bs-toggle' => 'offcanvas',
    'role' => 'button',
    'aria-controls' => 'offcanvasExample'
]);

// Create a button to trigger the OffCanvas
$button = new ButtonTag('Button with data-bs-target', [
    'class' => 'btn btn-primary',
    'type' => 'button',
    'data-bs-toggle' => 'offcanvas',
    'data-bs-target' => '#offcanvasExample',
    'aria-controls' => 'offcanvasExample'
]);

new \Ease\Locale('en_US', '', '');
$page = new WebPage(_('Alert Example'));

$page->addItem($link);
$page->addItem($button);
$page->addItem($offCanvas);

echo $page;

