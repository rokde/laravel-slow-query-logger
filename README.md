# Slow Query Logger for Laravel

[![Latest Stable Version](https://poser.pugx.org/rokde/laravel-slow-query-logger/v/stable.svg)](https://packagist.org/packages/rokde/laravel-slow-query-logger) [![Latest Unstable Version](https://poser.pugx.org/rokde/laravel-slow-query-logger/v/unstable.svg)](https://packagist.org/packages/rokde/laravel-slow-query-logger) [![License](https://poser.pugx.org/rokde/laravel-slow-query-logger/license.svg)](https://packagist.org/packages/rokde/laravel-slow-query-logger) [![Total Downloads](https://poser.pugx.org/rokde/laravel-slow-query-logger/downloads.svg)](https://packagist.org/packages/rokde/laravel-slow-query-logger)

## Quickstart

```
composer require rokde/laravel-slow-query-logger
```

Look into your `laravel.log` file to see your messy queries.

## Installation

Add to your composer.json following lines

	"require": {
		"rokde/laravel-slow-query-logger": "^1.*"
	}

Run `php artisan vendor:publish --provider="Rokde\LaravelSlowQueryLogger\LaravelSlowQueryLoggerProvider"`

## Configuration

### `enabled`

Enable the slow queries logger.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_ENABLED`. It is `false` by default.

### `channel`

Sets the channel to log in.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_CHANNEL`. It is `single` by default.

### `log-level`

Set the log-level for logging the slow queries.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_LOG_LEVEL`. It is `debug` by default.

### `time-to-log`

Only log queries longer than this value in microseconds.

You can set this value through environment variable `LARAVEL_SLOW_QUERY_LOGGER_TIME_TO_LOG`. It is `0.7` by default.

## Usage

Start your application and look into your logs to identify the slow queries.