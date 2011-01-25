<?php
/**
 * Event triggered for agents.
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
 * Event triggered for agents.
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
class AgentsEvent extends EventMessage
{
    /**
     * Returns key: 'Status'.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getKey('Status');
    }

    /**
     * Returns key: 'Agent'.
     *
     * @return string
     */
    public function getAgent()
    {
        return $this->getKey('Agent');
    }

    /**
     * Returns key: 'Name'.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getKey('Name');
    }

    /**
     * Returns key: 'LoggedInChan'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('LoggedInChan');
    }

    /**
     * Returns key: 'LoggedInTime'.
     *
     * @return integer
     */
    public function getLoggedInTime()
    {
        return $this->getKey('LoggedInTime');
    }

    /**
     * Returns key: 'TalkingTo'.
     *
     * @return integer
     */
    public function getTalkingTo()
    {
        return $this->getKey('TalkingTo');
    }

    /**
     * Returns key: 'TalkingToChannel'.
     *
     * @return integer
     */
    public function getTalkingToChannel()
    {
        return $this->getKey('TalkingToChannel');
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