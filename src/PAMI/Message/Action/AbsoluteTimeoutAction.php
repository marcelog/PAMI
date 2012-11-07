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
 * AbsoluteTimeout action message.
 */
class AbsoluteTimeoutAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $channel Channel to work on
     * @param integer $timeout Maximum duration of the call (sec)
     */
    public function __construct($channel, $timeout)
    {
        parent::__construct('AbsoluteTimeout');

        $this->setKey('Channel', $channel);
        $this->setKey('Timeout', $timeout);
    }
}
