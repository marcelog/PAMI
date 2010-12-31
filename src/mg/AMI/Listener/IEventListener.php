<?php
/**
 * Implement this interface in your own classes to make them event listeners.
 *
 * PHP Version 5
 *
 * @category   Ami
 * @package    Event
 * @subpackage Listener
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace AMI\Listener;

use AMI\Message\Event\EventMessage;

/**
 * Implement this interface in your own classes to make them event listeners.
 *
 * PHP Version 5
 *
 * @category   Ami
 * @package    Event
 * @subpackage Listener
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
interface IEventListener
{
    /**
     * Event handler.
     * 
     * @param EventMessage $event The received event.
     * 
     * @return void
     */
    public function handle(EventMessage $event);
}
