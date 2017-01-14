# Africa's Talking API Laravel Implementation
A simple Laravel package for making it easier to use the official [Africa's Talking PHP gateway](http://docs.africastalking.com/sms/sending/php) in your Laravel application.

## Requirements
- [PHP >=5.6.0](http://php.net/)
- [Laravel 5.x](https://github.com/laravel/framework)

## Quick Installation

#### Composer
`composer require "lawrence615/atgate:dev-master"`

#### Service Provider
`Mobidev\ATGate\ATGateServiceProvider::class`

### Aliases
`'AfricaTGate' => Mobidev\ATGate\Facades\AfricaTGate::class`

#### Configuration and Assets
`$ php artisan vendor:publish`

## How to use
The last step of installation, `$ php artisan vendor:publish`, creates a config file (atgate.php) in the config directory.

### Update AT credentials inside atgate.php
Update both username and api_key inside config/atgate.php. 

You can generate the API Key [here](https://account.africastalking.com/settings/apikey). You will need to create an account first, username will be the one you create an account with.