                
 <p style="text-align: center; "> 

![codespace](https://media-exp1.licdn.com/dms/image/C4D0BAQH8ECeZLIxb3Q/company-logo_200_200/0?e=2159024400&v=beta&t=ihBY5eiqqtbX8KuAN5XC99f55pE84AgXGDPO33nRMTo "codespace")

  </p> 
  
 
 # Scafolding Synfony
 
 # Scafolding Synfony 4 / 5

 

![escafolding](https://raw.githubusercontent.com/dannybombastic/symfony-5-codespace/master/scafoldin_sf5.png "escafolding")


# Synfony 5 codespace 2020

Symfony Framework training

* [Composer cli](#composer)
* [Maker cli](#maker)
* [Symfony 5 cli](#sf5cli)
* [Symfony Run Server](#run)
* [Symfony Apache-packi](#apache)
* [Symfony Doctrine commands](#commands)
* [Adding to GIT](#git)
* [Save Entity Doctrine](#saveent)
* [Find Entity Doctrine](#find)
* [Delete Entity Doctrine](#delete)
* [Custom Query Doctrine](#custom)
* [Validation Entity Doctrine](#validate)
* [Fomr class](#validate)
* [DataFixtures](#fixture)

## [DONWLOAD COMPOSER CLI]

 * ref : https://getcomposer.org/download/
 
<span id="composer"></span>

##  [COMPOSER CLI]

###  create a full web aplications

 

``` sh

* composer create-project symfony/website-skeleton my_project_name

```

###  create a microservice Or API

``` sh

* composer create-project symfony/skeleton my_project_name

```

<span id="apache"></span>

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

<span id="sf5cli"></span>

##   [SYMFONY CLI]

###  create a full web aplications

``` sh

*   symfony new my_project_name --full

```

###  create a microservice Or API

``` sh

*   symfony new my_project_name --full

```

<span id="run"></span>

##  [SYMFONY SERVER RUN]

### optional build-in server Port ej 4000

``` sh

*   symfony console server:start

```

<span id="maker"></span>

##  [MAKE-BUNDLE CLI]

### # installation

``` sh

  +  composer require symfony/maker-bundle --dev

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

<span id="commands"></span>

# [SYMFONY DOCTRINE COMMANDS]

### initiate databese

``` sh
 -  symfony console doctrine:database:create
 
```

 

###  check environment is ok 

``` sh

* symfony console  doctrine:ensure-production-settings --env=prod

```

### Allows Doctrine to introspect an existing database and create mapping

### generate metadata from your existing db

``` sh
 - symfony console  doctrine:mapping:import --force ClassName xml <-- or yaml type
```

### generating Entity from your metadata 

``` sh

* symfony doctrine:mapping:convert App annotation ./src

```

 

### generate Entity from model db

``` sh

* symfony doctrine:mapping:import "namespace" annotation --path=src/Entity

```

* ref: https://symfony.com/doc/3.3/doctrine/reverse_engineering.html 

####   afther it and adding all our annotations your have to generate the migrations file like this:

``` sh

*   symfony console doctrine:migrations:diff 

```
####   afther reverse import your have to generate the Repository file like this:

``` sh

   * use App\Repository\User\ApiTokenRepository;

   /**
    * @ORM\Entity(repositoryClass=ApiTokenRepository::class)
    */


```
### check status 

``` sh

*   symfony console doctrine:migrations:status

```

### run migrations 

``` sh
 -  symfony console doctrine:migrations:execute "version_number" --up
```

    ej. (20200509131407) no quotation marks

### run query from cli 

``` sh
 -  symfony console doctrine:query:sql  "query_sentence" 
```

### dump the default configuration for an extension 

``` sh
 -  symfony console config:dump-reference
```



<span id="fixctures"></span>

##  [DATAFIXTURES]

### Install it by composer  migrations 

``` sh
 -  composer require --dev orm-fixtures
```

### Install it by composer  migrations 

``` sh
 -  symfony console doctrine:fixtures:load 
```

    ej. (20200509131407) no quotation marks
<span id="git"></span>

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

<span id="cli"></span>

## [CHEAT SHEET CLI PDF]

* ref: http://assets.andreiabohner.org/symfony/sf42-console-cheat-sheet.pdf

 
 



## [CHEAT SHEET DOCTRINE METHODS CLI]
<span id="find"></span>
### Fetching Objects from the Database

``` sh
// src/Controller/ProductController.php
 
/**
 * @Route("/product/{id}", name="product_show")
 */
public function show($id)
{
    $product = $this->getDoctrine()
        ->getRepository(Product::class)
        ->find($id);

    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    return new Response('Check out this great product: '.$product->getName());

    // or render a template
    // in the template, print things with {{ product.name }}
    // return $this->render('product/show.html.twig', ['product' => $product]);
}

2º opcion 
// src/Controller/ProductController.php
// ...
use App\Repository\ProductRepository;

/**
 * @Route("/product/{id}", name="product_show")
 */
public function show($id, ProductRepository $productRepository)
{
    $product = $productRepository
        ->find($id);

    // ...
}
```
<span id="saveent"></span>
### Persisting Objects to the Database

``` sh
 // src/Controller/ProductController.php
namespace App\Controller;

// ...
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
}

```
<span id="validate"></span>
### Validating Objects

``` sh
// src/Controller/ProductController.php
namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
// ...

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(ValidatorInterface $validator): Response
    {
        $product = new Product();
        // This will trigger an error: the column isnt nullable in the database
        $product->setName(null);
        // This will trigger a type mismatch error: an integer is expected
        $product->setPrice('1999');

        // ...

        $errors = $validator->validate($product);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        // ...
    }
}
```
<span id="delete"></span>
### Deleting an Objec

```sh
    $entityManager->remove($product);
    $entityManager->flush();
```

<span id="custom"></span>
### Custom Query
 
 
```sh
// src/Repository/ProductRepository.php

// ...
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @return Product[]
     */
    public function findAllGreaterThanPrice($price): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Product p
            WHERE p.price > :price
            ORDER BY p.price ASC'
        )->setParameter('price', $price);

        // returns an array of Product objects
        return $query->getResult();
    }
}


<span id="queryBuilder"></span>
### QueryBuilder instanciate

```sh

// example3: retrieve the associated EntityManager
$em = $qb->getEntityManager();

// example4: retrieve the DQL string of what was defined in QueryBuilder
$dql = $qb->getDql();

// example5: retrieve the associated Query object with the processed DQL
$q = $qb->getQuery();
```


### QueryBuilder instanciate

```sh

// example3: retrieve the associated EntityManager
$em = $qb->getEntityManager();

// example4: retrieve the DQL string of what was defined in QueryBuilder
$dql = $qb->getDql();

// example5: retrieve the associated Query object with the processed DQL
$q = $qb->getQuery();
```

###  Working with QueryBuilder

```sh
$qb->select('u')
   ->from('User', 'u')
   ->where('u.id = ?1')
   ->orderBy('u.name', 'ASC');
   
 
// $qb instanceof QueryBuilder
$qb->select('u')
   ->from('User', 'u')
   ->where('u.id = ?1')
   ->orderBy('u.name', 'ASC')
   ->setParameter(1, 100); // Sets ?1 to 100, and thus we will fetch a user with u.id = 100
   
// Limiting the REsult 

$offset = (int)$_GET['offset'];
$limit = (int)$_GET['limit'];

$qb->add('select', 'u')
   ->add('from', 'User u')
   ->add('orderBy', 'u.name ASC')
   ->setFirstResult( $offset )
   ->setMaxResults( $limit );

```
 
 
 ### QueryBuilder Low level Api

```sh
qb->add('select', 'u')
   ->add('from', 'User u')
   ->add('where', 'u.id = ?1')
   ->add('orderBy', 'u.name ASC');
   
```