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
 * AGI action message.
 */
class AGIAction extends ActionMessage
{
    /**
     * Constructor.
     */
    public function __construct($channel, $command, $commandId = false)
    {
        parent::__construct('AGI');

        $this->setKey('Channel', $channel);
        $this->setKey('Command', $command);

        if ($commandId !== false) {
            $this->setKey('CommandId', $commandId);
        }
    }
}
