<?php
namespace PAMI\Message\Action;

class ConfbridgeKickAction extends ActionMessage
{
    /**
     * @param $channel
     */
    public function setChannel($channel)
    {
        $this->setKey('Channel', $channel);
    }

    /**
     * @param string $conference
     */
    public function __construct($conference)
    {
        parent::__construct('ConfbridgeKick');
        $this->setKey('Conference', $conference);
    }
}
