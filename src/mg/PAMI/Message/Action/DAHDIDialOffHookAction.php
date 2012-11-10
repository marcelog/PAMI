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
 * DAHDIDiallOffhook action message.
 */
class DAHDIDialOffHookAction extends ActionMessage
{
    /**
     * Constructor.
     */
    public function __construct($channel, $number)
    {
        parent::__construct('DAHDIDialOffhook');

        $this->setKey('DAHDIChannel', $channel);
        $this->setKey('Number', $number);
    }
}
