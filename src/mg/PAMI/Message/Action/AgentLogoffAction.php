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
 * AgentLogoff action message.
 */
class AgentLogoffAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $agent Agent ID of the agent to log off
     * @param string $soft  Set to true to not hangup existing calls
     */
    public function __construct($agent, $soft = false)
    {
        parent::__construct('AgentLogoff');

        $this->setKey('Agent', $agent);
        $this->setKey('Soft', $soft ? 'true' : 'false');
    }
}
