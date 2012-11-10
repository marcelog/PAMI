<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Listener;

use PAMI\Message\Event\EventMessage;

/**
 * Implement this interface in your own classes to make them event listeners.
 */
interface EventListenerInterface
{
    /**
     * Event handler.
     *
     * @param EventMessage $event The received event
     */
    public function handle(EventMessage $event);
}
