<?php

namespace App\LoadData;


use App\Entity\Plat;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
class PlatFixtures
{
    public function load(ObjectManager $manager): ObjectManager
    {
        $faker = FakerFactory::create();
        $jours = $this->jours();

        for ($i = 1; $i <= 5; $i++) {
            $plat = new Plat();
            $plat
                ->setNom($faker->word)
                ->setCategorie($faker->word)
                ->setPrix($faker->randomFloat(2, 5, 50))
                ->setJours([$faker->randomElement($jours)])
                ->setIngredients([$faker->words(5, true)])
                ->setTempsPreparation($faker->numberBetween(10, 60))
                ->setImage("image$i.jpg");

            $manager->persist($plat);
        }

        $manager->flush();
        return $manager;
    }

    public function jours(): array
    {
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        return $jours;
    }
}