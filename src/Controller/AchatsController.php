<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Achats;
use Doctrine\ORM\EntityManagerInterface;

class AchatsController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/addAchats", name="addAchats")
  */
  function addAchats(Request $request) {
    date_default_timezone_set('Europe/Paris');

    $resultat = new Achats();
    $resultat->setIdBoutiques(0);
    $resultat->setIdUtilisateurs(0);
    $resultat->setDate(new \DateTime());
    $this->mysql->persist($resultat);
    $this->mysql->flush();
  }

}