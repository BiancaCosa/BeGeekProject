<?php
namespace ShopBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\User;
use Faker\Factory;


class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

            for($i=0; $i<30; $i++){
                $user = new User();
                $user->setUserName($faker->userName());
                $user->setPassword($faker->password());
                $user->setEmail($faker->unique()->email);
                $user->setPremium($faker->boolean(false));
                $user->setNameComplete($faker->name());
                $manager->persist($user); 
            }
        $manager->flush(); 
    }
}