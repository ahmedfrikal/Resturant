<?php

namespace App\Service;

use App\DTO\EmployeDTO;
use App\Entity\Employe;
use App\Mapper\EmployeMapper;
use App\Repository\EmployeRepository;
use Doctrine\ORM\EntityManagerInterface;

class EmployeService
{
    private EmployeRepository $employeRepository;

    public function __construct(EmployeRepository $employeRepository)
    {
        $this->employeRepository=$employeRepository;
    }

    public function FindAll():array{
        $employes=$this->employeRepository->findAll();
        $employeDTOList=[];
        foreach ($employes as $employe){
            $employeDTOList[]=EmployeMapper::mapToDTO($employe);
        }
        return $employeDTOList;
    }
    public function FindById(int $id): ?EmployeDTO{
        $employe=$this->getEmploye($id);
        if(!$employe){
            return null;
        }
        $employesDTO=EmployeMapper::mapToDTO($employe);
        return $employesDTO;
    }
    private function getEmploye(int $id):Employe{
        return $this->employeRepository->find($id);
    }

    public function delete(int $id, EntityManagerInterface $entityManager): void
    {
        $employe = $this->getEmploye($id);
        $entityManager->remove($employe);
        $entityManager->flush();
    }
    public function addEmployeFromRequest($requestData): Employe
    {
        $employe = $this->serializer->deserialize($requestData, Employe::class, 'json');
        $this->entityManager->persist($employe);
        $this->entityManager->flush();

        return $employe;
    }
}