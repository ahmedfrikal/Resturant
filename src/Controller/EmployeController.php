<?php

namespace App\Controller;

use App\Mapper\EmployeMapper;
use App\Service\EmployeService;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class EmployeController extends AbstractController
{
    private EmployeService $employeService;
    private SerializerInterface $serializer;

    public function __construct(EmployeService $employeService ,SerializerInterface $serializer)
    {
        $this->employeService=$employeService;
        $this->serializer=$serializer;
    }

    #[Route('/employe', name: 'employes',methods: ['GET'])]
    public function findAll(): JsonResponse
    {
        try {
            $employes=$this->employeService->FindAll();
            $jsonEmployes=$this->serializer->serialize($employes,'json');
            return new JsonResponse($jsonEmployes,Response::HTTP_OK,[],true);
        }
        catch (\Exception $exception){
            return new JsonResponse($exception->getMessage(),$exception->getCode(),[],true);
        }
    }

    #[Route('/employe/{id}', name: 'getEmployes',methods: ['GET'])]
    public function findById(int $id)
    {
          $employe=$this->employeService->FindById($id);
            if($employe==null){
                return new JsonResponse(status: Response::HTTP_NOT_FOUND);
            }else{
                $jsonEmploye=$this->serializer->serialize($employe,'json');
                return new JsonResponse($jsonEmploye,Response::HTTP_OK,['accept'=>'json'],true);
            }
    }
    #[Route('/employe/{id}', name: 'DeleteEmployes', methods: ['DELETE'])]
    public function delete(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $this->employeService->delete($id, $entityManager);

        return new JsonResponse(['message' => 'L\'employé a été supprimé avec succès.'], Response::HTTP_ACCEPTED);
    }

    #[Route('/employe', name: 'AddEmploye', methods: ['POST'])]
    public function add(Request $request): JsonResponse
    {
        $employeData = $request->getContent();
        $employe = $this->employeService->addEmployeFromRequest($employeData);
        $imageExtension = pathinfo($employe->getImage(), PATHINFO_EXTENSION);

        if (!in_array(strtolower($imageExtension), ['pdf', 'jpg'])) {
            return new JsonResponse(status: Response::HTTP_BAD_REQUEST);
        }
        $jsonEmploye = $this->serializer->serialize($employe, 'json');

        return new JsonResponse($jsonEmploye, Response::HTTP_CREATED, [], true);
    }



 }
