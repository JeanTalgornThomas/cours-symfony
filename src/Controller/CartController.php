<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;

use App\Repository\BoutiquesRepository;

class CartController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }


  /**
   * @Route("/panier", name="panier")
  */
  public function index(SessionInterface $session) {

    $panier = $session->get('panier',[]);

    $panierData = [];

    foreach($panier as $id => $quant) {
      $panierData[] = [
        'product' => $this->mysql->getRepository(Boutiques::class)->findOneBy(['id' => $id]),
        'quantity' => $quant
      ];
    }

    return $this->render('panier/index.html.twig', [
      'items' => $panierData
    ]);
  }

  /**
   * @Route("/panier/add/{id}", name="Addpanier")
  */
  public function add($id, SessionInterface $session) {

    $panier = $session->get('panier',[]);
    
    if( ! empty($panier[$id])  ){
      $panier[$id] ++;
    } else {
      $panier[$id] = 1;
    }
    $session->set('panier',$panier);
    return $this->render('panier/add.html.twig', [
      'items' => $panier
    ]);

  }

}