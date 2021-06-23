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
   * @Route("/animaux", name="animaux")
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
        'animaux' => $resultat
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

  /**
   * @Route("/animaux/{id}", name="animal")
  */
  function Animal(int $id) : Response {
    try {
      $resultat = $this->mysql
      ->getRepository(Animaux::class)
      ->find($id);
    }
    catch ( Doctrine_Connection_Exception $e ) {
      return $resultat = false;
    }

    if ($resultat != false) {
      return $this->render('animal.html.twig', [
        'animal' => $resultat
      ]);
    }
    else {
      return $this->redirectToRoute("home");
    }
  }
}