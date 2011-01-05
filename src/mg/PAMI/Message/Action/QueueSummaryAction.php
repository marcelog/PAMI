<?php
/**
 * QueueSummary action message.
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
 * QueueSummary action message.
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
class QueueSummaryAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $queue The queue (optional).
     *
     * @return void
     */
    public function __construct($queue = false)
    {
        parent::__construct('QueueSummary');
        if ($queue != false) {
            $this->setKey('Queue', $queue);
        }
    }
}