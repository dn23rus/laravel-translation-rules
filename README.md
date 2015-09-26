## Overview

This package gives ability to use translation rules.

## Installation

`composer require dn23rus/laravel-translation-rules`

## Configuration

Add service provider to config/app.php

```php
    'providers' => [
        //...
        Dmbur\TranslationRule\TranslationRuleServiceProvider::class
    ]
```

Run the command:

`php artisan vendor:publish`

to publish translation_rules.php

## Usage

Now you can add rule to `resources/lang/translation_rules.php`, for example rule for Russian language:

```php
    'ru' => function ($n) {
        return ($n % 10 == 1 && $n % 100 != 11) ? 0 :
            ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20) ? 1 : 2);
    },
```

And example of message in file `resource/lang/ru/app.php`:

```php
    'apple' => '{0}яблоко|{1}яблока|{2}яблок'
```

Sow

```php
echo 5 . ' ' . trans_rule('app.apple', 5) // will produce 5 яблок
```
