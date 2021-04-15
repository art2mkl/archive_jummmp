<?php

namespace App\Controller;

use App\Entity\Hobbies;
use App\Form\HobbiesType;
use App\Repository\HobbiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hobbies")
 */
class HobbiesController extends AbstractController
{
    /**
     * @Route("/", name="hobbies_index", methods={"GET","POST"})
     */
    public function index(Request $request, HobbiesRepository $hobbiesRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $hobby = new Hobbies();
        $form = $this->createForm(HobbiesType::class, $hobby);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $hobby->setUserId($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hobby);
            $entityManager->flush();

            return $this->redirectToRoute('hobbies_index');
        }


        return $this->render('hobbies/index.html.twig', [
            'hobbies' => $hobbiesRepository->findBy(['userId'=> $this->getUser()->getId()]),
            'hobby' => $hobby,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="hobbies_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Hobbies $hobby): Response
    {

        if (!$this->getUser() || $this->getUser()->getId() != $hobby->getUserId()->getId()) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(HobbiesType::class, $hobby);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hobbies_index');
        }

        return $this->render('hobbies/edit.html.twig', [
            'hobby' => $hobby,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="hobbies_delete", methods={"POST"})
     */
    public function delete(Request $request, Hobbies $hobby): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hobby->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hobby);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hobbies_index');
    }
}
