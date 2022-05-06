<?php

namespace App\DataFixtures;


use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Provider\Address;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $personne = new Personne();
            $personne->setName($faker->name);
            $personne->setFirstname($faker->firstName);
            $personne->setAge($faker->randomDigit);
            $manager->persist($personne);
        }

        $manager->flush();

    }
}