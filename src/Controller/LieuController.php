<?php

namespace App\Controller;
use App\Entity\Manif;
use App\Entity\Lieu;
use App\Repository\LieuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LieuController extends AbstractController
{
    #[Route('/lieu', name: 'app_lieu')]
    public function index(LieuRepository $LieuRepository): Response
    {
        return $this->render('lieu/index.html.twig', [
            'controller_name' => 'LieuController',
            'lieu' => $LieuRepository->findAll()
        ]);
    }
}
