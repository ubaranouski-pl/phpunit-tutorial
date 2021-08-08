<?php

declare(strict_types=1);

namespace App\Tests\Integration\Controller;

use App\Factory\PostFactory;
use App\Tests\Integration\DataFixtures\PostFixtures;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

/**
 * @coversDefaultClass \App\Controller\PostsController
 */
class PostsControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->client = static::createClient();
    }

    /**
     * @covers ::index
     * @return void
     */
    public function testIndex(): void
    {
        $container = self::getContainer();
        $manager = $container->get('doctrine')->getManager();
        $factory = $container->get(PostFactory::class);
        $fixtures = new PostFixtures($factory);
        $fixtures->load($manager);

        $router = $container->get('router');
        $this->client->request('GET', $router->generate('posts_index'));

        self::assertResponseIsSuccessful();
        self::assertResponseFormatSame('html');
        self::assertResponseHasHeader('Content-type');
        self::assertSelectorTextSame('#total', (string) PostFixtures::NUM_ENTITIES);
    }

    /**
     * @return void
     */
    public function tearDown(): void
    {
        $container = self::getContainer();
        $manager = $container->get('doctrine')->getManager();
        $purger = new ORMPurger($manager);
        $purger->purge();
    }
}
