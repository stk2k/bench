Simple benchmark classes
=======================

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stk2k/bench.svg?style=flat-square)](https://packagist.org/packages/stk2k/bench)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/stk2k/bench.svg?branch=master)](https://travis-ci.org/stk2k/bench)
[![Coverage Status](https://coveralls.io/repos/github/stk2k/bench/badge.svg?branch=master)](https://coveralls.io/github/stk2k/bench?branch=master)
[![Code Climate](https://codeclimate.com/github/stk2k/bench/badges/gpa.svg)](https://codeclimate.com/github/stk2k/bench)
[![Total Downloads](https://img.shields.io/packagist/dt/stk2k/bench.svg?style=flat-square)](https://packagist.org/packages/stk2k/bench)

## Description

Simple benchmark classes


## Feature

## Demo

### Exsample 1: time benchmark shorthand
```php
use Stk2k\Bench\TimeBenchmark;

$handle = TimeBenchmark::start();

// benchmark target code here

$score = TimeBenchmark::score($handle);
echo 'score: ' . $score . ' msec';
```

### Exsample 2: memory benchmark shorthand
```php
use Stk2k\Bench\MemoryBenchmark;

$handle = MemoryBenchmark::start();

// benchmark target code here

$score = MemoryBenchmark::score($handle);
$score = array_map(function($v){ return $v . 'MB'; }, $score);
echo 'score: ' . print_r($score, true);
```

## Usage

## Requirement

PHP 7.1 or later

## Installing stk2k/bench

The recommended way to install stk2k/bench is through
[Composer](http://getcomposer.org).

```bash
composer require stk2k/bench
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

## License
[MIT](https://github.com/stk2k/bench/blob/master/LICENSE)

## Author

[stk2k](https://github.com/stk2k)

## Disclaimer

This software is no warranty.

We are not responsible for any results caused by the use of this software.

Please use the responsibility of the your self.


