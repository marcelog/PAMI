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
 * Starts a dongle.
 */
class DongleStartAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $device Dongle device name
     */
    public function __construct($device)
    {
        parent::__construct('DongleStart');

        $this->setKey('device', $device);
    }
}
