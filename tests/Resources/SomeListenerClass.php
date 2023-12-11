<?php

namespace Tests\Resources;

use PAMI\Listener\IEventListener;
use PAMI\Message\Event\EventMessage;

class SomeListenerClass implements IEventListener
{
    public static ?EventMessage $event;

    public function handle(EventMessage $event): void
    {
        self::$event = $event;
    }
}
