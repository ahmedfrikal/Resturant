<?php

namespace App\Mapper;

use App\DTO\PlatDTO;
use App\Entity\Plat;

class PlatMapper
{
    public static function MapToEntity(PlatDTO $platDTO):Plat{
        $plat=new Plat();
        $plat->setNom($platDTO->getNom());
        $plat->setPrix($platDTO->getPrix());
        $plat->setCategorie($platDTO->getCategorie());
        $plat->setTempsPreparation($platDTO->getTempsPreparation());
        $plat->setImage($platDTO->getImage());
        $plat->setIngredients($platDTO->getIngredients());
        return $plat;
    }

    public static function EntityToMap(Plat $plat): PlatDTO {
        $platDTO = new PlatDTO();
        $platDTO->setId($plat->getId());
        $platDTO->setNom($plat->getNom());
        $platDTO->setPrix($plat->getPrix());
        $platDTO->setCategorie($plat->getCategorie());
        $platDTO->setTempsPreparation($plat->getTempsPreparation());
        $platDTO->setImage($plat->getImage());
        $platDTO->setJours($plat->getJours());
        $platDTO->setIngredients($plat->getIngredients());
        return $platDTO;
    }

}