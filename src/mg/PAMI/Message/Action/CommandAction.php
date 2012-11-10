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
 * Command action message.
 */
class CommandAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $command CLI Command to issue
     */
    public function __construct($command)
    {
        parent::__construct('Command');

        $this->setKey('Command', $command);
    }
}
