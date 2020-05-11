<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticulosController extends AbstractController
{
    /**
     * @Route("/articulos", name="aticulos")
     */
    public function index()
    {
        return $this->render('Articulos/index.html.twig', [
            'controller_name' => 'ArticulosController',
        ]);
    }
}
