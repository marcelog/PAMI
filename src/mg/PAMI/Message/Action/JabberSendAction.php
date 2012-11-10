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
 * JabberSend action message.
 */
class JabberSendAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $jabber  Client or transport Asterisk uses to connect to JABBER
     * @param string $jid     XMPP/Jabber JID (Name) of recipient
     * @param string $message Message to be sent to the buddy
     */
    public function __construct($jabber, $jid, $message)
    {
        parent::__construct('JabberSend');

        $this->setKey('Jabber', $jabber);
        $this->setKey('JID', $jid);
        $this->setKey('ScreenName', $jid);
        $this->setKey('Message', $message);
    }
}
