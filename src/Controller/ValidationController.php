<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\LigneCommande;
use App\Repository\ClientRepository;
use App\Repository\CommandeRepository;
use App\Repository\LigneCommandeRepository;
use App\Repository\ManifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValidationController extends AbstractController
{
    #[Route('/validation', name: 'app_validation')]
    public function index(Request $request, CommandeRepository $commandeRepository, ManifRepository $manifRepository, LigneCommandeRepository $ligneCommandeRepository, ClientRepository $clientRepository): Response
    { $liste = $request->request->get('liste');
        $liste = json_decode($liste);

        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $adresse = $request->request->get('adresse');
        $adressedeux = $request->request->get('adressedeux');
        $codepostal = $request->request->get('codepostal');
        $total = $request->request->get('total');

        $client = $this->getUser();

        $client->setNom($nom);
        $client->setPrenom($prenom);
        $client->setAdresse($adresse);
        $client->setAdressedeux($adressedeux);
        $client->setCodepostal($codepostal);
        $clientRepository->save($client, true);
        $commande = new Commande();
        $commande->setClient($client);
        $commande->setTotal($total);
        $commandeRepository->save($commande, true);
        $commande_id = $commande->getId();


        foreach ($liste as $manifestation) {
            $manif = $manifRepository->find($manifestation->id);
            $ligneCommande = new LigneCommande();
            $ligneCommande->setManifId($manif);
            $ligneCommande->setNbPlace($manifestation->quantite);
            $ligneCommande->setCommandeId($commande);
            $ligneCommandeRepository->save($ligneCommande, true);
        }

        return $this->render('validation/index.html.twig', [
            'controller_name' => 'ValidationController',
        ]);


    }
}
