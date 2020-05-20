# laravel-gjk-api
贵健康API接口请求SDK


[![Build Status](https://scrutinizer-ci.com/g/mucts/laravel-gjk-api/badges/build.png)](https://scrutinizer-ci.com/g/mucts/laravel-gjk-api)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/mucts/laravel-gjk-api/badges/code-intelligence.svg)](https://scrutinizer-ci.com/g/mucts/laravel-gjk-api)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mucts/laravel-gjk-api/badges/quality-score.png)](https://scrutinizer-ci.com/g/mucts/laravel-gjk-api)
[![Latest Stable Version](https://poser.pugx.org/mucts/laravel-gjk-api/v/stable.svg)](https://packagist.org/packages/mucts/laravel-gjk-api) 
[![Total Downloads](https://poser.pugx.org/mucts/laravel-gjk-api/downloads.svg)](https://packagist.org/packages/mucts/laravel-gjk-api) 
[![Latest Unstable Version](https://poser.pugx.org/mucts/laravel-gjk-api/v/unstable.svg)](https://packagist.org/packages/mucts/laravel-gjk-api) 
[![License](https://poser.pugx.org/mucts/laravel-gjk-api/license.svg)](https://packagist.org/packages/mucts/laravel-gjk-api)

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
