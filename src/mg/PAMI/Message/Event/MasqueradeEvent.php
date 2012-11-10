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
 * Event triggered when an extension is masqued?
 */
class MasqueradeEvent extends EventMessage
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
     * Returns key: 'Clone'.
     *
     * @return string
     */
    public function getClone()
    {
        return $this->getKey('Clone');
    }

    /**
     * Returns key: 'CloneState'.
     *
     * @return string
     */
    public function getCloneState()
    {
        return $this->getKey('CloneState');
    }
    /**
     * Returns key: 'Original'.
     *
     * @return string
     */
    public function getOriginal()
    {
        return $this->getKey('Original');
    }

    /**
     * Returns key: 'OriginalState'.
     *
     * @return string
     */
    public function getOriginalState()
    {
        return $this->getKey('OriginalState');
    }
}
