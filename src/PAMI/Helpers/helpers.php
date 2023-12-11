<?php

$mockedMicroTime = null;
$mockedTime      = null;

if (!function_exists('getMicroTime')) {

    function getMicroTime(): string
    {
        global $mockedMicroTime;

        if (!empty($mockedMicroTime)) {
            return $mockedMicroTime;
        }

        return (string)microtime(true);
    }
}

if (!function_exists('setMockedMicroTime')) {

    function setMockedMicroTime(string $microTime): void
    {
        global $mockedMicroTime;

        $mockedMicroTime = $microTime;
    }
}

if (!function_exists('getTime')) {

    function getTime(): int
    {
        global $mockedTime;

        if (!empty($mockedTime)) {
            return $mockedTime;
        }

        return time();
    }
}

if (!function_exists('setMockedTime')) {

    function setMockedTime(int $time): void
    {
        global $mockedTime;

        $mockedTime = $time;
    }
}



