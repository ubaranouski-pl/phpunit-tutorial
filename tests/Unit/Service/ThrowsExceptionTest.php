<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Service\ThrowsException;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\Service\ThrowsException
 */
class ThrowsExceptionTest extends TestCase
{
    /**
     * @covers ::throwAnException
     * @return void
     */
    public function testThrowException(): void
    {
        $testedInstance = new ThrowsException();
        $this->expectException(\RuntimeException::class);
        $testedInstance->throwAnException();
    }
}
