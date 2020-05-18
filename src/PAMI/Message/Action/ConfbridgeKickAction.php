<?php
namespace PAMI\Message\Action;

/**
 * ConfbridgeKickAction action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Szabolcs Morvai <smorvai@arenim.com>
 */
class ConfbridgeKickAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Channel to be muted.
     * @param string $conference Conference on which to act.
     *
     * @return void
     */
    public function __construct($channel, $conference)
    {
        parent::__construct('ConfbridgeKick');
        $this->setKey('Channel', $channel);
        $this->setKey('Conference', $conference);
    }
}
