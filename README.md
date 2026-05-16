# php-ease-twbootstrap5
TwitterBootstrap5 classes for EasePHP Framework 

![twbootstrap5](php-vitexsoftware-ease-twbootstrap5.svg?raw=true)

> **Note**: If you are looking for a similar PHP library for Bootstrap 4, you can find it at [php-ease-twbootstrap4](https://github.com/VitexSoftware/php-ease-twbootstrap4.git).

## Overview
A comprehensive set of PHP classes for building Bootstrap 5 UI components within the EasePHP Framework. Each class wraps a specific Bootstrap 5 component and generates the correct HTML structure and CSS classes automatically.

Targets **Bootstrap 5.3**.

## Classes and Their Functionalities

### Accordion.php
- **Functionality**: Collapsible content panels.
- **Features**: Items added via `addAccordionItem()`; supports `alwaysOpen` mode (multiple sections open simultaneously).

```php
use Ease\TWB5\Accordion;

$accordion = new Accordion('faq', [
    'What is Bootstrap?' => 'A CSS framework.',
    'What is EasePHP?'   => 'A PHP rendering library.',
]);
$accordion->addAccordionItem('Custom item', 'Added programmatically.', true);
echo $accordion->draw();
```

### Alert.php
- **Functionality**: Create and manage Bootstrap alert messages.
- **Features**: Supports contextual types (`success`, `danger`, `warning`, `info`, `primary`, `secondary`, `light`, `dark`).

```php
use Ease\TWB5\Alert;

$alert = new Alert('success', 'Operation completed successfully!');
echo $alert->draw();
```

### Badge.php
- **Functionality**: Generate Bootstrap badges.
- **Features**: Supports all contextual colors via `text-bg-*` classes.

```php
use Ease\TWB5\Badge;

$badge = new Badge('New', 'primary');
echo $badge->draw();
```

### Breadcrumb.php
- **Functionality**: Navigation path (breadcrumb trail).
- **Features**: Accepts ordered `['Label' => 'url']` pairs; the last item is automatically marked active.

```php
use Ease\TWB5\Breadcrumb;

$breadcrumb = new Breadcrumb([
    'Home'    => '/',
    'Library' => '/library',
    'Data'    => '',
]);
echo $breadcrumb->draw();
```

### ButtonGroup.php
- **Functionality**: Group multiple buttons into a single line.
- **Features**: Size variants (`lg`, `sm`), vertical stacking.

```php
use Ease\TWB5\ButtonGroup;
use Ease\Html\ButtonTag;

$group = new ButtonGroup([
    new ButtonTag('Left',   ['class' => 'btn btn-primary']),
    new ButtonTag('Middle', ['class' => 'btn btn-primary']),
    new ButtonTag('Right',  ['class' => 'btn btn-primary']),
], '', false, 'Toolbar');
echo $group->draw();
```

### Card.php
- **Functionality**: Create Bootstrap card components.
- **Features**: Generic card container; use `Panel` for a structured header/body/footer layout.

```php
use Ease\TWB5\Card;

$card = new Card('This is the card body content.');
echo $card->draw();
```

### Col.php
- **Functionality**: Define column layouts using Bootstrap's grid system.
- **Features**: Supports column sizes 1–12 and responsive breakpoints (`xs`, `sm`, `md`, `lg`, `xl`, `xxl`).

### Collapse.php
- **Functionality**: Togglable content panel.
- **Features**: `triggerButton()` returns a ready-made toggle button; supports open-by-default state.

```php
use Ease\TWB5\Collapse;

$collapse = new Collapse('details', 'Hidden content revealed on click.');
echo $collapse->triggerButton('Show details')->draw();
echo $collapse->draw();
```

### Container.php
- **Functionality**: Create Bootstrap container elements.
- **Features**: Supports fluid and fixed-width containers.

```php
use Ease\TWB5\Container;

$container = new Container('This is a container.');
echo $container->draw();
```

### Form.php
- **Functionality**: Generate Bootstrap forms.
- **Features**: Wraps inputs in a div; auto-applies `form-control` to added inputs; use `addInput()` for labelled input groups.

```php
use Ease\TWB5\Form;
use Ease\Html\InputTextTag;

$form = new Form(['method' => 'POST', 'action' => '/submit']);
$form->addInput(new InputTextTag('username'), 'Username');
echo $form->draw();
```

### FormGroup.php
- **Functionality**: Group form controls with labels and help text.
- **Features**: Supports different form group layouts and validation states.

### InputGroup.php
- **Functionality**: Create input groups with prepend text or elements.
- **Features**: Supports various input types and custom addon elements.

### LinkButton.php
- **Functionality**: Generate Bootstrap-styled anchor (`<a>`) buttons.
- **Features**: Supports all button variants (`primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `link`); defaults to `secondary`.

```php
use Ease\TWB5\LinkButton;

$linkButton = new LinkButton('https://example.com', 'Click Me', 'primary');
echo $linkButton->draw();
```

### ListGroup.php
- **Functionality**: Versatile Bootstrap list component.
- **Features**: Plain items or linked items via `['label' => 'url']`; flush and numbered variants; `addListItem()` for contextual colors and active state.

```php
use Ease\TWB5\ListGroup;

$list = new ListGroup([
    'Settings' => '/settings',
    'Profile'  => '/profile',
]);
$list->addListItem('Notifications', 'warning');
echo $list->draw();
```

### Modal.php
- **Functionality**: Bootstrap modal dialog.
- **Features**: `triggerButton()` returns a ready-made button; optional footer; size variants (`sm`, `lg`, `xl`); public `$header`, `$body`, `$footer` for further customisation.

```php
use Ease\TWB5\Modal;

$modal = new Modal('confirmDelete', 'Confirm', 'Are you sure?', 'This cannot be undone.');
echo $modal->triggerButton('Delete', 'danger')->draw();
echo $modal->draw();
```

### Nav.php
- **Functionality**: Standalone Bootstrap navigation component.
- **Features**: Plain, tabs, and pills styles; fill and justified variants; `addNavItem()` for active/disabled states.

```php
use Ease\TWB5\Nav;

$nav = new Nav([
    'Home'    => '/',
    'About'   => '/about',
    'Contact' => '/contact',
], 'tabs');
echo $nav->draw();
```

### NavItemDropDown.php
- **Functionality**: Dropdown menu item for use inside a Navbar.
- **Features**: Supports multiple items and dividers via `addDropdownItem()`.

```php
use Ease\TWB5\NavItemDropDown;

$dropdown = new NavItemDropDown('More', [
    'Action'        => '#action',
    'Another action'=> '#another-action',
    ''              => '',        // divider
    'Something else'=> '#else',
]);
echo $dropdown->draw();
```

### Navbar.php
- **Functionality**: Generate Bootstrap navigation bars.
- **Features**: Responsive toggle, brand element, dropdown menus, and search form support.

```php
use Ease\TWB5\Navbar;

$navbar = new Navbar('My Website', [
    'Home'  => '#home',
    'About' => '#about',
]);
echo $navbar->draw();
```

### OffCanvas.php
- **Functionality**: Bootstrap offcanvas slide-in panel.
- **Features**: Title, close button, and arbitrary body content.

```php
use Ease\TWB5\OffCanvas;

$offcanvas = new OffCanvas('sidebar', 'Slide-in Menu', 'Panel body content here.');
echo $offcanvas->draw();
```

### Pagination.php
- **Functionality**: Page navigation controls.
- **Features**: Auto-generates numbered pages with previous/next controls; disabled states for boundary pages; size variants (`lg`, `sm`).

```php
use Ease\TWB5\Pagination;

$pagination = new Pagination(3, 10, '?page=%d');
echo $pagination->draw();
```

### Panel.php
- **Functionality**: Card-based panel with distinct header, body, and footer sections.
- **Features**: Extends `Card`; contextual background colors (`success`, `warning`, `info`, `danger`); sections only render when they contain content; `addItem()` inserts into the body.

```php
use Ease\TWB5\Panel;

$panel = new Panel('Panel Heading', 'success', 'Panel body content.', 'Panel footer');
$panel->addItem('More body content');
echo $panel->draw();
```

### Part.php
- **Functionality**: Base class for reusable component parts.
- **Features**: Provides `twBootstrapize()` to apply Bootstrap styling to arbitrary HTML elements.

### Progress.php
- **Functionality**: Bootstrap progress bar.
- **Features**: Contextual colors, striped and animated variants, custom min/max range, optional label.

```php
use Ease\TWB5\Progress;

$progress = new Progress(65, 0, 100, 'success');
echo $progress->draw();

// Striped and animated
$progress = new Progress(40, 0, 100, 'warning', true, true, '40%');
echo $progress->draw();
```

### Row.php
- **Functionality**: Bootstrap grid row.
- **Features**: Optional row-cols helper; `addColumn()` shortcut creates a `Col` inside the row.

```php
use Ease\TWB5\Row;
use Ease\TWB5\Col;

$row = new Row([
    new Col(6, 'Left column'),
    new Col(6, 'Right column'),
]);
echo $row->draw();
```

### Spinner.php
- **Functionality**: Bootstrap loading indicator.
- **Features**: `border` (ring) and `grow` (pulsing dot) types; all contextual colors; small size variant.

```php
use Ease\TWB5\Spinner;

echo (new Spinner())->draw();                            // default border, primary
echo (new Spinner('grow', 'success', 'sm'))->draw();    // small growing dot, green
```

### SubmitButton.php
- **Functionality**: Bootstrap-styled form submit button.
- **Features**: Supports all button variants.

```php
use Ease\TWB5\SubmitButton;

$submit = new SubmitButton('Save changes', 'primary');
echo $submit->draw();
```

### Table.php
- **Functionality**: Create Bootstrap-styled tables.
- **Features**: Pass class via properties for striped, bordered, hoverable, small, and dark variants.

```php
use Ease\TWB5\Table;

$table = new Table([
    ['Name',        'Score'],
    ['Alice',       '95'],
    ['Bob',         '87'],
]);
echo $table->draw();
```

### Tabs.php
- **Functionality**: Bootstrap tab component.
- **Features**: Static tabs via `addTab()`; AJAX/dynamic content loading via `addAjaxTab()`; first tab active by default.

```php
use Ease\TWB5\Tabs;

$tabs = new Tabs();
$tabs->addTab('Overview',  'Overview content here.',  true);
$tabs->addTab('Details',   'Details content here.');
$tabs->addAjaxTab('Live',  '/api/live-data');
echo $tabs->draw();
```

### Toast.php
- **Functionality**: Bootstrap toast notification.
- **Features**: Header title, optional subtitle (e.g. timestamp), body content, autohide control.

```php
use Ease\TWB5\Toast;

$toast = new Toast('Notification', 'Your file was saved.', 'Just now');
echo $toast->draw();

// Persistent (no auto-hide)
$toast = new Toast('Warning', 'Action required.', null, false);
echo $toast->draw();
```

### WebPage.php
- **Functionality**: Full Bootstrap page scaffold.
- **Features**: Manages the HTML skeleton and automatically includes Bootstrap CSS/JS via CDN.

```php
use Ease\TWB5\WebPage;
use Ease\TWB5\Container;

$page = new WebPage('My Web Page');
$page->addItem(new Container('Main content goes here.'));
echo $page->draw();
```

## Installation

```bash
composer require vitexsoftware/ease-twbootstrap5
```

Or add to `composer.json` manually:

```json
{
    "require": {
        "vitexsoftware/ease-twbootstrap5": "^1.0"
    }
}
```

Then include the autoloader:

```php
require 'vendor/autoload.php';
```
