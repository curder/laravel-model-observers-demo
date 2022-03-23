[![Test Laravel Github action](https://github.com/curder/laravel-model-observers-demo/actions/workflows/run-test.yml/badge.svg?branch=master)](https://github.com/curder/laravel-model-observers-demo/actions/workflows/run-test.yml)
[![PHPStan](https://github.com/curder/laravel-model-observers-demo/actions/workflows/phpstan.yml/badge.svg?branch=master)](https://github.com/curder/laravel-model-observers-demo/actions/workflows/phpstan.yml)
[![Check & fix styling](https://github.com/curder/laravel-model-observers-demo/actions/workflows/php-cs-fixer.yml/badge.svg?branch=master)](https://github.com/curder/laravel-model-observers-demo/actions/workflows/php-cs-fixer.yml)

## 介绍

Laravel Model Observers 顾名思义，Laravel 的模型观察者。

## 安装

```bash
git clone https://github.com/curder/laravel-model-observers-demo && cd laravel-model-observers-demo

cp .env.example .env

touch database/database.sqlite
composer install
php artisan key:generate
```

## 配置

打开 `.env` 文件，修改里面的数据库配置信息。

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

修改为

```dotenv
DB_CONNECTION=sqlite
```

修改完之后使用数据库迁移文件安装所需的数据表。

```bash
php artisan migrate
```

具体内容查看[这里](https://curder.github.io/laravel-study/model/laravel-model-observers.html)
