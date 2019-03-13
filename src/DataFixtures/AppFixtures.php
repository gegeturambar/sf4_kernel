<?php

namespace App\DataFixtures;

use App\Entity\Direction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $dir = new Direction();
        $dir->setName('directory');
        $dir->setNbPlaces(15);
        $manager->persist($dir);

        $manager->flush();
    }
}
