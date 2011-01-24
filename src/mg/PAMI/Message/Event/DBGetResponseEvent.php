<?php
/**
 * Event triggered when a database key is asked for.
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
 * Event triggered when a database key is asked for.
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
class DBGetResponseEvent extends EventMessage
{
    /**
     * Returns key: 'Family'.
     *
     * @return string
     */
    public function getFamily()
    {
        return $this->getKey('Family');
    }

    /**
     * Returns key: 'Key'.
     *
     * @return string
     */
    public function getKeyName()
    {
        return $this->getKey('Key');
    }

    /**
     * Returns key: 'Val'.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->getKey('Val');
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