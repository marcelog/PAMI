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
 * Response from an async originate.
 */
class OriginateResponseEvent extends EventMessage
{
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
     * Returns key: 'Exten'.
     *
     * @return string
     */
    public function getExten()
    {
        return $this->getKey('Exten');
    }

    /**
     * Returns key: 'Context'.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->getKey('Context');
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
     * Returns key: 'Reason'.
     *
     * @return string
     */
    public function getReason()
    {
        return $this->getKey('Reason');
    }

    /**
     * Returns key: 'UniqueID'.
     *
     * @return string
     */
    public function getUniqueID()
    {
        return $this->getKey('UniqueID');
    }

    /**
     * Returns key: 'ActionID'.
     *
     * @return string
     */
    public function getActionID()
    {
        return $this->getKey('ActionID');
    }

    /**
     * Returns key: 'Response'.
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->getKey('Response');
    }

    /**
     * Returns key: 'CallerIdNum'.
     *
     * @return string
     */
    public function getCallerIdNum()
    {
        return $this->getKey('CallerIdNum');
    }

    /**
     * Returns key: 'CallerIdName'.
     *
     * @return string
     */
    public function getCallerIdName()
    {
        return $this->getKey('CallerIdName');
    }
}
