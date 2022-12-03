<?php

namespace App\Controller;

use App\Entity\Manif;
use App\Repository\ManifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffichageController extends AbstractController
{
    #[Route('/affichage', name: 'app_affichage')]
    public function index(ManifRepository $manifRepository): Response
    {
        return $this->render('affichage/index.html.twig', [
            'controller_name' => 'affichageController',
            'manifs' => $manifRepository->findAll()
        ]);
    }

    #[Route('/affichage/{id}', name: 'app_affichagedetail')]
    public function indexdetail(Manif $manif,$id): Response
    {
        return $this->render('affichage/indexdetail.html.twig', [
            'controller_name' => 'affichageController',
            'manif' => $manif
        ]);
    }

}
