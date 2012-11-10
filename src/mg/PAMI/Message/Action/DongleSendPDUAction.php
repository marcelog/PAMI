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
 * Send a PDU through dongle.
 */
class DongleSendPDUAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $device Device name (like dongle01)
     * @param string $pdu    PDU to send
     */
    public function __construct($device, $pdu)
    {
        parent::__construct('DongleSendPDU');

        $this->setKey('Device', $device);
        $this->setKey('Pdu', $pdu);
    }
}
