<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Provider\Address;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
}
//        for ($i = 0; $i < 20; $i++) {
//            $Personne = new Personne();
//            $Personne->setName('i);
//            $product->setPrice(mt_rand(10, 100));
//            $manager->persist($product);
//        }
//        $manager->flush();
   }

