<?php

namespace App\Service;

use App\DTO\CommandeDto;
use App\Entity\Commande;
use App\Mapper\CommandeMapper;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class CommandeService
{
    private CommandeRepository $commandeRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(CommandeRepository $commandeRepository, EntityManagerInterface $entityManager)
    {
        $this->commandeRepository = $commandeRepository;
        $this->entityManager = $entityManager;
    }

    public function getAllCommandes():array
    {
        $commades = $this->commandeRepository->findAll();

        $commadeDTO = [];

        foreach ($commades as $commande)
        {
            $commadeDTO [] = CommandeMapper::mapToDTO($commande);

        }
        return $commadeDTO;
    }

    public function getCommandeById(int $id): ?Commande
    {
        return $this->commandeRepository->find($id);
    }
    public function createCommande(Commande $commande){
        $this->entityManager->persist($commande);
        $this->entityManager->flush();
    }



}