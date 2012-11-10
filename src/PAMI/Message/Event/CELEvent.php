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
 * Event triggered when a CEL log message is generated.
 */
class CELEvent extends EventMessage
{
    /**
     * Returns key: 'AMAFlags'.
     *
     * @return string
     */
    public function getAMAFlags()
    {
        return $this->getKey('AMAFlags');
    }

    /**
     * Returns key: 'AccountCode'.
     *
     * @return string
     */
    public function getAccountCode()
    {
        return $this->getKey('AccountCode');
    }

    /**
     * Returns key: 'AppData'.
     *
     * @return string
     */
    public function getAppData()
    {
        return $this->getKey('AppData');
    }

    /**
     * Returns key: 'Application'.
     *
     * @return string
     */
    public function getApplication()
    {
        return $this->getKey('Application');
    }

    /**
     * Returns key: 'CallerIDani'.
     *
     * @return string
     */
    public function getCallerIDani()
    {
        return $this->getKey('CallerIDani');
    }

    /**
     * Returns key: 'CallerIDdnid'.
     *
     * @return string
     */
    public function getCallerIDdnid()
    {
        return $this->getKey('CallerIDdnid');
    }

    /**
     * Returns key: 'CallerIDname'.
     *
     * @return string
     */
    public function getCallerIDname()
    {
        return $this->getKey('CallerIDname');
    }

    /**
     * Returns key: 'CallerIDnum'.
     *
     * @return string
     */
    public function getCallerIDnum()
    {
        return $this->getKey('CallerIDnum');
    }

    /**
     * Returns key: 'CallerIDrdnis'.
     *
     * @return string
     */
    public function getCallerIDrdnis()
    {
        return $this->getKey('CallerIDrdnis');
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
     * Returns key: 'Context'.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }

    /**
     * Returns key: 'Event'.
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->getKey('Event');
    }

    /**
     * Returns key: 'EventName'.
     *
     * @return string
     */
    public function getEventName()
    {
        return $this->getKey('EventName');
    }

    /**
     * Returns key: 'EventTime'.
     *
     * @return string
     */
    public function getEventTime()
    {
        return $this->getKey('EventTime');
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
     * Returns key: 'Extra'.
     *
     * @return string
     */
    public function getExtra()
    {
        return $this->getKey('Extra');
    }

    /**
     * Returns key: 'LinkedID'.
     *
     * @return string
     */
    public function getLinkedID()
    {
        return $this->getKey('LinkedID');
    }

    /**
     * Returns key: 'Peer'.
     *
     * @return string
     */
    public function getPeer()
    {
        return $this->getKey('Peer');
    }

    /**
     * Returns key: 'PeerAccount'.
     *
     * @return string
     */
    public function getPeerAccount()
    {
        return $this->getKey('PeerAccount');
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
     * Returns key: 'Timestamp'.
     *
     * @return string
     */
    public function getTimestamp()
    {
        return $this->getKey('Timestamp');
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
     * Returns key: 'Userfield'.
     *
     * @return string
     */
    public function getUserfield()
    {
        return $this->getKey('Userfield');
    }
}
