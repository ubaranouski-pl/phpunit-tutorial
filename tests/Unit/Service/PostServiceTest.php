<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Repository\PostRepository;
use App\Entity;
use App\Service;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\Service\PostService
 */
class PostServiceTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getRelated
     * @return void
     */
    public function testGetRelated(): void
    {
        $repositoryMock = $this->createStub(PostRepository::class);
        $repositoryMock
            ->method('getRelatedByField')
            ->willReturn([
                $expected = $this->createStub(Entity\Post::class)
            ]);

        $testedInstance = new Service\PostService($repositoryMock);

        $result = $testedInstance->getRelated($this->createMock(Entity\Post::class));

        $this->assertIsArray($result);
        $this->assertSame($expected, $result[0]);
    }
}
