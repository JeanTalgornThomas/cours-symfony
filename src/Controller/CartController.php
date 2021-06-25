<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Boutiques;

class CartController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
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

    $panierData = [];

    foreach($panier as $id => $quant) {
      $panierData[] = [
        'product' => $this->mysql->getRepository(Boutiques::class)->findOneBy(['id' => $id]),
        'quantity' => $quant
      ];
    }

    $total = 0;

    foreach($panierData as $item) {
      $totalItem = $item['product']->getValeurs() * $item['quantity'];
      $total += $totalItem;
    }

    dump($panierData);
    $session->set('panier',$panier);
    return $this->render('panier/add.html.twig', [
      'items' => $panierData,
      'total' => $total
    ]);

  }

}