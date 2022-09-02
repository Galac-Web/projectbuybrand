# BuyBrand
## Распаковка
1. Склонируйте репозиторий
```console
git clone git@github.com:webdevrus/buybrand.git
```
## Установка
---
1. Установите зависимости
```console
composer install
```
2. Скопируйте `.env`
```console
cp .env.example .env
```
3. Сгенерируйте ключ Laravel и создайте символьную ссылку на `/storage`
```console
php artisan key:generate

php artisan storage:link
```
4. Укажите данные для подключения к БД в `.env`
```
# MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

# Парсер
```console
$ php artisan parser:media
```
**Доступные опции:**

`--truncate` — очистка таблицы перед парсингом

# Персоны
```console
$ php artisan db:seed --class=PersonsTableSeeder
```
Тестовые данные таблицы персон (связываются с медиа материалами).

# Тестирование
```console
$ composer test
```
```console
$ composer test-coverage
```