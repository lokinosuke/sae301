<?php

namespace App\Controller;

use App\Entity\Manif;
use App\Form\RechercheType;
use App\Repository\ManifRepository;
use ContainerX76XxQl\getManifService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    #[Route('/recherche', name: 'app_recherche')]
    public function index(): Response
    {
        $form = $this->createForm(ManifRepository::class);

        return $this->render('/recherche/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
