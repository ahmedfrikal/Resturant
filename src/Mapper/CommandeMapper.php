<?php

namespace App\Mapper;

use App\DTO\CommandeDto;
use App\Entity\Commande;

class CommandeMapper
{
    public static function mapToDTO(Commande $commande):CommandeDto
    {
        $commandeDTO=new CommandeDto();
        $commandeDTO->setId($commande->getId());
        $commandeDTO->setDateCommande($commande->getDateCommande());
        $commandeDTO->setTotal($commande->getTotal());
        $commandeDTO->setEmployeId($commande->getEmploye()->getId());
        $commandeDTO->setEmployeNom($commande->getEmploye()->getNom());
        $commandeDTO->setPlatId($commande->getPlat()->getId());
        $commandeDTO->setPlatNom($commande->getPlat()->getNom());
        $commandeDTO->setPlatImage($commande->getPlat()->getImage());
        return  $commandeDTO;
    }
}