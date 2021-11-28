# markdown-blogger
A markdown powered blog post creator package

## Installation

```shell
composer require trianstudios/press
```

### Laravel 5.5+ Integration

Laravel's package discovery will take care of integration for you.


### Laravel 5.* Integration

Add the service provider to your `config/app.php` file:

```php

    'providers' => array(

        trianstudios\Press\PressBaseServiceProvider::class,

    ),

```

Add the facade to your `config/app.php` file:

```php

    'aliases' => array(

        'Press' => trianstudios\Press\Facades\Press::class,

    ),

```

## Publishing of assets

### Publishing the press config file
The defaults are set in `config/press.php`. Publish the config to copy the file to your own config:
```sh
php artisan vendor:publish --tag="press-config"
```

### Publishing the Service Provider

Use the `press-provider` tag to publish the press service provider for your own customization:
```sh
php artisan vendor:publish --tag="press-provider"
```

