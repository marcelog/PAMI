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
 * QueueAdd action message.
 */
class QueueAddAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $queue     Queue name
     * @param string $interface Interface ... ?
     */
    public function __construct($queue, $interface)
    {
        parent::__construct('QueueAdd');

        $this->setKey('Interface', $interface);
        $this->setKey('Queue', $queue);
    }

    /**
     * Sets state interface ... ? Key: 'StateInterface'.
     *
     * @param string $stateInterface State interface ... ?
     */
    public function setStateInterface($stateInterface)
    {
        $this->setKey('StateInterface', $stateInterface);
    }

    /**
     * Sets penalty. Key: 'Penalty'.
     *
     * @param string $penalty Penalty .. ?
     */
    public function setPenalty($penalty)
    {
        $this->setKey('Penalty', $penalty);
    }

    /**
     * Sets member name. Key: 'MemberName'.
     *
     * @param string $memberName Member name ?
     */
    public function setMemberName($memberName)
    {
        $this->setKey('MemberName', $memberName);
    }

    /**
     * Sets paused. Key: 'Paused'.
     *
     * @param string $paused Paused .. ?
     */
    public function setPaused($paused)
    {
        $this->setKey('Paused', $paused);
    }
}
