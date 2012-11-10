<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Event;

/**
 * Event triggered for agents.
 */
class AgentsEvent extends EventMessage
{
    /**
     * Returns key: 'Status'.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getKey('Status');
    }

    /**
     * Returns key: 'Agent'.
     *
     * @return string
     */
    public function getAgent()
    {
        return $this->getKey('Agent');
    }

    /**
     * Returns key: 'Name'.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getKey('Name');
    }

    /**
     * Returns key: 'LoggedInChan'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('LoggedInChan');
    }

    /**
     * Returns key: 'LoggedInTime'.
     *
     * @return integer
     */
    public function getLoggedInTime()
    {
        return $this->getKey('LoggedInTime');
    }

    /**
     * Returns key: 'TalkingTo'.
     *
     * @return integer
     */
    public function getTalkingTo()
    {
        return $this->getKey('TalkingTo');
    }

    /**
     * Returns key: 'TalkingToChannel'.
     *
     * @return integer
     */
    public function getTalkingToChannel()
    {
        return $this->getKey('TalkingToChannel');
    }
}
