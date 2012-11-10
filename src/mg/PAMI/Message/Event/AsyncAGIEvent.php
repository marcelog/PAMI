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
 * Event triggered when an async agi is executed.
 */
class AsyncAGIEvent extends EventMessage
{
    private $_envVariables = array();

    /**
     * Constructor.
     *
     * @param string $rawContent Literal message as received from ami
     */
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);

        $this->setKey('Env', urldecode($this->getEnvironment()));
        $this->setKey('Result', urldecode($this->getResult()));
    }

    /**
     * Returns key: 'Privilege'.
     *
     * @return string
     */
    public function getPrivilege()
    {
        return $this->getKey('Privilege');
    }

    /**
     * Returns key: 'SubEvent'.
     *
     * @return string
     */
    public function getSubEvent()
    {
        return $this->getKey('SubEvent');
    }

    /**
     * Returns key: 'Channel'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }

    /**
     * Returns the original environment received with this event.
     *
     * @return string
     */
    public function getEnvironment()
    {
        return $this->getKey('Env');
    }

    /**
     * Returns the agi result for the command issued.
     *
     * @return string
     */
    public function getResult()
    {
        return $this->getKey('Result');
    }

    /**
     * Returns the command id associated with this event.
     *
     * @return string
     */
    public function getCommandId()
    {
        return $this->getKey('CommandId');
    }
}
