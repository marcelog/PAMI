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
 * Send a SMS through Dongle.
 */
class DongleSendSMSAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $device  Device name (like dongle01)
     * @param string $number  Destination number
     * @param string $message What to send
     */
    public function __construct($device, $number, $message)
    {
        parent::__construct('DongleSendSMS');

        $this->setKey('Device', $device);
        $this->setKey('Number', $number);
        $this->setKey('Message', $message);
    }
}
