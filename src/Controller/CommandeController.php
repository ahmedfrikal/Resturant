<?php

namespace App\Controller;


use App\Entity\Commande;
use App\Entity\Employe;
use App\Entity\Plat;
use App\Service\CommandeService;
use App\Service\EmployeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CommandeController extends AbstractController
{

    private CommandeService $commandeService;
    private SerializerInterface $serializer;

  private EmployeService $employeService;

    public function __construct(CommandeService $commandeService, SerializerInterface $serializer)
    {
        $this->commandeService = $commandeService;
        $this->serializer = $serializer;
    }

    #[Route('/commande', name: 'commande_index', methods: ['GET'])]
    public function index(): Response
    {
        $commandes = $this->commandeService->getAllCommandes();

        $jsonContent = $this->serializer->serialize($commandes, 'json');

        return new JsonResponse($jsonContent, 200, [], true);
    }


}
