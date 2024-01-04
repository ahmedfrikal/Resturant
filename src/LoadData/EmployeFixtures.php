<?php

namespace App\LoadData;

use App\Entity\Employe;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;

class EmployeFixtures
{
    public function load( ObjectManager $manager):ObjectManager{
        $faker = FakerFactory::create();
        $roles = ['serveur', 'chef', 'gestion'];

        for ($i = 1; $i <= 10; $i++) {
            $employe = new Employe();
            $employe
                ->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setImage("image$i.jpg")
                ->setRole($roles[array_rand($roles)]);
            $manager->persist($employe);
        }
        return $manager;

    }
}