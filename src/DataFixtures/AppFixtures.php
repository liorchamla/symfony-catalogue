<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Rating;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-FR');

        for ($c = 0; $c < 5; $c++) {
            $category = new Category;
            $category->setTitle($faker->catchPhrase)
                ->setDescription($faker->realText(140));

            $manager->persist($category);

            $limit = mt_rand(5, 20);

            for ($p = 0; $p < $limit; $p++) {
                $product = new Product;
                $product->setTitle($faker->catchPhrase)
                    ->setDescription($faker->realText(300))
                    ->setPrice($faker->randomFloat(2, 50, 200))
                    ->setCategory($category);

                $manager->persist($product);

                $ratingLimit = mt_rand(1, 10);

                for ($r = 0; $r < $ratingLimit; $r++) {
                    $rating = new Rating;
                    $rating->setAuthor($faker->name)
                        ->setNotation(mt_rand(1, 5))
                        ->setContent($faker->realText())
                        ->setProduct($product);

                    $manager->persist($rating);
                }
            }
        }

        $manager->flush();
    }
}
