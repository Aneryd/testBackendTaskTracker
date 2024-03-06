ТЕСТОВОЕ ЗАДАНИЕ "API для управления задачами"

.env файл - конфигурация БД
```sh
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=testBackendTaskTracker
DB_USERNAME=root
DB_PASSWORD=password
```

Запуск с помощью Makefile:
```sh
make env - для создания и копировния из .env.example в .env, для Windows - make env-w
make build - для билда контейнеров
make up - для поднятия контейнеров
make vendor - для composer install
make key - для генерации ключа
make migrate - для запуска миграций
```

Запуск с помощью docker-compose:
```sh
cp -n .env.example .env - для создания и копировния из .env.example в .env, для Windows - cp .env.example .env
docker-compose build - для билда контейнеров
docker-compose up -d - для поднятия контейнеров
docker-compose exec -it app composer install - для composer install
docker-compose exec -it app php artisan key:generate - для генерации ключа
docker-compose exec -it app php artisan migrate:refresh --seed - для запуска миграций
```

Маршруты
```sh
http://localhost/api/
tasks - задачи (get, post, put, delete)
statuses - статусы (get, post, put, delete)
```