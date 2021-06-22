<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

class AchatsController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/", name="home")
  */
  function home(Request $request) {
    return $this->render('boutiquesProduits.html.twig', [
        'message' => 'Bienvenue'
    ]);
  }

}