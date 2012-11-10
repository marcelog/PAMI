<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Action;

/**
 * MailboxStatus action message.
 */
class MailboxStatusAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $mailbox MailboxId (mailbox@vm-context)
     */
    public function __construct($mailbox)
    {
        parent::__construct('MailboxStatus');

        $this->setKey('Mailbox', $mailbox);
    }
}
