<?php
namespace AMI\Listener;

use AMI\Message\Event\EventMessage;

interface IEventListener
{
    public function handle(EventMessage $event);
}