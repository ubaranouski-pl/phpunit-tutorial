<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Service\ClassCallStaticMethod;
use App\Service\ClassHasStaticMethod;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\Service\ClassCallStaticMethod
 */
class ClassCallStaticMethodTest extends TestCase
{
    /**
     * @covers ::callStaticMethod
     * @uses \App\Service\ClassHasStaticMethod::doSomething()
     * @return void
     */
    public function testCallStaticMethod(): void
    {
        $obj = new ClassCallStaticMethod();
        $result = $obj->callStaticMethod();
        $this->assertIsArray($result);
        $expected = ClassHasStaticMethod::doSomething();
        $this->assertCount(count($expected), $result);
    }
}
