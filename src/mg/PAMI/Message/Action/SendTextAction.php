<?php
/**
 * SendText action message.
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
 * SendText action message.
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
class SendTextAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Channel to send message to.
     * @param string $message Message to send.
     * 
     * @return void
     */
    public function __construct($channel, $message)
    {
        parent::__construct('SendText');
        $this->setKey('Channel', $channel);
        $this->setKey('Message', $message);
    }
}