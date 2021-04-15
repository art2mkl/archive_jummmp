<?php

namespace App\Controller;

use App\Entity\Xp;
use App\Form\XpType;
use App\Repository\XpRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/xp")
 */
class XpController extends AbstractController
{
    /**
     * @Route("/", name="xp_index", methods={"GET","POST"})
     */
    public function index(XpRepository $xpRepository, Request $request): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $xp = new Xp();
        $form = $this->createForm(XpType::class, $xp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $xp->setUserId($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($xp);
            $entityManager->flush();

            return $this->redirectToRoute('xp_index');
        }

       
        
        return $this->render('xp/index.html.twig', [
            // 'xps' => $xpRepository->findAll(),
            'xps' => $xpRepository->findBy(['userId'=> $this->getUser()->getId()]),
            'xp' => $xp,
            'form' => $form->createView(),
        ]);
    }

    
    /**
     * @Route("/{id<\d+>}/edit", name="xp_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Xp $xp): Response
    {
        if (!$this->getUser() || $this->getUser()->getId() != $xp->getUserId()->getId()) {
            return $this->redirectToRoute('app_login');
        }
        
        $form = $this->createForm(XpType::class, $xp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('xp_index');
        }

        return $this->render('xp/edit.html.twig', [
            'xp' => $xp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="xp_delete", methods={"POST"})
     */
    public function delete(Request $request, Xp $xp): Response
    {
        if ($this->isCsrfTokenValid('delete' . $xp->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($xp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('xp_index');
    }
    
}
