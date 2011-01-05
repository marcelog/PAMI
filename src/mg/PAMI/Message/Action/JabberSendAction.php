<?php
/**
 * JabberSend action message.
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
 * JabberSend action message.
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
class JabberSendAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $jabber  Client or transport Asterisk uses to connect to JABBER.
     * @param string $jid     XMPP/Jabber JID (Name) of recipient.
     * @param string $message Message to be sent to the buddy.
     *
     * @return void
     */
    public function __construct($jabber, $jid, $message)
    {
        parent::__construct('JabberSend');
        $this->setKey('Jabber', $jabber);
        $this->setKey('JID', $jid);
        $this->setKey('Message', $message);
    }
}