<?php

declare(strict_types=1);

namespace App\Tests\Unit\Repository;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Persisters\Entity\EntityPersister;
use Doctrine\ORM\UnitOfWork;
use Doctrine\ORM\Mapping\ClassMetadata;
use PHPUnit\Framework\TestCase;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @coversDefaultClass \App\Repository\PostRepository
 */
class PostRepositoryTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getRelatedByField
     * @return void
     */
    public function testGetRelatedByField(): void
    {
        $registryStub = $this->createStub(ManagerRegistry::class);
        $emStub = $this->createStub(EntityManagerInterface::class);
        $registryStub
            ->method('getManagerForClass')
            ->willReturn($emStub);
        $uowStub = $this->createStub(UnitOfWork::class);
        $emStub
            ->method('getUnitOfWork')
            ->willReturn($uowStub);
        $emStub
            ->method('getClassMetadata')
            ->willReturn($this->createStub(ClassMetadata::class));
        $persisterStub = $this->createStub(EntityPersister::class);
        $uowStub
            ->method('getEntityPersister')
            ->willReturn($persisterStub);
        $persisterStub
            ->method('loadAll')
            ->willReturn([
                $expected = $this->createStub(Post::class)
            ]);

        $testedInstance = new PostRepository($registryStub);

        $result = $testedInstance->getRelatedByField($this->createStub(Post::class), 'category');
        $this->assertIsArray($result);
        $this->assertSame($expected, $result[0]);
    }
}
