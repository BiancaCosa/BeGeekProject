<?php
namespace ShopBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Product;
use Faker\Factory;


class AppFixtures extends Fixture
{
   
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

            for ($i=0; $i<30; $i++){
                $product = new Product();
                $product->setModel('product '.$i);
                $product->setCategory($faker->word());
                $product->setPrice($faker->randomNumber(2));
                $product->setImage($faker->imageUrl());
                $manager->persist($product);
            }
        $manager->flush();
        
    }


}