<?php
namespace ThomasSchulz\ClockUtil;

interface ClockInterface
{
    public static function now($now = null);

    public function test1($param1);

    public function test2();
}