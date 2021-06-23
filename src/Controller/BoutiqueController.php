<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Boutiques;
use Doctrine\ORM\EntityManagerInterface;

class BoutiqueController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/boutique", name="boutique")
  */
  function boutique() {
    return $this->render('boutique.html.twig');
  }
}