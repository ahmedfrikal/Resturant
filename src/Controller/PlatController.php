<?php

namespace App\Controller;
use App\Service\PlatService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PlatController extends AbstractController
{
    private PlatService $platService;

    private EntityManagerInterface $entityManager;
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;

    /**
     * @param PlatService $platService
     * @param EntityManagerInterface $entityManager
     * @param SerializerInterface $serializer
     * @param ValidatorInterface $validator
     */
    public function __construct(PlatService $platService, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $this->platService = $platService;
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    #[Route('/plats', name: 'listPlat',methods: ['GET'])]
    public function index(): JsonResponse
    {
         $plats=$this->platService->findALl();

         return  new JsonResponse($plats,json:  true);
    }

    #[Route('/plats/{id}',name:'getPlat',methods:['GET'])]
    public function getPlat(int $id)
    {
        return new JsonResponse($this->platService->findById($id),json: true);
    }

    #[Route('/plats', name: 'addPlat', methods: ['POST'])]
    public function add(Request $request)
    {
        $plat=$this->platService->add($request);

        if ($plat==null)
        {
            return new JsonResponse(null, Response::HTTP_BAD_REQUEST);

        } else
        {
            return new JsonResponse($plat, Response::HTTP_CREATED);
        }
    }
    #[Route('/plats/{id}',name:'removePlat',methods:['delete'])]
    public function delete(int $id)
    {
        $this->platService->delete($id);

        return new JsonResponse(status: Response::HTTP_NO_CONTENT);
    }
    #[Route('/plats/{id}',name:'updatePlat',methods:['PATCH'])]
    public function update(int $id,Request $request)
    {
        $this->platService->update($id,$request);

        return new JsonResponse(status: Response::HTTP_NO_CONTENT);
    }
    

}
