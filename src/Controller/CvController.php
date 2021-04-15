<?php

namespace App\Controller;

use App\Entity\Cv;

use App\Form\CvType;
use App\Repository\CvRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/cv")
 */
class CvController extends AbstractController
{
    /**
     * @Route("/", name="cv_index", methods={"GET"})
     */
    public function index(Request $request, CvRepository $cvRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $session = $request->getSession();
        $session->set('id', 0);

        return $this->render('cv/index.html.twig', [
            'cvs' => $cvRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cv_new", methods={"GET","POST"})
     */
    public function new(Request $request, Security $security): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        $cv = new Cv();
        // $form = $this->createForm(CvType::class, $cv);
        // $form->handleRequest($request);
        // if ($form->isSubmitted() && $form->isValid()) {


            $user = $security->getUser();
            if (count($this->getUser()->getCvs()) < 3) {

                $cv->setUserId($user);
                $cv->setModel(1);
                $cv->setTitle('Définis le titre de ton cv');
                $cv->setJobCv('Inscris ton poste visé');
                $cv->setAbout('Décris ton profil');
                $cv->setShortUrl('');
                
                $cv->setPhoto('homer-6076baf12eb34096447399.jpeg');
        
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($cv);
                $entityManager->flush();
            }

            return $this->redirectToRoute('cv_index');
        // }

        return $this->render('cv/new.html.twig', [
            'cv' => $cv,
            // 'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="cv_show", methods={"GET"})
     */
    public function show($id, Request $request, Cv $cv): Response
    {
        if (!$this->getUser() || $this->getUser()->getId() != $cv->getUserId()->getId()) {
            return $this->redirectToRoute('app_login');
        }
        $session = $request->getSession();
        $session->set('id', $id);

        $shortUrl = '/user/' . $this->getUser()->getId() . '/' . $id;
        $cv->setShortUrl($shortUrl);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cv);
        $entityManager->flush();

        return $this->render('cv/show.html.twig', [
            'cv' => $cv,
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="cv_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cv $cv): Response
    {
        if (!$this->getUser() || $this->getUser()->getId() != $cv->getUserId()->getId()) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cv_show', ['id' => $cv->getId()]);
        }

        return $this->render('cv/edit.html.twig', [
            'cv' => $cv,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="cv_delete", methods={"POST"})
     */
    public function delete(Request $request, Cv $cv): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cv->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cv);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cv_index');
    }
    /**
     * @Route("majModel/{id<\d+>}/{model<\d+>}", name="cv_majModel", methods={"GET"})
     */
    public function majModel(Request $request, Cv $cv, $model, $id): Response
    {

        if (!$this->getUser() || $this->getUser()->getId() != $cv->getUserId()->getId()) {
            return $this->redirectToRoute('app_login');
        }

        $cv->setModel($model);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('cv_show', ['id' => $id]);
    }
}
