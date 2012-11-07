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
 * Event triggered for the end of the list when an action Sippeers is issued.
 */
class PeerlistCompleteEvent extends EventMessage
{
    /**
     * Returns key: 'ListItems'.
     *
     * @return string
     */
    public function getListItems()
    {
        return $this->getKey('ListItems');
    }
}