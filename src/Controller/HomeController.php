<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Articles;
use App\Entity\Animaux;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/", name="home")
  */
  function home() {
    try
    {
      $resultatArticles = $this->mysql
      ->getRepository(Articles::class)
      ->findAll();
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    }

    try
    {
      $resultatAnimaux = $this->mysql
      ->getRepository(Animaux::class)
      ->findAll();
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    }


    if ($resultatAnimaux != false && $resultatArticles != false) {

      // Récupération des 5 derniers articles
      for($counter = 0; $counter <= 5; $counter++) {
        $returnArticles[$counter] = array(
          "id" => $resultatArticles[$counter]->getId(),
          "nom" => $resultatArticles[$counter]->getNom()
        );
      }

      // Récupération des 5 derniers animaux
      for($counter = 0; $counter <= 5; $counter++) {
        $returnAnimaux[$counter] = array(
          "id" => $resultatAnimaux[$counter]->getId(),
          "nom" => $resultatAnimaux[$counter]->getNom(),
          "age" => $resultatAnimaux[$counter]->getAge()
        );
      }

      return $this->render('home.html.twig', [
        'articles' => $returnArticles,
        'animaux' => $returnAnimaux
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

}