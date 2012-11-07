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
 * DAHDIHangup action message.
 */
class DAHDIHangupAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Channel to hangup
     */
    public function __construct($channel)
    {
        parent::__construct('DAHDIHangup');

        $this->setKey('DAHDIChannel', $channel);
    }
}