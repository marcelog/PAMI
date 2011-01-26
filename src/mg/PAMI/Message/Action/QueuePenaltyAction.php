<?php
/**
 * QueuePenalty action message.
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
 * QueuePenalty action message.
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
class QueuePenaltyAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $queue Queue name.
     * @param string $event Event.
     *
     * @return void
     */
    public function __construct($interface, $penalty, $queue = false)
    {
        parent::__construct('QueuePenalty');
        $this->setKey('Interface', $interface);
        $this->setKey('Penalty', $penalty);
        if ($queue !== false) {
            $this->setKey('Queue', $queue);
        }
    }
}