# Apache PHP MySQL [![GitHub version](https://badge.fury.io/gh/damofd%2Fdocker-php-apache-mysql.svg)](https://badge.fury.io/gh/damofd%2Fdocker-php-apache-mysql)

Docker running Apache, MySQL and PHPMyAdmin.

## Overview

1. [Install prerequisites](#install-prerequisites)

    Before installing project make sure the following prerequisites have been met.

2. [Clone the project](#clone-the-project)

    We’ll download the code from its repository on GitHub.

4. [Run the application](#run-the-application)

    By this point we’ll have all the project pieces in place.

5. [Use Docker Commands](#use-docker-commands)

    When running, you can use docker commands for doing recurrent operations.

___

## Install prerequisites

To run the docker commands without using **sudo** you must add the **docker** group to **your-user**:

```
sudo usermod -aG docker your-user
```

All requisites should be available for your distribution. The most important are :

* [Git](https://git-scm.com/downloads)
* [Docker](https://docs.docker.com/engine/installation/)
* [Docker Compose](https://docs.docker.com/compose/install/)

Check if `docker-compose` is already installed by entering the following command : 

```sh
which docker-compose
```

Check Docker Compose compatibility :

* [Compose file version 3 reference](https://docs.docker.com/compose/compose-file/)

The following is optional but makes life more enjoyable :

```sh
which make
```

On Ubuntu and Debian these are available in the meta-package build-essential. On other distributions, you may need to install the GNU C++ compiler separately.

```sh
sudo apt install build-essential
```

### Images to use

* [PHP](https://hub.docker.com/_/php)
* [MySQL](https://hub.docker.com/_/mysql/)
* [PHPMyAdmin](https://hub.docker.com/r/phpmyadmin/phpmyadmin/)

You should be careful when installing third party web servers such as MySQL or Nginx.

This project use the following ports :

| Server     | Port |
|------------|------|
| MySQL      | 3306 |
| PHPMyAdmin | 8080 |
| Apache     | 80   |

___

## Clone the project

To install [Git](http://git-scm.com/book/en/v2/Getting-Started-Installing-Git), download it and install following the instructions :

```sh
git clone https://github.com/DamoFD/docker-php-apache-mysql.git
```

Go to the project directory :

```sh
cd docker-php-apache-mysql
```

### Project tree

```sh
.
├── README.md
├── docker-compose.yml
├── www
│   ├── index.php
│   ├── database.php
└── Dockerfile
```

___

## Run the application

1. Start the application :

    ```sh
    docker-compose up -d
    ```

    **Please wait this might take a several minutes...**

    ```sh
    docker-compose logs -f # Follow log output
    ```

3. Open your favorite browser :

    * [http://localhost](http://localhost/)
    * [http://localhost:8080](http://localhost:8080/) PHPMyAdmin (server: db username: root, password: password)

___

### Checking installed PHP extensions

```sh
docker-compose exec php php -m
```

### Handling database

#### MySQL shell access

```sh
docker exec -it mysql bash
```

and

```sh
mysql -u"$MYSQL_ROOT_USER" -p"$MYSQL_ROOT_PASSWORD"
```

#### Creating a backup of all databases

```sh
mkdir -p data/db/dumps
```

```sh
source .env && docker exec $(docker-compose ps -q mysqldb) mysqldump --all-databases -u"$MYSQL_ROOT_USER" -p"$MYSQL_ROOT_PASSWORD" > "data/db/dumps/db.sql"
```

#### Restoring a backup of all databases

```sh
source .env && docker exec -i $(docker-compose ps -q mysqldb) mysql -u"$MYSQL_ROOT_USER" -p"$MYSQL_ROOT_PASSWORD" < "data/db/dumps/db.sql"
```

#### Creating a backup of single database

**`Notice:`** Replace "YOUR_DB_NAME" by your custom name.

```sh
source .env && docker exec $(docker-compose ps -q mysqldb) mysqldump -u"$MYSQL_ROOT_USER" -p"$MYSQL_ROOT_PASSWORD" --databases YOUR_DB_NAME > "data/db/dumps/YOUR_DB_NAME_dump.sql"
```

#### Restoring a backup of single database

```sh
source .env && docker exec -i $(docker-compose ps -q mysqldb) mysql -u"$MYSQL_ROOT_USER" -p"$MYSQL_ROOT_PASSWORD" < "data/db/dumps/YOUR_DB_NAME_dump.sql"
```

## Help out

Any thought, feedback or (hopefully not!)
