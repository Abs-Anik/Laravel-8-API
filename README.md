<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Api
## Passport Setup

1. Install Passport
composer require laravel/passport
<br/>
COMPOSER_MEMORY_LIMIT=-1 composer require laravel/passport
<br/>
2. Migration
php artisan migrate

3. Key Generate
php artisan passport:install

4. User Model
use Laravel\Passport\HasApiTokens;
<br/>
use HasApiTokens, HasFactory, Notifiable;

5. Update App\Providers\AuthServiceProvider
use Laravel\Passport\Passport;

in boot function add
Passport::routes();

6. Update config/auth.php

inside guard below web add this

'api' => [
	'driver' => 'passport',
	'provider' => 'users',
]

7. create route and method

