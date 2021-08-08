<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Service\UsesArguments;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\Service\UsesArguments
 */
class UsesArgumentsTest extends TestCase
{
    /**
     * @covers ::processData
     * @dataProvider getTestData
     * @param int $value
     * @param string $type
     * @return void
     */
    public function testProcessData(int $value, string $type): void
    {
        $testedInstance = new UsesArguments();
        $result = $testedInstance->processData($value);
        $this->assertEquals($type, $result);
    }

    /**
     * @return <string, <int, string>>[]
     */
    public function getTestData(): array
    {
        return [
            'Small value' => [5, UsesArguments::TYPE_SMALL],
            'Medium value' => [50, UsesArguments::TYPE_MEDIUM],
            'Big value' => [500, UsesArguments::TYPE_BIG]
        ];
    }
}
