<?php

namespace App\Enum;

class Role extends Enum
{
    public const AUTHOR = 'author';

    public const ADMIN = 'admin';

    /**
     * @return int[]
     */
    public static function all(): array
    {
        return [
            self::AUTHOR,
            self::ADMIN,
        ];
    }
}
