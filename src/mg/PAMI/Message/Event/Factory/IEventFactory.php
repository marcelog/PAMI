<?php
/**
 * Interface for an event factory.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Event
 * @subpackage Factory.Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Event\Message\Factory;

/**
 * Interface for an event factory.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Event
 * @subpackage Factory.Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
interface IEventFactory
{
    /**
     * Factory method.
     *
     * @param string $message Original message as received from asterisk.
     * 
     * @return EventMessage
     */
    public static function createFromRaw($message);
}