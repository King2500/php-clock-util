<?php

namespace ThomasSchulz\ClockUtil;

class Clock
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
}