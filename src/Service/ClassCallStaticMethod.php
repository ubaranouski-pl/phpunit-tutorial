<?php

declare(strict_types=1);

namespace App\Service;

class ClassCallStaticMethod
{
    /**
     * @return int[]
     */
    public function callStaticMethod(): array
    {
        return ClassHasStaticMethod::doSomething();
    }
}
