<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Trick;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /**
         * Create new user
         */
        $user = new User();
        $password = $this->encoder->encodePassword($user, 'admin');
        $user
            ->setUsername('admin')
            ->setEmail('admin@gmail.com')
            ->setPassword($password)
            ->setRole('ROLE_ADMIN');


        $manager->persist($user);

        $manager->flush();
    }
}
