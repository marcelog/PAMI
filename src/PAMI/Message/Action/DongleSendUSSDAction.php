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
 * Send a USSD through dongle.
 */
class DongleSendUSSDAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $device Device name (like dongle01)
     * @param string $ussd   USSD to send
     */
    public function __construct($device, $ussd)
    {
        parent::__construct('DongleSendUSSD');

        $this->setKey('Device', $device);
        $this->setKey('Ussd', $ussd);
    }
}
