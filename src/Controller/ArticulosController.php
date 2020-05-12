<?php

namespace App\Controller;

use App\Form\Artticulos\FormTypeArticulos;
use App\From\Articulos\ArticulosForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticulosController extends AbstractController
{
    /**
     * @Route("/articulos", name="aticulos")
     */
    public function index()
    {
        $form = new ArticulosForm();
        $form =  $this->createForm(FormTypeArticulos::class, $form);

        return $this->render('Articulos/index.html.twig', [
            'controller_name' => 'ArticulosController',
            'fomularie' => $form->createView()
        ]);
    }
}
