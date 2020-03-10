<?php
namespace PAMI\Message\Action;

class ConfbridgeLockAction extends ActionMessage
{
    /**
     * @param string $conference
     */
    public function __construct($conference)
    {
        parent::__construct('ConfbridgeLock');
        $this->setKey('Conference', $conference);
    }
}
