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
 * Event triggered when an action DAHDIShowChannel is issued.
 */
class DAHDIShowChannelsEvent extends EventMessage
{
    /**
     * Returns key: 'DAHDIChannel'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }

    /**
     * Returns key: 'Signalling'.
     *
     * @return string
     */
    public function getSignalling()
    {
        return $this->getKey('Signalling');
    }

    /**
     * Returns key: 'SignallingCode'.
     *
     * @return string
     */
    public function getSignallingCode()
    {
        return $this->getKey('SignallingCode');
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
     * Returns key: 'DND'.
     *
     * @return string
     */
    public function getDND()
    {
        return $this->getKey('DND');
    }

    /**
     * Returns key: 'Alarm'.
     *
     * @return string
     */
    public function getAlarm()
    {
        return $this->getKey('Alarm');
    }
}
