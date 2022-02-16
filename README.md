- [![Starts](https://img.shields.io/github/stars/miladimos/redirector?style=flat&logo=github)](https://github.com/miladimos/redirector/forks)
- [![Forks](https://img.shields.io/github/forks/miladimos/redirector?style=flat&logo=github)](https://github.com/miladimos/redirector/stargazers)
  [![Total Downloads](https://img.shields.io/packagist/dt/miladimos/laravel-.svg?style=flat-square)](https://packagist.org/packages/miladimos/laravel-)


# laravel Package

A redirector pacakge

### Installation

1. Run the command below to add this package:

```
composer require laravelir/redirector
```

2. Open your config/app.php and add the following to the providers array:

```php
Laravelir\Redirector\Providers\RedirectorServiceProvider::class,
```

3. Run the command below to install package:

```
php artisan redirector:install
```

1. add below middleware to middleware:

```
\Laravelir\Redirector\Http\Middleware\RedirectorMiddleware::class,
```


features:
www to non-www
add slashed to end of all routes

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [:author_name](https://github.com/:author_username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
