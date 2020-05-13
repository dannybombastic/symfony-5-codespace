<?php

namespace App\Controller\Articulos;

use App\Entity\Articulos\Articles;
use App\Entity\Articulos\Categories;
use App\Form\Artticulos\FormTypeArticulos;
use App\Form\UseType;
use App\From\Articulos\ArticulosForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticulosController extends AbstractController
{
    /**
     * @Route("/articulos", name="articulos")
     */
    public function articulos(Request $request)
    {
      
        $formArticulos = new Articles();
        //$articulos = $this->getDoctrine()->getRepository(Articles::class)->saveEntity($formArticulos);
        $categorias =  $this->getDoctrine()->getRepository(Categories::class)->findAll();
        
        $datosCategoria = [];
        foreach($categorias as $cat){
            $datosCategoria[ $cat->getName() ] = $cat->getId();
        }
       
        $formArticulos = $this->createForm(UseType::class, $formArticulos, [
            'categorias' => $datosCategoria,
        ]);
        
        $formArticulos->handleRequest($request);
        if ($formArticulos->isSubmitted() && $formArticulos->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $art = $formArticulos->getData();
            $articulos = $this->getDoctrine()->getRepository(Articles::class)->saveEntity($art);
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            // return $this->redirectToRoute('task_success');
        }

        # templates/default/new.html.twig #}
        # { form_start(form, {'action': path('target_route'), 'method': 'GET'}) }}
        $form = new ArticulosForm();
        $form =  $this->createForm(
            FormTypeArticulos::class,
            $form
        );

        return $this->render('Articulos/index.html.twig', [
            'controller_name' => 'ArticulosController',
            'fomularie' => $form->createView(),
            'formulariArticles' => $formArticulos->createView(),
            'cat' => $categorias
        ]);
    }
}
