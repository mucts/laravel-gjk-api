<p align="center"><img src="https://images.mucts.com/image/exp_def_white.png" width="400"></p>
<p align="center">
    <a href="https://scrutinizer-ci.com/g/mucts/laravel-gjk-api"><img src="https://scrutinizer-ci.com/g/mucts/laravel-gjk-api/badges/build.png" alt="Build Status"></a>
    <a href="https://scrutinizer-ci.com/g/mucts/laravel-gjk-api"><img src="https://scrutinizer-ci.com/g/mucts/laravel-gjk-api/badges/code-intelligence.svg" alt="Code Intelligence Status"></a>
    <a href="https://scrutinizer-ci.com/g/mucts/laravel-gjk-api"><img src="https://scrutinizer-ci.com/g/mucts/laravel-gjk-api/badges/quality-score.png" alt="Scrutinizer Code Quality"></a>
    <a href="https://packagist.org/packages/mucts/laravel-gjk-api"><img src="https://poser.pugx.org/mucts/laravel-gjk-api/d/total.svg" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/mucts/laravel-gjk-api"><img src="https://poser.pugx.org/mucts/laravel-gjk-api/v/stable.svg" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/mucts/laravel-gjk-api"><img src="https://poser.pugx.org/mucts/laravel-gjk-api/license.svg" alt="License"></a>
</p>

# Laravel gjk api
贵健康API接口请求SDK

## Installation

### Server Requirements
>you will need to make sure your server meets the following requirements:

- `php >=7.2`
- `JSON PHP Extension`
- `OpenSSL PHP Extension`
- `GMP PHP Extension`
- `BCMath PHP Extension`
- `laravel/framework ^7.0`


### Laravel Installation
```
composer require "mucts/laravel-gjk-api"

```

## Usage

```php
$id = gjk_request('/user_info',['user_id'=>10012111]);
```

### Use Facade

```php
$info = Gjk::request('/user_info',['user_id'=>10012111]);
```

### Update Configuration
```php
use MuCTS\Laravel\GuiJK\Config\Config;
$info = Gjk::setConfig(new Config(['url'=>'https://..','app_id'=>10000,'secret_key'=>'','version'=>2000]))
->request('/user_info',['user_id'=>10012111]);
```


## Configuration
If `config/gjk.php` not exist, run below:
```
php artisan vendor:publish
```
