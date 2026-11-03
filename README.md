# Slimscroll widget for Yii2 framework

[![Latest Version](https://img.shields.io/packagist/v/conquer/slimscroll.svg)](https://packagist.org/packages/conquer/slimscroll)
[![Total Downloads](https://img.shields.io/packagist/dt/conquer/slimscroll.svg)](https://packagist.org/packages/conquer/slimscroll)
[![License](https://img.shields.io/packagist/l/conquer/slimscroll.svg)](LICENSE)

## Description

SlimScroll is a small (4.6KB) jQuery plugin that transforms any div into a scrollable area with a nice scrollbar - similar to the one Facebook and Google started using in their products recently. slimScroll doesn't occupy any visual space as it only appears on a user initiated mouse-over. User can drag the scrollbar or use mouse-wheel to change the scroll value.
For more information please visit [SlimScroll](http://rocha.la/jQuery-slimScroll) 

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
use conquer\slimscroll\SlimscrollWidget;

<?php SlimscrollWidget::begin(); ?>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat. Aenean ultricies ultrices mauris ac congue
</p>
<?php SlimscrollWidget::end(); ?>

```

## License

**conquer/slimscroll** is released under the MIT License. See the bundled [`LICENSE`](LICENSE) for details.
