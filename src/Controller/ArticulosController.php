<?php

namespace App\Controller;

use App\Form\Artticulos\FormTypeArticulos;
use App\From\Articulos\ArticulosForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticulosController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $form = new ArticulosForm();
        $form =  $this->createForm(
            FormTypeArticulos::class,
            $form,
            [
                'action' => $this->generateUrl('articulos'),
                'method' => 'POST',
            ]
        );

        return $this->render('Articulos/index.html.twig', [
            'controller_name' => 'ArticulosController',
            'fomularie' => $form->createView()
        ]);
    }

     /**
     * @Route("/articulos", name="articulos")
     */
    public function articulos()
    {
        $form = new ArticulosForm();
        $form =  $this->createForm(
            FormTypeArticulos::class,
            $form,
            [
                'action' => $this->generateUrl('articulos'),
                'method' => 'POST',
            ]
        );

        return $this->render('Articulos/index.html.twig', [
            'controller_name' => 'ArticulosController',
            'fomularie' => $form->createView()
        ]);
    }


}
