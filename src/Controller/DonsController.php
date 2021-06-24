<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Form\DonsType;
use App\Entity\Dons;
use Doctrine\ORM\EntityManagerInterface;

class DonsController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/addDons", name="addDons")
  */
  function addDons(Request $request): Response {
    date_default_timezone_set('Europe/Paris');
    
    $dons = new Dons();

    $form = $this->createForm(DonsType::class, $dons);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $dons = $form->getData();
        $dons->setMontants($dons->getMontants());
        $dons->setDate(new \DateTime());
        $dons->setIdUtilisateurs(1);
            
        $this->mysql->persist($dons);
        $this->mysql->flush();

        return $this->redirectToRoute('home');
    }

    return $this->render('dons.html.twig', [
        'form' => $form->createView(),
    ]);
  }

}