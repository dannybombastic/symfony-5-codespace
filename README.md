![codespace](https://media-exp1.licdn.com/dms/image/C4D0BAQH8ECeZLIxb3Q/company-logo_200_200/0?e=2159024400&v=beta&t=ihBY5eiqqtbX8KuAN5XC99f55pE84AgXGDPO33nRMTo "codespace")
 
# Synfony 5 codespace

Symfony Framework training

* [Composer cli](#composer)
* [Maker cli](#maker)
* [Symfony 5 cli](#sf5cli)
* [Symfony Run Server](#run)
* [Symfony Apache-packi](#apache)
* [Symfony Doctrine commands](#commands)
* [Adding to GIT](#git)
* [Cheat sheet](#cli)

## [DONWLOAD COMPOSER CLI]

 * ref : https://getcomposer.org/download/
 
<div id="composer"></div>

##  [COMPOSER CLI]



###  create a full web aplications

 

``` sh

* composer create-project symfony/skeleton my_project_name

```

###  create a microservice Or API

``` sh

* composer create-project symfony/skeleton my_project_name

```

<div id="apache"></div>

## [APACHE PACK  INSTALLATION]



``` sh
 composer require symfony/apache-pack
 ```

 virtual host minimun configuration:

 

``` sh
<VirtualHost *:80>
    ServerName domain.tld
    ServerAlias www.domain.tld

    DocumentRoot /var/www/project/public
    DirectoryIndex /index.php

    <Directory /var/www/project/public>
        AllowOverride None
        Order Allow,Deny
        Allow from All

        FallbackResource /index.php
    </Directory>

    # uncomment the following lines if you install assets as symlinks
    # or run into problems when compiling LESS/Sass/CoffeeScript assets
    # <Directory /var/www/project>
    #     Options FollowSymlinks
    # </Directory>

    # optionally disable the fallback resource for the asset directories
    # which will allow Apache to return a 404 error when files are
    # not found instead of passing the request to Symfony
    <Directory /var/www/project/public/bundles>
        FallbackResource disabled
    </Directory>
    ErrorLog /var/log/apache2/project_error.log
    CustomLog /var/log/apache2/project_access.log combined

    # optionally set the value of the environment variables used in the application
    #SetEnv APP_ENV prod
    #SetEnv APP_SECRET <app-secret-id>
    #SetEnv DATABASE_URL "mysql://db_user:db_pass@host:3306/db_name"
</VirtualHost>
```

#### Apache and Nginx Ref.

* ref: https://symfony.com/doc/current/setup/web_server_configuration.html

## [DONWLOAD SYMFONY CLI]

#### ref: https://symfony.com/download

<div id="sf5cli"></div>

##   [SYMFONY CLI]



###  create a full web aplications

``` sh

*   symfony new my_project_name --full

```

###  create a microservice Or API

``` sh

*   symfony new my_project_name --full

```
<div id="run"></div>

##  [SYMFONY SERVER RUN]



### optional build-in server Port ej 4000

``` sh

*   symfony console server:start

```

<div id="maker"></div>

##  [MAKE-BUNDLE CLI]



### # installation

``` sh

  *  composer require symfony/maker-bundle --dev

```

### # getter and setters

``` sh
  make:entity --regenerate App *r App\subdirectory_name?\
```

### # Usage list

*   make:controller
*   makecommand
*   make:entity
*   make:validator
*   make:crud 
*  ...

##### 

``` sh
symfony console MAKE:ENTITY  Group <-- this command is asking you about properties of your model 
```

<div id="commands"></div>

# [SYMFONY DOCTRINE COMMANDS]



### initiate databese

``` sh
 -  symfony console doctrine:database:create
```

###  check environment is ok 

``` sh

- symfony console  doctrine:ensure-production-settings --env=prod

```

### Allows Doctrine to introspect an existing database and create mapping

### generate metadata from your existing db

``` sh
 - symfony console  doctrine:mapping:import --force ClassName xml <-- or yaml type
```

### generating Entity from your metadata 

``` sh

- symfony doctrine:mapping:convert annotation ./src

```

### generate Entity from model db

``` sh

- symfony doctrine:mapping:import "Table_name" annotation --path=src/Entity

```

* ref: https://symfony.com/doc/3.3/doctrine/reverse_engineering.html 

####   afther it and adding all our annotations your have to generate the migrations file like this:

``` sh

-   symfony console doctrine:migrations:diff 

```

### check status 

``` sh

-   symfony console doctrine:migrations:status

```

### run migrations 

``` sh
 -  symfony console doctrine:migrations:migrate "version_number" 
```

    ej. (20200509131407) no quotation marks

<div id="git"></div>

##  [GIT]



``` sh

* creas folder 
* entrar en folder
* introduces git init 
* añadir origenes ej. git remote add origin https://gitlab.com/dannybombastic/synfony-5-codespace
* checkamos git status
* git pull --rebase 
* añadimos git add .
* comentamos git commit -m "coment"
* git push origin master

```
<div id="cli"></div>
## [CHEAT SHEET CLI PDF]

* ref: http://assets.andreiabohner.org/symfony/sf42-console-cheat-sheet.pdf
