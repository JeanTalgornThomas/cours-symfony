<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Boutiques;
use Doctrine\ORM\EntityManagerInterface;

class BoutiquesController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/showBoutiquesNourritures", name="showBoutiquesNourritures")
  */
  function showBoutiquesNourritures() 
  {
    try 
    {
      $resultat = $this->mysql
      ->getRepository(Articles::class)
      ->findBy(['type' => 'Nourritures']);
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    } 
    
    if ($resultat != false) 
    {
      return $this->render('boutiquesNourritures.html.twig', [
        'BoutiquesNourritures' => $BoutiquesNourritures
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

  /**
   * @Route("/showBoutiquesAccessoires", name="showBoutiquesAccessoires")
  */
  function showBoutiquesAccessoires() 
  {
    try
    {
      $resultat = $this->mysql
      ->getRepository(Articles::class)
      ->findBy(['type' => 'Accessoires']);
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    } 
    
    if ($resultat != false)
    {
      return $this->render('boutiquesAccessoires.html.twig', [
        'boutiquesAccessoires' => $boutiquesAccessoires
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

  /**
   * @Route("/showBoutiquesProduits", name="showBoutiquesProduits")
  */
  function showBoutiquesProduits() 
  {
    try
    {
      $resultat = $this->mysql
      ->getRepository(Articles::class)
      ->findBy(['type' => 'Jouer']);
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    }
    
    if ($resultat != false)
    {
      return $this->render('boutiquesProduits.html.twig', [
        'boutiquesProduits' => $boutiquesProduits
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

}