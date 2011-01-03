<?php
namespace PAMI\Event\Message\Factory;

interface IEventFactory
{
    public static function createFromRaw($message);
}