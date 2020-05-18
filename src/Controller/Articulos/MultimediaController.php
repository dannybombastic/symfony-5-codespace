<?php

namespace App\Controller\Articulos;

use App\Entity\Articulos\Multimedia;
use App\Form\Articulos\MultimediaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/articulos/multimedia")
 */
class MultimediaController extends AbstractController
{
    /**
     * @Route("/", name="articulos_multimedia_index", methods={"GET"})
     */
    public function index(): Response
    {
        $multimedia = $this->getDoctrine()
            ->getRepository(Multimedia::class)
            ->findAll();

        return $this->render('articulos/multimedia/index.html.twig', [
            'multimedia' => $multimedia,
        ]);
    }

    /**
     * @Route("/new", name="articulos_multimedia_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $multimedia = new Multimedia();
        $form = $this->createForm(MultimediaType::class, $multimedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($multimedia);
            $entityManager->flush();

            return $this->redirectToRoute('articulos_multimedia_index');
        }

        return $this->render('articulos/multimedia/new.html.twig', [
            'multimedia' => $multimedia,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="articulos_multimedia_show", methods={"GET"})
     */
    public function show(Multimedia $multimedia): Response
    {
        return $this->render('articulos/multimedia/show.html.twig', [
            'multimedia' => $multimedia,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="articulos_multimedia_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Multimedia $multimedia): Response
    {
        $form = $this->createForm(MultimediaType::class, $multimedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('articulos_multimedia_index');
        }

        return $this->render('articulos/multimedia/edit.html.twig', [
            'multimedia' => $multimedia,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="articulos_multimedia_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Multimedia $multimedia): Response
    {
        if ($this->isCsrfTokenValid('delete'.$multimedia->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($multimedia);
            $entityManager->flush();
        }

        return $this->redirectToRoute('articulos_multimedia_index');
    }
}
