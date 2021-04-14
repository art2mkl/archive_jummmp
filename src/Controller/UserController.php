<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->redirectToRoute('app_login');
        // return $this->render('user/index.html.twig', [
        //     'users' => $userRepository->findAll(),
        // ]);
    } 

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        // $user = new User();
        // $form = $this->createForm(UserType::class, $user);
        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
        //     $entityManager = $this->getDoctrine()->getManager();
        //     $entityManager->persist($user);
        //     $entityManager->flush();

        //     return $this->redirectToRoute('user_index');
        // }

        // return $this->render('user/new.html.twig', [
        //     'user' => $user,
        //     'form' => $form->createView(),
        // ]);
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/{id<\d+>}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        // $cvs = $user->getCvs();
        // return $this->render('user/show.html.twig', [
        //     'user' => $user,
        //     'cvs' => $cvs
        // ]);
        return $this->redirectToRoute('app_login');  
    }

    /**
     * @Route("/{id<\d+>}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        if (!$this->getUser() || $this->getUser()->getId() != $user->getId()) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $session = $request->getSession();
            
            if(!$session->get('id') || $session->get('id') == 0) {
                return $this->redirectToRoute('cv_index');  
            }
            else {
                return $this->redirectToRoute('cv_show', ['id'=> $session->get('id')]);
            }

        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user): Response
    {


        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * @Route("/{id<\d+>}/{cv<\d+>}", name="user_export", methods={"GET"})
     */
    public function export(User $user, $cv): Response
    {
        $cvs = $user->getCvs();
        $hobbies = $user->getHobbies();
        $cvId = new Cv;
        foreach ($cvs as $value) {
           if($value->getId() == $cv) {
               $cvId = $value;
           };
        }
        return $this->render('user/export.html.twig', [
            'user' => $user,
            'cv' => $cvId,
            'hobbies' => $hobbies
        ]);
    }
}

