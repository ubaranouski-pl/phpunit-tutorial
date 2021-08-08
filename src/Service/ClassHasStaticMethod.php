<?php

declare(strict_types=1);

namespace App\Service;

class ClassHasStaticMethod
{
    /**
     * @return int[]
     */
    public static function doSomething(): array
    {
        return [0];
    }

    /**
     * @return int[]
     */
    public function callOwnStaticMethod(): array
    {
        return static::doSomething();
    }
}
