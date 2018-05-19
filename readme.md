
## My Laravel Blog

  Simple Blog based on Laravel version 5.4

## Requirements

- PHP 7.0+
- MySql database (I'am using Xampp)
- [Composer](https://getcomposer.org/download/)

## Installation

```sh
git clone https://github.com/pdudekk/My-CMS-Blog.gitblog blog
cd blog
composer install
php artisan key:generate
```
Create database as in .env file or change this file to your own preferences.

.env file :
```sh
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=basicwebsite
DB_USERNAME=root
DB_PASSWORD=
...
```
Next step is migrate and seed database.
```sh
php artisan migrate
php artisan db:seed
```
## Meta

Distributed under the MIT license.

Author:
 [https://github.com/pdudekk](https://github.com/pdudekk)
