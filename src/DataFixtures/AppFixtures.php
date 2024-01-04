<?php

namespace App\DataFixtures;

use App\LoadData\CommandeFixtures;
use App\LoadData\EmployeFixtures;
use App\LoadData\PlatFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    private EmployeFixtures $employeFixtures;
    private PlatFixtures $platFixtures;
    private CommandeFixtures $commandeFixtures;
    public function __construct(EmployeFixtures $employeFixtures,PlatFixtures $platFixtures,CommandeFixtures $commandeFixtures)
    {
        $this->employeFixtures=$employeFixtures;
        $this->platFixtures=$platFixtures;
        $this->commandeFixtures=$commandeFixtures;
    }

    public function load(ObjectManager $manager): void
    {
       $this->employeFixtures->load($manager)->flush();
       $this->platFixtures->load($manager)->flush();
       $this->commandeFixtures->load($manager)->flush();
    }
}
