<?php
/**
 * QueueReset action message.
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
 * QueueReset action message.
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
class QueueResetAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $queue Queue name.
     *
     * @return void
     */
    public function __construct($queue = false)
    {
        parent::__construct('QueueReset');
        if ($queue !== false) {
            $this->setKey('Queue', $queue);
        }
    }
}