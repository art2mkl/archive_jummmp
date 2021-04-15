<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('cv_index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    /**
     * @Route("/annex/policy", name="app_policy")
     */
    public function policy()
    {
        return $this->render('annex/policy.html.twig'); 
    }
    /**
     * @Route("/annex/plan", name="app_plan")
     */
    public function plan()
    {
        return $this->render('annex/plan.html.twig'); 
    }
    /**
     * @Route("/annex/cg", name="app_cg")
     */
    public function cg()
    {
        return $this->render('annex/cg.html.twig'); 
    }
    /**
     * @Route("/annex/faq", name="app_faq")
     */
    public function faq()
    {
        return $this->render('annex/faq.html.twig'); 
    }



}
