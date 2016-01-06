<?php

namespace ThomasSchulz\ClockUtil;

class Clock implements ClockInterface
{
    private static $currentTime = null;

    public static function now($now = null)
    {
        if ($now !== null) {
            static::$currentTime = $now;
        }

        if (static::$currentTime !== null) {
            return static::$currentTime;
        }

        return new \DateTime();
    }

    public function test1($param1)
    {
        echo 'real test1 with ' . $param1;
    }

    public function test2()
    {
        echo 'real test2';
        return new \DateTime();
    }
}