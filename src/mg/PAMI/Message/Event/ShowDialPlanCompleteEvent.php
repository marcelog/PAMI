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
 * Event triggered for the end of the list when an action ShowDialPlan is issued.
 */
class ShowDialPlanCompleteEvent extends EventMessage
{
    /**
     * Returns key: 'Privilege'.
     *
     * @return string
     */
    public function getPrivilege()
    {
        return $this->getKey('privilege');
    }

    /**
     * Returns key: 'ListItems'.
     *
     * @return string
     */
    public function getListItems()
    {
        return $this->getKey('listitems');
    }

    /**
     * Returns key: 'ListExtensions'.
     *
     * @return string
     */
    public function getListExtensions()
    {
        return $this->getKey('listextensions');
    }

    /**
     * Returns key: 'ListPriorities'.
     *
     * @return string
     */
    public function getListPriorities()
    {
        return $this->getKey('listpriorities');
    }

    /**
     * Returns key: 'ListContexts'.
     *
     * @return string
     */
    public function getListContexts()
    {
        return $this->getKey('listcontexts');
    }
}
