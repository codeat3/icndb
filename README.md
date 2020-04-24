# A PHP wrapper for Internet Chuck Norris Database (ICNDb)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codeat3/icndb.svg?style=flat-square)](https://packagist.org/packages/codeat3/icndb)
[![Build Status](https://img.shields.io/travis/codeat3/icndb/master.svg?style=flat-square)](https://travis-ci.org/codeat3/icndb)
[![Quality Score](https://img.shields.io/scrutinizer/g/codeat3/icndb.svg?style=flat-square)](https://scrutinizer-ci.com/g/codeat3/icndb)
[![Total Downloads](https://img.shields.io/packagist/dt/codeat3/icndb.svg?style=flat-square)](https://packagist.org/packages/codeat3/icndb)

This PHP package is a fork of [jcldavid/ICNDb](https://github.com/jcldavid/ICNDb) by Cyrus David.

## Installation

You can install the package via composer:

```bash
composer require codeat3/icndb
```

## Usage

``` php
$config = array(
	'firstName' => 'Cyrus',
	'lastName' => 'David'
);

// Pass an optional parameter to change the firstName and lastName
// Default is Chuck Norris
$chuck = new Swapnilsarwe\ICNDbClient($config);

// Get the total Chuck Norris jokes stored in ICNDb
$total = $chuck->count()->get();

// Get all categories
$categories = $chuck->categories()->get();

// Get a specific joke by it's ID
$specific = $chuck->specific(18)->get();

//Get a random joke
$random = $chuck->random()->get();

// Get multiple random jokes
$random2 = $chuck->random(3)->get();

// use exclude() to get jokes not belong to that category
$exclude = $chuck->random()->exclude('nerdy')->get();

// you can also supply an array
$exclude2 = $chuck->random()->exclude(array('nerdy', 'explicit'))->get();

// or chain them
$exclude3 = $chuck->random(2)->exclude('explicit')->exclude('nerdy')->get();

// use limitTo() to get jokes only from that category
// you may supply an array or chain them like exclude()
$limit = $chuck->random()->limitTo('nerdy')->get();
```

## Exceptions

**APIUnavailableException** - API is either unreachable/unavailable

**ChainNotAllowedException** - When these methods are chained together `random()`, `specific($id)`, `categories()`, `count()`

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email swapnilsarwe@gmail.com instead of using the issue tracker.

## Credits

- [Swapnil Sarwe](https://github.com/codeat3)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).