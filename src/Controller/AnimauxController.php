<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Animaux;
use Doctrine\ORM\EntityManagerInterface;

class AnimauxController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/showAnimaux", name="showAnimaux")
  */
  function showAnimaux() {
    try
    {
      $resultat = $this->mysql
      ->getRepository(Animaux::class)
      ->findAll();
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    } 

    if ($resultat != false)
    {
      return $this->render('animaux.html.twig', [
        'animaux' => $animaux
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

}