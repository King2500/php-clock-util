<?php

namespace ThomasSchulz\ClockUtil;

/**
 * Clock util class.
 * 
 * @author Thomas Schulz <mail@king2500.net>
 */
class Clock
{
    /**
     * @var \DateTime|null
     */
    private static $currentTime = null;

    /**
     * Get or set current time.
     * 
     * @param \DateTime|null $now
     * @return \DateTime
     */
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
