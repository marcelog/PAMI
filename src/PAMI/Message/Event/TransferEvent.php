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
 * Event triggered when a call is transfered.
 */
class TransferEvent extends EventMessage
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
     * Returns key: 'TransferMethod'.
     *
     * @return string
     */
    public function getTransferMethod()
    {
        return $this->getKey('TransferMethod');
    }

    /**
     * Returns key: 'TransferType'.
     *
     * @return string
     */
    public function getTransferType()
    {
        return $this->getKey('TransferType');
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
     * Returns key: 'TargetChannel'.
     *
     * @return string
     */
    public function getTargetChannel()
    {
        return $this->getKey('TargetChannel');
    }

    /**
     * Returns key: 'SIP-Callid'.
     *
     * @return string
     */
    public function getSipCallID()
    {
        return $this->getKey('SIP-Callid');
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
     * Returns key: 'TargetUniqueID'.
     *
     * @return string
     */
    public function getTargetUniqueID()
    {
        return $this->getKey('TargetUniqueid');
    }

    /**
     * Returns key: 'TransferExten'.
     *
     * @return string
     */
    public function getTransferExten()
    {
        return $this->getKey('TransferExten');
    }

    /**
     * Returns key: 'TransferContext'.
     *
     * @return string
     */
    public function getTransferContext()
    {
        return $this->getKey('TransferContext');
    }
}
