<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DroitController extends AbstractController
{
    #[Route('/droit/mentionslegales', name: 'app_mentionslegales')]
    public function mentionslegales(): Response
    {
        return $this->render('droit/mentionslegales.html.twig', [
            'controller_name' => 'DroitController',
        ]);
    }
    #[Route('/droit/conditionsgeneralesdevente', name: 'app_conditionsgeneralesdevente')]
    public function conditionsgeneralesdevente(): Response
    {
        return $this->render('droit/conditionsgeneralesdevente.html.twig', [
            'controller_name' => 'DroitController',
        ]);
    }

    #[Route('/droit/politiqueenmatieredecookies', name: 'app_politiqueenmatieredecookies')]
    public function politiqueenmatieredecookies(): Response
    {
        return $this->render('droit/politiqueenmatieredecookies.html.twig', [
            'controller_name' => 'DroitController',
        ]);
    }
}
