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
 * Park action message.
 */
class ParkAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $channel1 Channel name to park
     * @param string  $channel2 Channel to announce park info to (and return to if timeout)
     * @param integer $timeout  Number of milliseconds to wait before callback
     * @param string  $lot      Parking lot to park channel in
     */
    public function __construct($channel1, $channel2, $timeout = false, $lot = false)
    {
        parent::__construct('Park');

        $this->setKey('Channel', $channel1);
        $this->setKey('Channel2', $channel2);

        if ($timeout != false) {
            $this->setKey('Timeout', $timeout);
        }

        if ($lot != false) {
            $this->setKey('Parkinglot', $lot);
        }
    }
}
