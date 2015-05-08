# CakePHP Application Example Using the Crud Plugin

This is an example applicaiton that implements the bookmarker tutorial form the CakePHP manual, but using
the [super powerful Crud plugin](https://github.com/friendsofcake/crud).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist -s dev lorenzo/cakephp3-bookmarker [app_name]`.

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application.

## Run migrations

After setting up the databse, load the tables

```
bin/cake migrations migrate
```
