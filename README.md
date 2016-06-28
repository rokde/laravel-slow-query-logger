# Slow Query Logger for Laravel

[![Latest Stable Version](https://poser.pugx.org/rokde/laravel-slow-query-logger/v/stable.svg)](https://packagist.org/packages/rokde/laravel-slow-query-logger) [![Latest Unstable Version](https://poser.pugx.org/rokde/laravel-slow-query-logger/v/unstable.svg)](https://packagist.org/packages/rokde/laravel-slow-query-logger) [![License](https://poser.pugx.org/rokde/laravel-slow-query-logger/license.svg)](https://packagist.org/packages/rokde/laravel-slow-query-logger) [![Total Downloads](https://poser.pugx.org/rokde/laravel-slow-query-logger/downloads.svg)](https://packagist.org/packages/rokde/laravel-slow-query-logger)

## Quickstart

```
composer require rokde/laravel-slow-query-logger
```

Add to `providers` in `config/app.php`:

```
Rokde\LaravelSlowQueryLogger\LaravelSlowQueryLoggerProvider::class,
```

## Installation

Add to your composer.json following lines

	"require": {
		"rokde/laravel-slow-query-logger": "~0.0"
	}

Add `Rokde\LaravelSlowQueryLogger\LaravelSlowQueryLoggerProvider::class,` to `providers` in `config/app.php`.

Run `php artisan vendor:publish --provider="Rokde\LaravelSlowQueryLogger\LaravelSlowQueryLoggerProvider"`

## Configuration

### `time-to-log`

Only log queries longer than this value in microseconds.

### `environments`

Set the enabled environments to log slow queries.

### `log-level`

Set the log-level for logging the slow queries.

## Usage

Nothing to do after adding to `/config/app.php`. Watch your logs.
