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
 * Whenever the registration status of a GSM module changes, a
 * vgsm_net_state event is generated. This event is available starting
 * from 0.21.0.
 */
class vgsm_net_stateEvent extends EventMessage
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
     * Returns key: 'X-vGSM-GSM-Registration'.
     *
     * @return string
     */
    public function getState()
    {
        return $this->getKey('X-vGSM-GSM-Registration');
    }
}
