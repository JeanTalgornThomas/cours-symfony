<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

use App\Entity\User;
use App\Entity\Animaux;
use App\Entity\Adoptions;
use Doctrine\ORM\EntityManagerInterface;

class AdoptionsController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/adopter/{id}", name="adopter")
  */
  function adopter($id, MailerInterface $mailer) {

    // Ajout de l'adoption dans la bdd
    $dons = new Adoptions();
    $dons->setIdAnimaux($id);
    $dons->setDate(new \DateTime());
    $dons->setIdUtilisateurs($this->getUser()->getId());
    $this->mysql->persist($dons);
    $this->mysql->flush();

    // Requête pour récupérer les informations de l'utilisateur
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

    // Requête pour récupérer les informations de l'animal
    try
    {
      $resultatAnimal = $this->mysql
      ->getRepository(Animaux::class)
      ->findOneBy(['id' => $id]);
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultatAnimal = false;
    }

    if ($resultatUtilisateur != false && $resultatAnimal != false)
    {
      // Envoie de l'email d'adoptions
      $message = (new TemplatedEmail())
      ->from('intranet-noreply@nodarius.fr')
      ->to($resultatUtilisateur->getEmail())
      ->subject('La SPA - Adoption d\'un animal')
      ->htmlTemplate('emails/adoptions.html.twig')
      ->context([
          'nom_animal' => $resultatAnimal->getNom()
      ]);
    
      $mailer->send($message);
    }

    return $this->render('adoptions.html.twig');
  }

}