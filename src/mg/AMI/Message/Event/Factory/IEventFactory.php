<?php
namespace AMI\Event\Message\Factory;

interface IEventFactory
{
    public static function createFromRaw($message);
}