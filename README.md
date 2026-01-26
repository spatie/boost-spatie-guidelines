# Spatie Guidelines for Laravel Boost

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/boost-spatie-guidelines.svg?style=flat-square)](https://packagist.org/packages/spatie/boost-spatie-guidelines)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/spatie/boost-spatie-guidelines/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/spatie/boost-spatie-guidelines/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/boost-spatie-guidelines.svg?style=flat-square)](https://packagist.org/packages/spatie/boost-spatie-guidelines)

Bring Spatie's battle-tested Laravel & PHP coding guidelines to your AI-assisted development workflow with Laravel Boost.

## Installation

Install the package via Composer:

```bash
composer require spatie/boost-spatie-guidelines --dev
```

Then install the guidelines with Boost:

```bash
php artisan boost:install
```

The guidelines will be automatically copied to `.ai/guidelines/boost-spatie-guidelines/` and loaded by Laravel Boost.

## What's Included

This package provides AI-optimized versions of Spatie's Laravel & PHP coding standards, including:

- PSR compliance (PSR-1, PSR-2, PSR-12)
- Type declarations and nullable syntax
- Class structure and property promotion
- Control flow patterns (happy path, early returns)
- Laravel conventions (routes, controllers, configuration)
- Naming conventions (camelCase, kebab-case, snake_case)
- Blade templates and validation
- Testing best practices

These guidelines help AI assistants like Claude Code generate code that follows Spatie's proven standards.

## Usage

Once installed, AI assistants using Laravel Boost will automatically reference these guidelines when generating code. No additional configuration needed!

## Keeping Guidelines Up to Date

Re-run the Boost installer after updating the package to refresh guidelines:

```bash
composer update spatie/boost-spatie-guidelines
php artisan boost:install
```

## Full Guidelines

View the complete, human-readable guidelines at [spatie.be/guidelines](https://spatie.be/guidelines).

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for recent changes.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
