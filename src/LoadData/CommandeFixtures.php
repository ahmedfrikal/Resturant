<?php

namespace App\LoadData;

use App\Entity\Commande;
use App\Repository\EmployeRepository;
use App\Repository\PlatRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;

class CommandeFixtures implements DependentFixtureInterface
{
    private EmployeRepository $employeRepository;
    private PlatRepository $platRepository;

    public function __construct(EmployeRepository $employeRepository, PlatRepository $platRepository)
    {
        $this->employeRepository = $employeRepository;
        $this->platRepository = $platRepository;
    }

    public function load(ObjectManager $manager): ObjectManager
    {
        $faker = FakerFactory::create();

        $employes = $this->employeRepository->findAll();
        $plats = $this->platRepository->findAll();

        for ($i = 1; $i <= 10; $i++) {
            $commande = new Commande();
            $commande
                ->setPlat($faker->randomElement($plats))
                ->setEmploye($faker->randomElement($employes))
                ->setDateCommande($faker->dateTimeThisMonth)
                ->setTotal($faker->randomFloat(2, 10, 100));

            $manager->persist($commande);
        }
         return $manager;
    }

    public function getDependencies(): array
    {
        return [
            EmployeFixtures::class,
            PlatFixtures::class,
        ];
    }
}