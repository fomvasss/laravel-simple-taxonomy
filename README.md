# Manage taxonomy inside your Laravel app

[![License](https://img.shields.io/packagist/l/fomvasss/laravel-simple-taxonomy.svg?style=for-the-badge)](https://packagist.org/packages/fomvasss/laravel-simple-taxonomy)
[![Build Status](https://img.shields.io/github/stars/fomvasss/laravel-simple-taxonomy.svg?style=for-the-badge)](https://github.com/fomvasss/laravel-simple-taxonomy)
[![Latest Stable Version](https://img.shields.io/packagist/v/fomvasss/laravel-simple-taxonomy.svg?style=for-the-badge)](https://packagist.org/packages/fomvasss/laravel-simple-taxonomy)
[![Total Downloads](https://img.shields.io/packagist/dt/fomvasss/laravel-simple-taxonomy.svg?style=for-the-badge)](https://packagist.org/packages/fomvasss/laravel-simple-taxonomy)
[![Quality Score](https://img.shields.io/scrutinizer/g/fomvasss/laravel-simple-taxonomy.svg?style=for-the-badge)](https://scrutinizer-ci.com/g/fomvasss/laravel-simple-taxonomy)

Create and manage taxonomy (terms) in Laravel App.

## Installation

```bash
composer require fomvasss/laravel-simple-taxonomy
```

You can publish the migration with:

```bash
php artisan vendor:publish --provider="Fomvasss\SimpleTaxonomy\TaxonomyServiceProvider"
```

After publishing the migration you can create the `terms` table by running the migrations:

```bash
php artisan migrate
php artisan db:seed --class=TaxonomySeeder
```

Also, You can usage the config: `configs/taxonomy.php` 


## Usage


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Links
* [https://github.com/lazychaser/laravel-nestedset](https://github.com/lazychaser/laravel-nestedset)
* [https://en.wikipedia.org/wiki/Taxonomy_(general)](https://en.wikipedia.org/wiki/Taxonomy_(general))
* [https://en.wikipedia.org/wiki/Nesting_(computing)](https://en.wikipedia.org/wiki/Nesting_(computing))
