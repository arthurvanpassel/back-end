TODO APP
==================

## Online versie site
link naar online site: arthur.vanpassel.mtantwerp.eu

## Lokale site:
    
### database info
#### config/database.php:
    ...
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'todo'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', 'root'),
    ...

#### .env
    ...
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=todo
    DB_USERNAME=root
    DB_PASSWORD=root
    ...

### run volgende code om site te starten:

    composer install
    composer dump-autoload
    php artisan migrate:reset
    php artisan migrate
    php artisan db:seed
    php artisan serve

## Login gegevens

### user 1:
    username: Arthur
    password: arthur
### user 2:
    username: Sam
    password: sam
