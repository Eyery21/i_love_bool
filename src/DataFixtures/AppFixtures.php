<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $book = new Book();
            $book->setTitle($faker->sentence(3)) // Génère un titre aléatoire
                ->setDesciption($faker->paragraph(3)) // Génère une description aléatoire
                ->setParution($faker->date('Y-m-d')) // Date aléatoire
                ->setPosseded($faker->boolean()) // Valeur booléenne aléatoire
                ->setImage($faker->imageUrl(640, 480, 'books', true)) // URL d'image aléatoire
                ->setUpdatedAt(new \DateTimeImmutable()); // Définit une date actuelle

            $manager->persist($book);
        }

        $manager->flush();
    }
}
