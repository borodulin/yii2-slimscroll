# Slimscroll widget for Yii2 framework

[![Latest Version](https://img.shields.io/packagist/v/conquer/slimscroll.svg)](https://packagist.org/packages/conquer/slimscroll)
[![Total Downloads](https://img.shields.io/packagist/dt/conquer/slimscroll.svg)](https://packagist.org/packages/conquer/slimscroll)
[![CI](https://github.com/borodulin/yii2-slimscroll/actions/workflows/ci.yml/badge.svg)](https://github.com/borodulin/yii2-slimscroll/actions/workflows/ci.yml)
[![License](https://img.shields.io/packagist/l/conquer/slimscroll.svg)](LICENSE)

## Description

SlimScroll is a small (4.6KB) jQuery plugin that transforms any div into a scrollable area with a nice scrollbar - similar to the one Facebook and Google started using in their products recently. slimScroll doesn't occupy any visual space as it only appears on a user initiated mouse-over. User can drag the scrollbar or use mouse-wheel to change the scroll value.
For more information please visit [SlimScroll](https://github.com/rochal/jQuery-slimScroll).

## Requirements

- PHP 7.4 or 8.x
- Yii 2.0
- [asset-packagist](https://asset-packagist.org) repository configured in your application's `composer.json` (standard for Yii2 app templates)

## Installation

Install the extension via [Composer](https://getcomposer.org):

```bash
composer require conquer/slimscroll:^2.1
```

## Usage

```php
<?php
use conquer\slimscroll\SlimscrollWidget;
?>

<?php SlimscrollWidget::begin([
    // slimScroll options: https://github.com/rochal/jQuery-slimScroll#options
    'options' => [
        'height' => '250px',
        'color' => '#00f',
        'alwaysVisible' => true,
    ],
    // attributes of the container
    'htmlOptions' => ['class' => 'news'],
    'tag' => 'div',
]); ?>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
<?php SlimscrollWidget::end(); ?>
```

> The jQuery slimScroll plugin is no longer developed (last release 1.3.8, 2016). It works with jQuery 3,
> which Yii 2 uses, but relies on `.bind()` / `.unbind()`, removed in jQuery 4.

## License

**conquer/slimscroll** is released under the MIT License. See the bundled [`LICENSE`](LICENSE) for details.
