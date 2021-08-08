<?php

declare(strict_types=1);

namespace App\Service;

class ThrowsException
{
    /**
     * @return void
     */
    public function throwAnException(): void
    {
        throw new \RuntimeException('This is an exception!');
    }
}
