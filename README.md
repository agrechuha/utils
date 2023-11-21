# Полезные утилиты для работы

_Включает в себя:_  
_- URL-парсер_

## Требования

- PHP >=8.0

## Установка

```bash
$ composer require agrechuha/utils
```

## Использование

```php
<?php
$urlParser = new UrlParser('https://otus.ru/learning/265134/')
echo $urlParser->getHost(); // otus.ru
```