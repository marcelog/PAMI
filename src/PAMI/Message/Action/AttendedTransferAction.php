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
 * Atxfer action message.
 */
class AttendedTransferAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel   Transferer's channel
     * @param string $extension Extension to transfer to
     * @param string $context   Context to transfer to
     * @param string $priority  Priority to transfer to
     */
    public function __construct($channel, $extension, $context, $priority)
    {
        parent::__construct('Atxfer');

        $this->setKey('Channel', $channel);
        $this->setKey('Exten', $extension);
        $this->setKey('Context', $context);
        $this->setKey('Priority', $priority);
    }
}
