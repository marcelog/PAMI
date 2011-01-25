<?php
/**
 * QueueRemove action message.
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
 * QueueRemove action message.
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
class QueueRemoveAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $queue     The queue.
     * @param string $interface The interface.
     *
     * @return void
     */
    public function __construct($queue, $interface)
    {
        parent::__construct('QueueRemove');
        $this->setKey('Queue', $queue);
        $this->setKey('Interface', $interface);
    }
}