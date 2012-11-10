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
 * Stops a dongle.
 */
class DongleStopAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $when   now | gracefully | when convenient
     * @param string $device Dongle device name
     */
    public function __construct($when, $device)
    {
        parent::__construct('DongleStop');

        $this->setKey('when', $when);
        $this->setKey('device', $device);
    }
}
