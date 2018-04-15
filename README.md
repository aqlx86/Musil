Introduction
------------
Musil is a simple logger that writes logs into elasticsearch.


Installation
------------

Add Musil to your composer.json file:

```composer.phar require "aqlx86/musil"```

Add the service provider to your Laravel application config:

```PHP
Musil\MusilServiceProvider::class
```

```
php artisan vendor:publish --provider="Musil\MusilServiceProvider"
```
