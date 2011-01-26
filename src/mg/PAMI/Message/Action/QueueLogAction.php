<?php
/**
 * QueueLog action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Message\Action;

/**
 * QueueLog action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class QueueLogAction extends ActionMessage
{
    /**
     * Sets penalty. Key: 'UniqueId'.
     *
     * @param string $uniqueId Unique Id.
     *
     * @return void
     */
    public function setUniqueId($uniqueId)
    {
        $this->setKey('UniqueId', $uniqueId);
    }

    /**
     * Sets member name. Key: 'Interface'.
     *
     * @param string $interface Interface.
     *
     * @return void
     */
    public function setMemberName($interface)
    {
        $this->setKey('Interface', $interface);
    }


    /**
     * Sets paused. Key: 'Message'.
     *
     * @param string $message Message.
     *
     * @return void
     */
    public function setMessage($message)
    {
        $this->setKey('Message', $message);
    }

    /**
     * Constructor.
     *
     * @param string $queue Queue name.
     * @param string $event Event.
     *
     * @return void
     */
    public function __construct($queue, $event)
    {
        parent::__construct('QueueLog');
        $this->setKey('Event', $event);
        $this->setKey('Queue', $queue);
    }
}