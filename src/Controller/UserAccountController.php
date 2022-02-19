<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserAccountController extends AbstractController
{
    /**
     * @Route({
        "en": "/account",
     *  "fr": "/mon-compte"
     * }, name="user_account")
     */
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('user_account/index.html.twig', [
            'controller_name' => 'UserAccountController',
        ]);
    }
}
