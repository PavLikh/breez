## Getting started

#### Клонирование репозитория в директорию с проектами

```bash
$ cd ~/projects
$ git clone https://github.com/PavLikh/breez.git
```

####  .env файл

#### MySQL settings
MYSQL_USER=admin \
MYSQL_PASSWORD=111111 \
MYSQL_HOST=mysql \
MYSQL_PORT=3306 \
MYSQL_DATABASE=app_db

#### Запуск контейнеров

Вместо стандартного запуска контейнеров через ```docker-compose up``` можно исполнять файл ```up.sh```

```bash
$ sudo ./up.sh
```

> Перед запуском нужно убедиться что выключены другие контейнеры и службы, слушающие порт 80