<?php
/**
 * Implement this interface in your own classes to make them event listeners.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Event
 * @subpackage Listener
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Listener;

use PAMI\Message\Event\EventMessage;

/**
 * Implement this interface in your own classes to make them event listeners.
 *
 * PHP Version 5
 *
 * @category   Pami
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
