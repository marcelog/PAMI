<?php
/**
 * Event triggered when an extension is masqued??
 *
 * PHP Version 5
 *
 * @category   Ami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace AMI\Message\Event;

use AMI\Message\Event\EventMessage;

/**
 * Event triggered when an extension is masqued??
 *
 * PHP Version 5
 *
 * @category   Ami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
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