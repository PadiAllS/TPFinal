<p align="center">
    <a href="https://www.uncoma.edu.ar" target="_blank">
        <img src="https://www.uncoma.edu.ar/wp-content/uploads/2018/04/LOGOUNC-e1522858761795.png" height="100px">
    </a>
    <h1 align="center">Trabajo Práctico Final - Tecnicatura Universitaria en Desarrollo Web</h1>
    <br>
</p>

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      modules/            contains modules API
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).


### Install from an Script of this Project:

Execute for console this file **start-project.sh** in folder bin. 


### Install with Docker and permissions in your System

Run the script in console **first-start.sh** in carpeta bin.

Update your vendor packages
 ```
   $ docker-compose run --rm php composer update --prefer-dist
 ```   
Run the installation triggers (creating cookie validation code)
 ```
  $  docker-compose run --rm php composer install    
  ```   
    
CONFIGURATION
-------------
Rename file **docker-compose.dist.yml** to **docker-compose.yml**

### Database

Edit the file `docker-compose.yml` with real data, for example:

```services:
   db:
     image: mysql:5.7.27
     environment:
        MYSQL_DATABASE: dbname
        MYSQL_ROOT_PASSWORD: passroot
```
### Config Yii2 with MySQL

Edit the file `docker-compose.yml` with real data, for example:

```   ports:
        - 8000:80
      environment:
        DB_DATABASE: dbname
        DB_PASSWORD: passroot
        DB_HOST: db
```
### Config PhpMyAdmin with project
```
         PMA_HOST: db
         PMA_USER: root
         PMA_PASSWORD: dbname
         PMA_PORT: 3306
      ports:
         - 8001:80
```     
Start the container
 ```
  $  docker-compose up -d
 ```   
### (Optional) Create  database and update it by applying migrations if you have them.

 Run from a script of this project to facilitate:

Execute for console this file **yii.sh** in folder bin. 
   ```
 $ yii migrate/create <name>
   ```
