<?php

namespace App\Enum;

abstract class Enum
{
    /**
     * @return array
     */
    public static function all(): array
    {
        return [];
    }

    /**
     * @return array|int|string
     */
    public static function random(): int|array|string
    {
        $key = array_rand(static::all());

        return static::all()[$key];
    }

    /**
     * Give all enum values key
     * @example ['slug' => 'admin']
     * @param string $key
     * @return array|int|string
     */
    public static function allInArrays(string $key): int|array|string
    {
        return array_map(fn($value) => [$key => $value], static::all());
    }
}
