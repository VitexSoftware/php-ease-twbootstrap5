# php-ease-twbootstrap5
TwitterBootstrap5 classes for EasePHP Framework 

> **Note**: If you are looking for a similar PHP library for Bootstrap 4, you can find it at [php-ease-twbootstrap4](https://github.com/VitexSoftware/php-ease-twbootstrap4.git).

## Overview
This initial release includes a set of PHP classes designed to facilitate the creation of web components using Twitter Bootstrap 5. Each class corresponds to a specific Bootstrap component, providing an easy-to-use interface for integrating these components into your web applications.

## Classes and Their Functionalities

### Alert.php
- **Functionality**: Create and manage Bootstrap alert messages.
- **Features**: Supports different alert types (success, danger, warning, info), dismissible alerts, and custom messages.

```php
use Ease\TwBootstrap5\Alert;

$alert = new Alert('This is a success alert!', 'success');
echo $alert->draw();
```

### Badge.php
- **Functionality**: Generate Bootstrap badges.
- **Features**: Supports different badge styles and contextual colors.

```php
use Ease\TwBootstrap5\Badge;

$badge = new Badge('New', 'primary');
echo $badge->draw();
```

### Card.php
- **Functionality**: Create Bootstrap card components.
- **Features**: Supports card headers, footers, images, and various content types.

```php
use Ease\TwBootstrap5\Card;

$card = new Card('Card Title', 'This is some text within a card body.');
echo $card->draw();
```

### Col.php
- **Functionality**: Define column layouts using Bootstrap's grid system.
- **Features**: Supports different column sizes and responsive breakpoints.

### Container.php
- **Functionality**: Create Bootstrap container elements.
- **Features**: Supports fluid and fixed-width containers.

```php
use Ease\TwBootstrap5\Container;

$container = new Container('This is a container.');
echo $container->draw();
```

### Form.php
- **Functionality**: Generate Bootstrap forms.
- **Features**: Supports various form controls, validation states, and layout options.

```php
use Ease\TwBootstrap5\Form;

$form = new Form('POST', '/submit');
$form->addItem(new Input('text', 'username', 'Username'));
echo $form->draw();
```

### FormGroup.php
- **Functionality**: Group form controls with labels and help text.
- **Features**: Supports different form group layouts and validation states.

### InputGroup.php
- **Functionality**: Create input groups with prepend and append elements.
- **Features**: Supports various input types and custom elements.

### LinkButton.php
- **Functionality**: Generate Bootstrap-styled link buttons.
- **Features**: Supports different button styles and sizes.

```php
use Ease\TwBootstrap5\LinkButton;

$linkButton = new LinkButton('Click Me', 'https://example.com', 'primary');
echo $linkButton->draw();
```

### NavItemDropDown.php
- **Functionality**: Create dropdown items for navigation bars.
- **Features**: Supports nested dropdowns and various alignment options.

```php
use Ease\TwBootstrap5\NavItemDropDown;

$dropdown = new NavItemDropDown('Dropdown', [
    'Action' => '#action',
    'Another action' => '#another-action',
    'Something else here' => '#something-else'
]);
echo $dropdown->draw();
```

### Navbar.php
- **Functionality**: Generate Bootstrap navigation bars.
- **Features**: Supports different navbar styles, responsive behaviors, and brand elements.

```php
use Ease\TwBootstrap5\Navbar;

$navbar = new Navbar('My Website', [
    'Home' => '#home',
    'About' => '#about',
    'Contact' => '#contact'
]);
echo $navbar->draw();
```

### Panel.php
- **Functionality**: Create Bootstrap panels.
- **Features**: Supports panel headers, footers, and various content types.

### Part.php
- **Functionality**: Base class for reusable component parts.
- **Features**: Provides common functionality for other components.

### Row.php
- **Functionality**: Define row layouts using Bootstrap's grid system.
- **Features**: Supports different row configurations and responsive breakpoints.

```php
use Ease\TwBootstrap5\Row;

$row = new Row([
    new Col('Column 1', 6),
    new Col('Column 2', 6)
]);
echo $row->draw();
```

### SubmitButton.php
- **Functionality**: Generate Bootstrap-styled submit buttons.
- **Features**: Supports different button styles and sizes.

```php
use Ease\TwBootstrap5\SubmitButton;

$submitButton = new SubmitButton('Submit', 'primary');
echo $submitButton->draw();
```

### Table.php
- **Functionality**: Create Bootstrap-styled tables.
- **Features**: Supports striped, bordered, hoverable, and responsive tables.

```php
use Ease\TwBootstrap5\Table;

$table = new Table([
    ['Header 1', 'Header 2'],
    ['Row 1 Col 1', 'Row 1 Col 2'],
    ['Row 2 Col 1', 'Row 2 Col 2']
]);
echo $table->draw();
```

### Tabs.php
- **Functionality**: Generate Bootstrap tab components.
- **Features**: Supports different tab styles and dynamic content loading.

### WebPage.php
- **Functionality**: Base class for creating web pages with Bootstrap components.
- **Features**: Provides common functionality for integrating various Bootstrap components into a web page.

```php
use Ease\TwBootstrap5\WebPage;

$page = new WebPage('My Web Page');
$page->addItem(new Container('This is the main content.'));
echo $page->draw();
```

## Conclusion
This release provides a comprehensive set of tools for integrating Bootstrap 5 components into your PHP applications, making it easier to create responsive and visually appealing web interfaces.


## Installation

To install the library, you can use Composer. Run the following command in your project directory:

```bash
composer require vitexsoftware/php-ease-twbootstrap5
```

Alternatively, you can add the library to your `composer.json` file manually:

```json
{
    "require": {
        "vitexsoftware/php-ease-twbootstrap5": "^0.1"
    }
}
```

Then, run:

```bash
composer install
```

After installation, you can include the autoload file in your PHP scripts to start using the library:

```php
require 'vendor/autoload.php';
```

You are now ready to use the TwitterBootstrap5 classes in your EasePHP Framework projects.

