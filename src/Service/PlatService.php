<?php

namespace App\Service;

use App\DTO\PlatDTO;
use App\Entity\Plat;
use App\Mapper\PlatMapper;
use App\Repository\PlatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PlatService
{
private PlatRepository $platRepository;
private EntityManagerInterface $entityManager;
private SerializerInterface $serializer;
private ValidatorInterface $validator;

    public function __construct(PlatRepository $platRepository, EntityManagerInterface $entityManager, SerializerInterface $serializer,ValidatorInterface $validator)
    {
        $this->platRepository = $platRepository;
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
        $this->validator=$validator;
    }

    public function findALl()
    {
        $plats = $this->platRepository->findAll();

        $platDTOList = [];

        foreach ($plats as $plat) {
            $platDTOList[] = PlatMapper::EntityToMap($plat);
        }

        return $this->serializer->serialize($platDTOList, 'json');
           // [AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true, 'groups' => ['show_page']]
    }

    public function findById(int $id)
    {
        $plat=$this->platRepository->find($id);

        return  $plat

                ?$this->serializer->serialize(PlatMapper::EntityToMap($plat),'json')

                :$this->serializer->serialize(null,'json');
    }
    public function add(Request $request): ?Plat
    {
        $platDTO = $this->serializer->deserialize($request->getContent(), PlatDTO::class, 'json');

        $violations = $this->validator->validate($platDTO);

        if (count($violations) > 0)
        {
            return null;
        }

        $plat = PlatMapper::MapToEntity($platDTO);

        $this->entityManager->persist($plat);
        $this->entityManager->flush();

        return $plat;
    }

    public function  delete(int $id)
    {
        $platDTO=$this->findById($id);
        $platDTOJson= $this->serializer->deserialize($platDTO,PlatDTO::class,'json');
        $plat=PlatMapper::MapToEntity($platDTOJson);
        $this->entityManager->remove($plat);
        $this->entityManager->flush();
    }

    public function update(int $id,Request $request)
    {
        $platDTO=$this->findById($id);
        $platJson= $this->serializer->deserialize($platDTO,Plat::class,'json');
       // $plat=PlatMapper::MapToEntity($platDTOJson);
        $platJson->setNom($request->getNom());
        $platJson->setCategorie($request->getCategorie());
        $platJson->setPrix($request->getPrix());
        $platJson->setJours($request->getJours());
        $platJson->setIngredients($request->getIngredients());
        $platJson->setTempsPreparation($request->getTempsPreparation());
        $platJson->setImage($request->getImage());

    }

}