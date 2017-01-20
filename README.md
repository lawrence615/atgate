# Africa's Talking API Laravel Implementation
[![Latest Stable Version](https://poser.pugx.org/lawrence615/atgate/v/stable)](https://packagist.org/packages/lawrence615/atgate)
[![Total Downloads](https://poser.pugx.org/lawrence615/atgate/downloads)](https://packagist.org/packages/lawrence615/atgate)
[![Latest Unstable Version](https://poser.pugx.org/lawrence615/atgate/v/unstable)](https://packagist.org/packages/lawrence615/atgate)
[![License](https://poser.pugx.org/lawrence615/atgate/license)](https://packagist.org/packages/lawrence615/atgate)

A simple Laravel package for making it easier to use the official [Africa's Talking PHP gateway](http://docs.africastalking.com/sms/sending/php) in your Laravel application.

## Requirements
- [PHP >=5.6.0](http://php.net/)
- [Laravel 5.x](https://github.com/laravel/framework)

## Quick Installation

**Install the Package Via Composer:**

```shell
$ composer require "lawrence615/atgate:dev-master"
```

**Add the Service Provider to your ```config/app.php``` file:**

```php
 'providers' => [
    ...
    Mobidev\ATGate\ATGateServiceProvider::class,
    ...
 ]
```

**Add the Facade to your ```config/app.php``` file:**

```php
    'aliases' => [
        ...
        'AfricaTGate' => Mobidev\ATGate\Facades\AfricaTGate::class,
        ...
    ]
```

**Publish configuration and assets**

`$ php artisan vendor:publish`

## Configuration
The last step of installation, `$ php artisan vendor:publish`, creates a config file (atgate.php) in the config directory.

### Update AT credentials inside atgate.php
Update both username and api_key inside config/atgate.php. 

You can generate the API Key [here](https://account.africastalking.com/settings/apikey). You will need to create an account first, username will be the one you create an account with.

## Usage in New Applications
Import/use the facade in your controller

 
```php
   use AfricaTGate;
```

* Default

```php
   $response = AfricaTGate::sendSMS("0720XXXXXX", "Testing. Test SMS.");
```

* With Sender Id

```php
   $response = AfricaTGate::from('Sender_Id')->sendSMS("0720XXXXXX", "Testing. Test SMS.");
```


