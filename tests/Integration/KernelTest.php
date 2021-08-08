<?php

namespace App\Tests\Integration;

use App\Service;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class KernelTest extends KernelTestCase
{
    public function setUp(): void
    {
        self::bootKernel();
    }

    /**
     * @return void
     */
    public function testContainer(): void
    {
        $this->assertSame('test', self::$kernel->getEnvironment());
        $container = self::getContainer();
        $myCustomService = $container->get(Service\PostService::class);
        $this->assertInstanceOf(Service\PostService::class, $myCustomService);
    }
}
