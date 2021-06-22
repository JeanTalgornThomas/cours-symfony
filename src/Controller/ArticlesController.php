<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Articles;
use Doctrine\ORM\EntityManagerInterface;

class ArticlesController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/showArticles", name="showArticles")
  */
  function showArticles() {
    try
    {
      $resultat = $this->mysql
      ->getRepository(Articles::class)
      ->findAll();
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    } 

    if ($resultat != false) {
      return $this->render('articles.html.twig', [
        'articles' => $articles
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

}