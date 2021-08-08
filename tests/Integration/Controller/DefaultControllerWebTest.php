<?php

declare(strict_types=1);

namespace App\Tests\Integration\Controller;

use App\Controller\DefaultController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Contracts\HttpClient\Exception;

/**
 * @coversDefaultClass \App\Controller\DefaultController
 */
class DefaultControllerWebTest extends WebTestCase
{
    /**
     * @covers ::index
     * @return void
     * @throws Exception\ClientExceptionInterface
     * @throws Exception\RedirectionExceptionInterface
     * @throws Exception\ServerExceptionInterface
     */
    public function testIndex(): void
    {
        $client = static::createClient();
        $container = self::getContainer();
        $router = $container->get('router');
        $client->request('GET', $router->generate('index'));

        self::assertResponseIsSuccessful();
        self::assertResponseFormatSame('html');
        self::assertResponseHasHeader('Content-type');
        self::assertPageTitleSame(DefaultController::HTML_PAGE_TITLE);
    }
}
