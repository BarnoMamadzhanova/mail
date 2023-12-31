<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


class MailController extends AbstractController
{
    #[Route('/mail', name: 'app_mail')]
    public function mail(MailerInterface $mailer): Response
    {
        $email = (new Email())

            ->from("b@mamadzhanova.com")

            ->to("b@mamadzhanova.com")

            //->cc('cc@example.com')

            //->bcc('bcc@example.com')

            //->replyTo('fabien@example.com')

            //->priority(Email::PRIORITY_HIGH)

            ->subject("sent with symfony")

            ->text("A second time...");

        try {

            $mailer->send($email);
    
            return new Response("Email sent!");
    
        }
    
        catch (TransportExceptionInterface $error) {
    
            return new Response("Error: " . $error->getMessage());
    
        };
    }
}
