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
   * @Route("/showBoutiques", name="showBoutiques")
  */
  function showBoutiques() 
  {
    return $this->render('boutiques.html.twig');
  }

  /**
   * @Route("/showOneBoutiques/{id}", name="showOneBoutiques")
  */
  function showOneBoutiques($id) {
    try
    {
      $resultat = $this->mysql
      ->getRepository(Boutiques::class)
      ->findOneBy(['id' => $id]);
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    }

    if ($resultat != false) {
      return $this->render('showBoutiques.html.twig', [
        'boutique' => $resultat
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

  /**
   * @Route("/showBoutiquesNourritures", name="showBoutiquesNourritures")
  */
  function showBoutiquesNourritures() 
  {
    try 
    {
      $resultat = $this->mysql
      ->getRepository(Boutiques::class)
      ->findBy(['type' => 'Nourritures']);
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    } 
    
    if ($resultat != false) 
    {
      return $this->render('boutiquesNourritures.html.twig', [
        'BoutiquesNourritures' => $resultat
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

  /**
   * @Route("/showBoutiquesAccessoires", name="boutiquesAccessoires")
  */
  function showBoutiquesAccessoires() 
  {
    try
    {
      $resultat = $this->mysql
      ->getRepository(Boutiques::class)
      ->findBy(['type' => 'Accessoires']);
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    } 
    
    if ($resultat != false)
    {
      return $this->render('boutiquesAccessoires.html.twig', [
        'boutiquesAccessoires' => $resultat
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

  /**
   * @Route("/showBoutiquesProduits", name="boutiquesProduits")
  */
  function showBoutiquesProduits() 
  {
    try
    {
      $resultat = $this->mysql
      ->getRepository(Boutiques::class)
      ->findBy(['type' => 'Jouer']);
    }
    catch ( Doctrine_Connection_Exception $e )
    {
      return $resultat = false;
    }
    
    if ($resultat != false)
    {
      return $this->render('boutiquesProduits.html.twig', [
        'boutiquesProduits' => $resultat
      ]);
    }
    else
    {
      return $this->redirectToRoute("home");
    }
  }

}