<?php
namespace PAMI\Message\Action;

/**
 * ConfbridgeUnLockAction action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Szabolcs Morvai <smorvai@arenim.com>
 */
class ConfbridgeUnLockAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $conference Conference on which to act.
     *
     * @return void
     */
    public function __construct($conference)
    {
        parent::__construct('ConfbridgeUnLock');
        $this->setKey('Conference', $conference);
    }
}
