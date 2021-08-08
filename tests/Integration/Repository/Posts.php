<?php

declare(strict_types=1);

namespace App\Tests\Integration\Repository;

use App\Entity\Post;
use App\Factory\PostFactory;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class Posts extends KernelTestCase
{
    private const NUM_INSTANCES = 2;

    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        self::bootKernel();
    }

    /**
     * @return void
     */
    public function testExampleWithFixtures(): void
    {
        $container = self::getContainer();
        $repository = $container->get(PostRepository::class);

        $posts = self::createPosts(static::NUM_INSTANCES);

        $result = $repository->findAll();
        $this->assertIsArray($posts);
        $this->assertCount(static::NUM_INSTANCES, $result);

        foreach ($posts as $post) {
            $this->assertContains($post, $result);
        }

        self::deletePosts();
    }

    /**
     * @return Post[]
     */
    private static function createPosts(int $num): array
    {
        $container = self::getContainer();
        /** @var PostFactory $factory */
        $factory = $container->get(PostFactory::class);
        $manager = $container->get('doctrine')->getManager();

        $posts = [];
        for ($i = 0; $i < $num; $i++) {

            $post = $factory->factory();
            $manager->persist($post);
            $posts[] = $post;
        }

        $manager->flush();
        return $posts;
    }

    /**
     * @return void
     */
    private static function deletePosts()
    {
        $container = self::getContainer();
        $repository = $container->get(PostRepository::class);
        $manager = $container->get('doctrine')->getManager();
        $posts = $repository->findAll();
        foreach ($posts as $post) {
            $manager->remove($post);
        }
        $manager->flush();
    }
}
