<?php

namespace App\Controller;

use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(CommandeRepository $commandeRepository): Response
    {
        $commandes=$commandeRepository->findBy(['Client'=>$this->getUser()]);
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'commandes'=>$commandes
        ]);
    }
}
