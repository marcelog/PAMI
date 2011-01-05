<?php
/**
 * SIPNotify action message.
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
 * SIPNotify action message.
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
class SIPNotifyAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Peer to receive the notify.
     *
     * @return void
     */
    public function __construct($channel)
    {
        parent::__construct('SIPnotify');
        $this->setKey('Channel', $channel);
    }
}