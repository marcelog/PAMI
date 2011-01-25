<?php
/**
 * Queue unpause action. This does not exist in the ami.
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
 * Queue unpause action. This does not exist in the ami.
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
class QueueUnpauseAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct($interface, $queue = false, $reason = false)
    {
        parent::__construct('QueuePause');
        if ($queue !== false) {
            $this->setKey('Queue', $queue);
        }
        if ($reason !== false) {
            $this->setKey('Reason', $reason);
        }
        $this->setKey('Interface', $interface);
        $this->setKey('Paused', 'false');
    }
}