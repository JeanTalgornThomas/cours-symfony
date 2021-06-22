<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Dons;
use Doctrine\ORM\EntityManagerInterface;

class DonsController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/addAdoptions", name="addAdoptions")
  */
  function addAdoptions(Request $request) {
    date_default_timezone_set('Europe/Paris');

    $resultat = new Dons();

    $form = $this->createForm(DonsType::class, $resultat);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $resultat = $form->getData();

        $resultat->setIdAnimaux(0);
        $resultat->setIdUtilisateurs(0);
        $resultat->setDate(new \DateTime());
        $this->mysql->persist($resultat);
        $this->mysql->flush();

        return $this->redirectToRoute("showAnimaux");
    }

    return $this->render("article/addAdoptions.html.twig", [
        'form' => $form->createView()
    ]);    
  }

}