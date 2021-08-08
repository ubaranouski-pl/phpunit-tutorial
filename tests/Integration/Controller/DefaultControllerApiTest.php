<?php

declare(strict_types=1);

namespace App\Tests\Integration\Controller;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Controller\DefaultController;
use Symfony\Contracts\HttpClient\Exception;

/**
 * @coversDefaultClass \App\Controller\DefaultController
 */
class DefaultControllerApiTest extends ApiTestCase
{
    /**
     * @covers ::api
     * @return void
     * @throws Exception\ClientExceptionInterface
     * @throws Exception\DecodingExceptionInterface
     * @throws Exception\RedirectionExceptionInterface
     * @throws Exception\ServerExceptionInterface
     * @throws Exception\TransportExceptionInterface
     */
    public function testApi(): void
    {
        static::createClient()->request('GET', '/api');

        self::assertResponseIsSuccessful();
        self::assertJsonContains(['message' => DefaultController::MESSAGE]);
    }
}
