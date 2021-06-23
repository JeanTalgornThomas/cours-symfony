<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\DonsType;
use App\Entity\Dons;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_USER")
 */
class DonsController extends AbstractController {

  public function __construct(EntityManagerInterface $mysql)
  {
    $this->mysql = $mysql;
  }

  /**
   * @Route("/addDons", name="addDons")
  */
  function addDons(Request $request) {
    date_default_timezone_set('Europe/Paris');

    $resultat = new Dons();

    $form = $this->createForm(DonsType::class, $resultat);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $resultat = $form->getData();

        $this->addFlash(
          'Merci pour votre don!'
        );
        return $this->redirectToRoute("home");
    }

    return $this->render("dons.html.twig", [
        'form' => $form->createView()
    ]);    
  }

}