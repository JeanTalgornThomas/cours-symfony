<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

use App\Entity\User;
use App\Form\DonsType;
use App\Entity\Dons;
use Doctrine\ORM\EntityManagerInterface;

class DonsController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/addDons", name="addDons")
  */
  function addDons(Request $request, MailerInterface $mailer): Response {
    date_default_timezone_set('Europe/Paris');
    
    $dons = new Dons();

    $form = $this->createForm(DonsType::class, $dons);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $dons = $form->getData();
        $dons->setMontants($dons->getMontants());
        $dons->setDate(new \DateTime());
        $dons->setIdUtilisateurs($this->getUser()->getId());
        $this->mysql->persist($dons);
        $this->mysql->flush();

        try
        {
          $resultatUtilisateur = $this->mysql
          ->getRepository(User::class)
          ->findOneBy(['id' => $this->getUser()->getId()]);
        }
        catch ( Doctrine_Connection_Exception $e )
        {
          return $resultatUtilisateur = false;
        }

        $message = (new TemplatedEmail())
        ->from('intranet-noreply@nodarius.fr')
        ->to($resultatUtilisateur->getEmail())
        ->subject('La SPA - Confirmation de dons')
        ->htmlTemplate('emails/dons.html.twig')
        ->context([
            'dons' => $dons->getMontants()
        ]);
      
        $mailer->send($message);

        return $this->redirectToRoute('home');
    }

    return $this->render('dons.html.twig', [
        'form' => $form->createView(),
    ]);
  }

}