# Synfony 5 codespace

Symfony Framework training



# [SYMFONY CLI]
### # create a full web aplications
```sh
-   symfony new my_project_name --full
```
### # create a microservice Or API
```sh
-   symfony new my_project_name --full
```
# [COMPOSER CLI]
### # create a full web aplications
 ```sh
- composer create-project symfony/skeleton my_project_name
```
### # create a microservice Or API
```sh
- composer create-project symfony/skeleton my_project_name
```
### #optional build-in server Port ej 4000
```sh
-   symfony console server:start
```
### # initiate databese
```sh
 -  symfony console doctrine:database:create
```
### # check environment is ok 
```sh
- symfony console  doctrine:ensure-production-settings --env=prod
```
### # Allows Doctrine to introspect an existing database and create mapping
##### ej. generate metadata from your existing db
```sh
  - symfony console  doctrine:mapping:import --force ClassName xml <-- or yaml type
```
##### ej. generating Entity from your metadata 
```sh
doctrine:mapping:convert annotation ./src
```
##### ej. generate Entity from model db
```sh
-doctrine:mapping:import "Table_name" annotation --path=src/Entity
```
###### ref: https://symfony.com/doc/3.3/doctrine/reverse_engineering.html 


# [MAKE-BUNDLE CLI]
### # installation
```sh
  -  composer require symfony/maker-bundle --dev
```
### # getter and setters
```sh
  make:entity --regenerate App *r App\subdirectory_name?\
```
### # Usage list
-   make:controller
-   makecommand
-   make:entity
-   make:validator
-   make:crud 
 -  ...

##### ej.
```sh
symfony console MAKE:ENTITY  Group <-- this command is asking you about properties of your model 
```
  

##### afther it and adding all our annotations your have to generate the migrations file like that:
```sh
-   symfony console doctrine:migrations:diff 
```
# check status 
```sh
-   symfony console doctrine:migrations:status
```
# run migrations 
```sh
 -  symfony console doctrine:migrations:migrate "version_number" 
 ```
    ej.(20200509131407) no quotation marks

#[GIT]
```sh
- creas folder 
- entrar en folder
- introduces git init 
- añadir origenes ej. git remote add origin https://gitlab.com/dannybombastic/synfony-5-codespace
- checkamos git status
- git pull --rebase 
- añadimos git add .
- comentamos git commit -m "coment"
- git push origin master
```