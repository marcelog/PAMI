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
 * QueueReload action message.
 */
class QueueReloadAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $queue      Queue name
     * @param Boolean $members    Reload members
     * @param Boolean $rules      Reload rules
     * @param Boolean $parameters Reload parameters
     */
    public function __construct($queue = false, $members = false, $rules = false, $parameters = false)
    {
        parent::__construct('QueueReload');

        if ($queue !== false) {
            $this->setKey('Queue', $queue);
        }

        $this->setKey('Members', $members ? 'yes' : 'no');
        $this->setKey('Rules', $rules ? 'yes' : 'no');
        $this->setKey('Parameters', $parameters ? 'yes' : 'no');
    }
}
