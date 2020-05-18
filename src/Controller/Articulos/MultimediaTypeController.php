<?php

namespace App\Controller\Articulos;

use App\Entity\Articulos\MultimediaType;
use App\Form\Articulos\MultimediaTypeType;
use App\Repository\MultimediaTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/articulos/multimedia/type")
 */
class MultimediaTypeController extends AbstractController
{
    /**
     * @Route("/", name="articulos_multimedia_type_index", methods={"GET"})
     */
    public function index(MultimediaTypeRepository $multimediaTypeRepository): Response
    {
        return $this->render('articulos/multimedia_type/index.html.twig', [
            'multimedia_types' => $multimediaTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="articulos_multimedia_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $multimediaType = new MultimediaType();
        $form = $this->createForm(MultimediaTypeType::class, $multimediaType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($multimediaType);
            $entityManager->flush();

            return $this->redirectToRoute('articulos_multimedia_type_index');
        }

        return $this->render('articulos/multimedia_type/new.html.twig', [
            'multimedia_type' => $multimediaType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="articulos_multimedia_type_show", methods={"GET"})
     */
    public function show(MultimediaType $multimediaType): Response
    {
        return $this->render('articulos/multimedia_type/show.html.twig', [
            'multimedia_type' => $multimediaType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="articulos_multimedia_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MultimediaType $multimediaType): Response
    {
        $form = $this->createForm(MultimediaTypeType::class, $multimediaType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('articulos_multimedia_type_index');
        }

        return $this->render('articulos/multimedia_type/edit.html.twig', [
            'multimedia_type' => $multimediaType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="articulos_multimedia_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MultimediaType $multimediaType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$multimediaType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($multimediaType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('articulos_multimedia_type_index');
    }
}
