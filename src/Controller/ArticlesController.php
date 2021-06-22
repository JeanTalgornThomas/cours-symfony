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

}