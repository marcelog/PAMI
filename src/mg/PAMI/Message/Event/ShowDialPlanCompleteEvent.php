<?php
/**
 * Event triggered for the end of the list when an action ShowDialPlan is issued.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * Event triggered for the end of the list when an action ShowDialPlan is issued.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
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

    /**
     * Constructor.
     *
     * @param string $rawContent Literal message as received from ami.
     *
     * @return void
     */
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
    }
}