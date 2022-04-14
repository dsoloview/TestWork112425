
## Установка проекта

1. Склонировать репозиторий
2. Настроить файл `.env` из `.env.example` (Задать базу данных и API_KEY (По умолчанию "hello"))
3. `Composer install` для установки необходимых библиотек
4. `php artisan migrate:fresh --seed` для создания таблиц в БД и наполнения данными
5. `php artisan key:generate` для генерации уникального ключа
6. `php artisan serve` для запуска проекта
7. Всё готово

В header запроса добавить key = apikey ; value = hello (По умолчанию)
