<?php
/**
 * MailboxCount action message.
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
 * MailboxCount action message.
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
class MailboxCountAction extends ActionMessage
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
        parent::__construct('MailboxCount');
        $this->setKey('Mailbox', $mailbox);
    }
}