<?php
/**
 * MailboxStatus action message.
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
 * MailboxStatus action message.
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
class MailboxStatusAction extends ActionMessage
{
    /**
     * Constructor.
     * 
     * @param string $mailbox MailboxId (mailbox@vm-context)
     *
     * @return void
     */
    public function __construct($mailbox)
    {
        parent::__construct('MailboxStatus');
        $this->setKey('Mailbox', $mailbox);
    }
}