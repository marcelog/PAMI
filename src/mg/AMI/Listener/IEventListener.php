<?php
namespace AMI\Listener;

use AMI\Message\EventMessage;

interface IEventListener
{
    public function handle(EventMessage $event);
}