<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/login", name="security_login")
     * @param AuthenticationUtils $helper
     * @return Response
     */
    public function login(AuthenticationUtils $helper)
    {

        $session = new Session();
        $session->start();
        $session->setName($helper->getLastUsername());
//        dump($helper);die();
        return $this->render('Security/login.html.twig', [
            // dernier username saisi (si il y en a un)
            'last_username' => $helper->getLastUsername(),
            // La derniere erreur de connexion (si il y en a une)
            'error' => $helper->getLastAuthenticationError(),

        ]);
    }

    /**
     * La route pour se deconnecter.
     *
     * Mais celle ci ne doit jamais être executé car symfony l'interceptera avant.
     *
     *
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
        throw new \Exception('This should never be reached!');
    }
}
