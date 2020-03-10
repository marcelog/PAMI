<?php
namespace PAMI\Message\Action;

class ConfbridgeUnlockAction extends ActionMessage
{
    /**
     * @param string $conference
     */
    public function __construct($conference)
    {
        parent::__construct('ConfbridgeUnlock');
        $this->setKey('Conference', $conference);
    }
}
