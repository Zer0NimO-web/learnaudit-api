<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Folder;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");

        for ($f = 0; $f < 10; $f ++) {
            $folder = new Folder();
            $folder->setName($faker->company());

            $manager->persist($folder);
        }
        
        $manager->flush();
    }
}
