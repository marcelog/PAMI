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
 * DAHDIDNDoff action message.
 */
class DAHDIDNDOffAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Target dahdi Channel
     */
    public function __construct($channel)
    {
        parent::__construct('DAHDIDNDOff');

        $this->setKey('DAHDIChannel', $channel);
    }
}
