<?php

declare(strict_types=1);

namespace App\Service;

class UsesArguments
{
    public const TYPE_SMALL = 'small';
    public const TYPE_MEDIUM = 'medium';
    public const TYPE_BIG = 'big';

    /**
     * @param int $value
     * @return string
     */
    public function processData(int $value): string
    {
        if (10 > $value) {
            return self::TYPE_SMALL;
        }

        if (100 > $value) {
            return self::TYPE_MEDIUM;
        }

        return self::TYPE_BIG;
    }
}
