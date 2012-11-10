<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Action;

/**
 * QueueRemove action message.
 */
class QueueRemoveAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $queue     The queue
     * @param string $interface The interface
     */
    public function __construct($queue, $interface)
    {
        parent::__construct('QueueRemove');

        $this->setKey('Queue', $queue);
        $this->setKey('Interface', $interface);
    }
}
