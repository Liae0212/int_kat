<?php

namespace App\DataFixtures;

use App\Entity\Catalogs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class CatalogFixtures extends Fixture
{
    protected Generator $faker;
    protected ObjectManager $manager;

    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create();
        $this->manager = $manager;

        for ($i = 0; $i < 10; ++$i) {
            $catalog = new Catalogs();
            $catalog->setTitle($this->faker->word);
            $catalog->setArtist($this->faker->name);
            $catalog->setGenre($this->faker->word);
            $manager->persist($catalog);
        }

        $manager->flush();
    }
}
