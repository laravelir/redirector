[![Starts](https://img.shields.io/github/stars/laravelir/redirector?style=flat&logo=github)](https://github.com/laravelir/redirector/forks)  [![Forks](https://img.shields.io/github/forks/laravelir/redirector?style=flat&logo=github)](https://github.com/laravelir/redirector/stargazers) [![Total Downloads](https://img.shields.io/packagist/dt/laravelir/redirector.svg?style=flat-square)](https://packagist.org/packages/laravelir/redirector)

  


# laravel Package

A redirector package

Seo Toolkit for laravel projects

### Installation

1. Run the command below to add this package:

```
composer require laravelir/redirector
```

2. Open your config/app.php and add the following to the providers/aliases array:

```php
Laravelir\Redirector\Providers\RedirectorServiceProvider::class, # provider
```

```php
'Redirector' => Laravelir\Redirector\Facades\RedirectorFacade::class # aliases
```

3. Run the command below to install package:

```
php artisan redirector:install
```

### Features

for redirector service add this middleware
```
'redirector => \Laravelir\Redirector\Http\Middleware\RedirectorMiddleware::class,
```


for enforce https this middleware
```php
'enforce_https' => \Laravelir\Redirector\Http\Middleware\RedirectorEnforceHttps::class,
```
add this to env:
```php
REDIRECTOR_ENFORCE_HTTPS=true
```



### Redirector Service

```php
use Laravelir\Redirector\Services;

$redirector = resolve(Redirector::class);

$redirector->store($source_url, $destination_url, $response_code);
$redirector->shouldRedirect(Request $request);
$redirector->redirect(Request $request);

```


#### Goals of this package (Todo)

enable/disable www to non-www

add slashed to end of all routes or remove it

force redirect http to https

add route hit counter

implements features of wordpress plugins like redirect-301, SEO Redirection Premium, safe-redirect-manager, Yoast seo Pro,  Rank Math 


add redis - file - Mysql - Mongodb engine Repository

add redirect ro lower

abort index.php page to 404

add exclude urls for redirects 

add wildcard params (Regular Expression Constraints)



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
