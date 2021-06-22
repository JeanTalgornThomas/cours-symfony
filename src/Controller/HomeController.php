<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
    return $this->render('home.html.twig', [
        'message' => 'Bienvenue à la SPA'
    ]);
  }

}