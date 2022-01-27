<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $message = (new TemplatedEmail())
                ->from($contactFormData['email'])
                ->to('your@mail.com')
                ->subject('You got mail')
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'userEmail' => $contactFormData['email'],
                    'message' => $contactFormData['message'],
                ]);
                //->subjectBlock('subject_block_name')
                //->htmlBlock('html_block_name');
            $mailer->send($message);




            $this->addFlash('success', 'Your message has been sent');

            //return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }
}
