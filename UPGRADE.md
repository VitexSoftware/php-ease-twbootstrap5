# Upgrade Guide

## Upgrading from php-ease-twbootstrap4 to php-ease-twbootstrap5

This guide covers migration from the Bootstrap 4 companion library
(`vitexsoftware/ease-twbootstrap4`, namespace `Ease\TWB4`) to this
Bootstrap 5 library (`vitexsoftware/ease-twbootstrap5`, namespace `Ease\TWB5`).

### 1. Replace the package

```bash
composer remove vitexsoftware/ease-twbootstrap4
composer require vitexsoftware/ease-twbootstrap5
```

### 2. Update the namespace

Replace every occurrence of `Ease\TWB4\` with `Ease\TWB5\` in your PHP files.

```bash
# Quick sed pass across a project:
find src -name '*.php' -exec sed -i 's/Ease\\TWB4\\/Ease\\TWB5\\/g' {} +
```

### 3. Badge — argument order is reversed (breaking)

The most impactful API change. In TWB4 the type came first; in TWB5 the
content comes first — matching the Bootstrap 5 `.text-bg-*` class convention.

```php
// BS4 / TWB4 — WRONG in TWB5
new Badge('primary', 'New');

// BS5 / TWB5 — correct
new Badge('New', 'primary');
```

The symptom of passing arguments in the old order is that the type string
appears as visible text and the class becomes `text-bg-New` (the content value).

### 4. Alert — argument order unchanged

`Alert` keeps the same TWB4 signature: `Alert($type, $content)`.

```php
// same in both versions
new Alert('success', 'Saved!');
```

### 5. Bootstrap 5 utility class renames

Bootstrap 5 renamed many utility classes. Update any raw class strings you
pass through `properties` arrays or custom CSS.

| Bootstrap 4 | Bootstrap 5 |
|---|---|
| `ml-*` / `mr-*` | `ms-*` / `me-*` (start / end) |
| `pl-*` / `pr-*` | `ps-*` / `pe-*` |
| `text-left` / `text-right` | `text-start` / `text-end` |
| `float-left` / `float-right` | `float-start` / `float-end` |
| `font-weight-bold` | `fw-bold` |
| `font-weight-normal` | `fw-normal` |
| `font-italic` | `fst-italic` |
| `badge-*` (e.g. `badge-primary`) | `text-bg-*` (e.g. `text-bg-primary`) |
| `badge-pill` | `rounded-pill` |
| `form-group` | removed — use `.mb-3` wrapper or `FormGroup` class |
| `form-control-file` | `form-control` |
| `custom-control-*` | `form-check-*` |
| `custom-select` | `form-select` |
| `custom-range` | `form-range` |
| `sr-only` | `visually-hidden` |

### 6. Removed Bootstrap 4 components

| BS4 component | BS5 replacement |
|---|---|
| Jumbotron | Use `Panel` / `Card` with custom padding |
| Media object | Bootstrap grid (`Row` + `Col`) or flexbox |
| Card deck / card columns | CSS grid (`row-cols-*`) |

### 7. jQuery is no longer required

Bootstrap 5 dropped jQuery. Remove any `<script src="jquery…">` you added
explicitly. `WebPage` does not include jQuery automatically.

### 8. New components available in TWB5

The following classes have no TWB4 equivalent and are available immediately
after the upgrade:

`Accordion`, `Breadcrumb`, `ButtonGroup`, `Collapse`, `ListGroup`, `Modal`,
`Nav`, `Pagination`, `Progress`, `Spinner`, `Toast`

---

## Upgrading within php-ease-twbootstrap5

### v1.2 → v1.3

#### FormGroup — new constructor signature (breaking)

`FormGroup` was ported to proper Bootstrap 5 markup. The old signature
(`$id, $label, $input, $helptext`) is replaced with a label-first signature.

```php
// v1.2 — old
new FormGroup('email', 'E-mail address', new InputEmailTag('email'), 'We will never share your email.');

// v1.3 — new
new FormGroup('E-mail address', new InputEmailTag('email'), null, 'We will never share your email.');
```

The wrapper `div` now uses `.mb-3` (Bootstrap 5 standard) instead of the
removed `.form-group` class.

#### LinkButton — `btn-default` removed

`btn-default` does not exist in Bootstrap 5. If you passed `'default'` as
the type, it now falls back to `btn-secondary`.

```php
// renders btn-secondary in v1.3
new LinkButton('/path', 'Click');
```

#### OffCanvas — now toggleable

`OffCanvas` gained a `triggerButton()` factory method (same pattern as
`Modal` and `Collapse`).

```php
$drawer = new OffCanvas('nav-drawer', 'Navigation', $menuContent, 'end');
// render the toggle separately, then the drawer:
echo $drawer->triggerButton('Open Menu', 'primary')->draw();
echo $drawer->draw();
```

`Navbar` gained an `$offcanvas` property: set it to `true` to render the
responsive menu as an offcanvas drawer instead of a Bootstrap collapse.

#### 11 new components

`Accordion`, `Breadcrumb`, `ButtonGroup`, `Collapse`, `ListGroup`, `Modal`,
`Nav`, `Pagination`, `Progress`, `Spinner`, `Toast` — no migration needed;
they are additive.

### v1.1 → v1.2

- `Panel` header, body and footer are now public `DivTag` properties
  (`$panel->header`, `$panel->body`, `$panel->footer`) — direct HTML
  manipulation is straightforward without a subclass.
- `NavItemDropDown::finalize()` bug fixed — dropdown items now render in
  all contexts.

### v1.0 → v1.1

No breaking changes. Bug fixes and internal refactoring only.
