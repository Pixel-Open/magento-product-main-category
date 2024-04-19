# Magento Product Main Category

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.0-green)](https://php.net/)
[![Minimum Magento Version](https://img.shields.io/badge/magento-%3E%3D%202.4.4-green)](https://business.adobe.com/products/magento/magento-commerce.html)
[![GitHub release](https://img.shields.io/github/v/release/Pixel-Open/magento-product-main-category)](https://github.com/Pixel-Open/magento-product-main-category/releases)

## Presentation

The module adds a main category attribute to product.

![Product Main Category](screenshot.png)

## Requirements

- Magento >= 2.4.4
- PHP >= 8.0.0

## Installation

```
composer require pixelopen/magento-product-main-category
```

## Retrieve Product Main Category value

```php
$mainCategory = $product->getMainCategory();

// OR

$mainCategory = $product->getData('main_category');

// OR

$mainCategory = $product->getCustomAttribute('main_category')?->getValue();
```
