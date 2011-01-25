<?php
declare(ticks=1);
/**
 * TCP Client implementation for AMI.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Client
 * @subpackage Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Client\Impl;

use PAMI\Message\OutgoingMessage;
use PAMI\Message\Message;
use PAMI\Message\IncomingMessage;
use PAMI\Message\Action\LoginAction;
use PAMI\Message\Action\LogoffAction;
use PAMI\Message\Response\ResponseMessage;
use PAMI\Message\Event\EventMessage;
use PAMI\Message\Event\Factory\IEventFactory;
use PAMI\Message\Event\Factory\Impl\EventFactoryImpl;
use PAMI\Listener\IEventListener;
use PAMI\Client\Exception\ClientException;
use PAMI\Client\IClient;

/**
 * TCP Client implementation for AMI.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Client
 * @subpackage Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class ClientImpl implements IClient
{
    /**
     * Hostname
     * @var string
     */
	private $_host;

	/**
	 * TCP Port.
	 * @var integer
	 */
	private $_port;

	/**
     * Username
     * @var string
     */
	private $_user;

	/**
     * Password
     * @var string
     */
	private $_pass;

	/**
	 * Connection timeout, in seconds.
	 * @var integer
	 */
	private $_cTimeout;

	/**
	 * Event factory.
	 * @var IEventFactory
	 */
	private $_eventFactory;

	/**
	 * R/W timeout, in milliseconds.
	 * @var integer
	 */
	private $_rTimeout;

	/**
	 * Our stream socket resource.
	 * @var resource
	 */
	private $_socket;

	/**
	 * Our stream context resource.
	 * @var resource
	 */
	private $_context;

	/**
	 * Our event listeners
	 * @var IEventListener[]
	 */
	private $_eventListeners;

	/**
	 * The send queue
	 * @var OutgoingMessage[]
	 */
	private $_outgoingQueue;

	/**
	 * The receiving queue.
	 * @var IncomingMessage[]
	 */
	private $_incomingQueue;

	/**
	 * Our current received message. May be incomplete, will be completed
	 * eventually with an EOM.
	 * @var string
	 */
	private $_currentProcessingMessage;

	/**
	 * Last action Id sent. This is because sometimes asterisk do not send the
	 * Event: or Response: headers.
	 * @var string
	 */
	private $_lastActionId;

	/**
	 * Opens a tcp connection to ami.
	 *
	 * @throws ClientException
	 * @return void
	 */
	public function open()
	{
		$cString = 'tcp://' . $this->_host . ':' . $this->_port;
		$this->_context = stream_context_create();
		$this->_socket = stream_socket_client(
			$cString, $errno, $errstr,
			$this->_cTimeout, STREAM_CLIENT_CONNECT, $this->_context
		);
		if ($this->_socket === false) {
			throw new ClientException('Error connecting to ami: ' . $errstr);
		}
		//stream_set_timeout($this->_socket, 0, $this->_rTimeout * 1000);
	    $msg = new LoginAction($this->_user, $this->_pass);
	    $id = $this->getLine();
	    if (strstr($id, 'Asterisk') === false) {
	        throw new ClientException('Unknown peer. Is this an ami?: ' . $id);
	    }
	    $response = $this->send($msg);
	    if (!$response->isSuccess()) {
	        throw new ClientException('Could not connect: ' . $response->getMessage());
	    }
	    stream_set_blocking($this->_socket, 0);
	    $this->_currentProcessingMessage = '';
	    register_tick_function(array($this, 'process'));
	}

	/**
	 * Registers the given listener so it can receive events.
	 *
	 * @param IEventListener $listener
	 *
	 * @return void
	 */
	public function registerEventListener(IEventListener $listener)
	{
	    $this->_eventListeners[] = $listener;
	}

	/**
	 * Reads a line over the stream until EOL.
	 *
	 * @return string
	 */
	protected function getLine()
	{
        return stream_get_line($this->_socket, 1024, Message::EOL);
	}

	/**
	 * Reads a complete message over the stream until EOM.
	 *
	 * @return string
	 */
	protected function getMessage()
	{
	    // Read something.
	    $read = fread($this->_socket, 65535);
	    if ($read === false) {
	        return false;
	    }
	    // If we got something, add it to what we have read so far.
	    $this->_currentProcessingMessage .= $read;
	    // If we have a complete message, then return it. Save the rest for
	    // later.
	    $marker = strpos($this->_currentProcessingMessage, Message::EOM);
	    if($marker === false) {
	        return false;
	    }
	    $msg = substr($this->_currentProcessingMessage, 0, $marker);
	    $this->_currentProcessingMessage = substr(
	        $this->_currentProcessingMessage, $marker + strlen(Message::EOM)
	    );
	    return $msg;
	}

	/**
	 * Main processing loop. Also called from send(), you should call this in
	 * your own application in order to continue reading events and responses
	 * from ami. You may also declare(ticks=1) in your main source code.
	 *
	 * Taken from: http://www.voip-info.org/wiki/view/Asterisk+manager+API
	 *
	 * The type of a packet is determined by the existence of one of the
	 * following keys:
	 * Action: A packet sent by the connected client to Asterisk, requesting a
	 * particular Action be performed. There are a finite (but extendable) set
	 * of actions available to the client, determined by the modules presently
	 * loaded in the Asterisk engine. Only one action may be outstanding at a
	 * time. The Action packet contains the name of the operation to be
	 * performed as well as all required parameters.
	 * Response: the response sent by Asterisk to the last action sent by the
	 * client.
	 * Event: data pertaining to an event generated from within the Asterisk
	 * core or an extension module.
	 * Generally the client sends Action packets to the Asterisk server, the
	 * Asterisk server performs the requested operation and returns the result
	 * (often only success or failure) in a Response packet. As there is no
	 * guarantee regarding the order of Response packets the client usually
	 * includes an ActionID parameter in every Action packet that is sent back
	 * by Asterisk in the corresponding Response packet. That way the client
	 * can easily match Action and Response packets while sending Actions at
	 * any desired rate without having to wait for outstanding Response packets
	 * before sending the next action.
	 * Event packets are used in two different contexts: On the one hand they
	 * inform clients about state changes in Asterisk (like new channels being
	 * created and hung up or agents being logged in and out) on the other hand
	 * they are used to transport the response payload for actions that return
	 * a list of data (event generating actions). When a client sends an event
	 * generating action Asterisk sends a Response packed indicating success
	 * and containing a "Response: Follows" line. Then it sends zero or more
	 * events that contain the actual payload and finally an action complete
	 * event indicating that all data has been sent. The events sent in
	 * response to an event generating action and the action complete event
	 * contain the ActionID of the Action packet that triggered them, so you
	 * can easily match them the same way as Response packets. An example of an
	 * event generating action is the Status action that triggers Status events
	 * for each active channel. When all Status events have been sent a
	 * terminating a StatusComplete event is sent.
	 *
	 * @todo not suitable for multithreaded applications.
	 *
	 * @return void
	 */
	public function process()
	{
	    $aMsg = $this->getMessage();
	    if ($aMsg == false) {
	        return;
	    }
	    if (strstr($aMsg, 'Response:') !== false) {
	        $response = new ResponseMessage($aMsg);
	        $actionId = $response->getActionId();
            $this->_incomingQueue[$actionId] = $response;
	    } else if (strstr($aMsg, 'Event:') !== false) {
    	    $event = $this->_eventFactory->createFromRaw($aMsg);
    	    $actionId = $event->getActionId();
	        if (!isset($this->_incomingQueue[$actionId])) {
    	        foreach ($this->_eventListeners as $listener) {
   	                $listener->handle($event);
    	        }
	        } else {
	            $response = $this->_incomingQueue[$actionId];
	            $response->addEvent($event);
	        }
	    } else { // This should not happen. Bad asterisk, bad!
	        if ($this->_lastActionId !== false) {
    	        $response = new ResponseMessage($aMsg);
    	        $response->setActionId($this->_lastActionId);
    	        $actionId = $response->getActionId();
                $this->_incomingQueue[$actionId] = $response;
	        }
	    }
	}

	/**
	 * Returns a message (response) related to the given message. This uses
	 * the ActionID tag (key).
	 *
	 * @todo not suitable for multithreaded applications.
	 *
	 * @return IncomingMessage
	 */
	protected function getRelated(OutgoingMessage $message)
	{
	    $id = $message->getActionID('ActionID');
	    if (isset($this->_incomingQueue[$id])) {
	        $response = $this->_incomingQueue[$id];
	        if ($response->isComplete()) {
    	        unset($this->_incomingQueue[$id]);
	            return $response;
	        }
	    }
	    return false;
	}

	/**
	 * Sends a message to ami.
	 *
	 * @param OutgoingMessage $message Message to send.
	 *
	 * @see ClientImpl::send()
	 * @throws ClientException
	 * @return void
	 */
	public function send(OutgoingMessage $message)
	{
	    $length = strlen($message->serialize());
	    $this->_lastActionId = $message->getActionId();
	    if (fwrite($this->_socket, $message->serialize()) < $length) {
    	    throw new ClientException('Could not send message');
	    }
	    /**
	     * @todo this should not be an infinite loop. Check read timeout.
	     */
	    while(true) {
	        $this->process();
	        $response = $this->getRelated($message);
	        if ($response != false) {
	            $this->_lastActionId = false;
	            return $response;
	        }
	        usleep(1000); // 1ms delay
	    }
	}

	/**
	 * Receives a message from ami.
	 *
	 * @return IncomingMessage
	 */
	protected function read()
	{
	    return false;
	}

	/**
	 * Closes the connection to ami.
	 *
	 * @return void
	 */
	public function close()
	{
	    $this->send(new LogoffAction());
		stream_socket_shutdown($this->_socket, STREAM_SHUT_RDWR);
	}

	/**
	 * Constructor.
	 *
	 * @param string  $host     FQDN or IP address.
	 * @param integer $port     TCP Port.
	 * @param string  $user     Username.
	 * @param string  $pass     Password.
	 * @param integer $cTimeout In seconds. Max time to establish the connection.
	 * @param integer $rTimeout In milliseconds. Read and write timeout.
	 *
	 * @return void
	 */
	public function __construct($host, $port, $user, $pass, $cTimeout, $rTimeout)
	{
		$this->_host = $host;
		$this->_port = intval($port);
		$this->_user = $user;
		$this->_pass = $pass;
		$this->_cTimeout = $cTimeout;
		$this->_rTimeout = $rTimeout;
		$this->_eventListeners = array();
		$this->_eventFactory = new EventFactoryImpl();
		$this->_incomingQueue = array();
	}
}
