<?php

namespace App\Tests\Integration\DataFixtures;

use App\Factory\PostFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public const NUM_ENTITIES = 2;

    /**
     * @param PostFactory $postFactory
     */
    public function __construct(
        private PostFactory $postFactory
    )
    {}

    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < static::NUM_ENTITIES; $i++) {
            $post = $this->postFactory->factory();
            $manager->persist($post);
        }

        $manager->flush();
    }

    /**
     * @param EntityManagerInterface $manager
     * @return void
     */
    public function purge(EntityManagerInterface $manager): void
    {
        $purger = new ORMPurger($manager);
        $purger->purge();
    }
}
