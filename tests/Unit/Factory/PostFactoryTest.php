<?php

declare(strict_types=1);

namespace App\Tests\Unit\Factory;

use App\Factory\PostFactory;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\Factory\PostFactory
 */
class PostFactoryTest extends TestCase
{
    /**
     * @covers ::factory
     * @return void
     */
    public function testFactory(): void
    {
        $testedInstance = new PostFactory();
        $post = $testedInstance->factory();
        $this->assertNotEmpty($post->getTitle());
        $this->assertNotEmpty($post->getContent());
        $this->assertNotEmpty($post->getCategory());
    }
}
