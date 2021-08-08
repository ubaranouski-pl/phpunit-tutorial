<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Service\ClassHasStaticMethod;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\Service\ClassHasStaticMethod
 */
class ClassHasStaticMethodTest extends TestCase
{
    /**
     * @covers ::doSomething
     * @return void
     */
    public function testDoSomething(): void
    {
        $result = ClassHasStaticMethod::doSomething();
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
    }

    /**
     * @covers ::callOwnStaticMethod
     * @return void
     */
    public function testCallOwnStaticMethod(): void
    {
        $obj = new ClassHasStaticMethod();
        $result = $obj->callOwnStaticMethod();
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
    }
}
