<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    public function index(): Response
    {
        $this->addFlash('error', 'form.comment.content_not_blank');

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController'
        ]);
    }
}
