<?php

namespace App\Controller\Articulos;

use App\Entity\Articulos\Articles;
use App\Form\Artticulos\FormTypeArticulos;
use App\Form\UseType;
use App\From\Articulos\ArticulosForm;
use App\Repository\Articulos\ArticulosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticulosController extends AbstractController
{
    /**
     * @Route("/articulos", name="articulos")
     */
    public function articulos(Request $request , EntityManagerInterface $em)
    {
        $form = new ArticulosForm();
        $formArticulos = new Articles();
        $articulos = $this->getDoctrine()->getRepository(Articles::class)->saveEntity($formArticulos);
     

        $formArticulos = $this->createForm(UseType::class, $formArticulos);

        # templates/default/new.html.twig #}
        # { form_start(form, {'action': path('target_route'), 'method': 'GET'}) }}
        $form =  $this->createForm(
            FormTypeArticulos::class,
            $form
        );

        return $this->render('Articulos/index.html.twig', [
            'controller_name' => 'ArticulosController',
            'fomularie' => $form->createView(),
            'formulariArticles' => $formArticulos->createView()
        ]);
    }
}
