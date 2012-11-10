<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Event;

use PAMI\Message\IncomingMessage;

/**
 * This is a generic event received from ami.
 */
abstract class EventMessage extends IncomingMessage
{
    /**
     * Returns key 'Event'.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getKey('Event');
    }
}
