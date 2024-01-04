<?php

namespace App\Mapper;

use App\DTO\EmployeDTO;
use App\Entity\Employe;

class EmployeMapper
{

    public static function mapToEntity(EmployeDTO $employeDTO): Employe
    {
        $employe = new Employe();
        $employe->setId($employeDTO->getId());
        $employe->setNom($employeDTO->getNom());
        $employe->setPrenom($employeDTO->getPrenom());
        $employe->setImage($employeDTO->getImage());
        $employe->setRole($employeDTO->getRole());

        return $employe;
    }

    public static function mapToDTO(Employe $employe): EmployeDTO
    {
        $employeDTO = new EmployeDTO();

        $employeDTO->setId($employe->getId());
        $employeDTO->setNom($employe->getNom());
        $employeDTO->setPrenom($employe->getPrenom());
        $employeDTO->setImage($employe->getImage());
        $employeDTO->setRole($employe->getRole());

        return $employeDTO;
    }

}