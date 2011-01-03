<?php
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
        return stream_get_line($this->_socket, 1024, Message::EOM);
	}

	/**
	 * Main processing loop. Also called from send(), you should call this in
	 * your own application in order to continue reading events and responses
	 * from ami.
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
	        $this->_incomingQueue[] = $response;
	    } else {
	        foreach ($this->_eventListeners as $listener) {
	            $event = $this->_eventFactory->createFromRaw($aMsg);
	            $listener->handle($event);
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
	    $result = false;
	    //$total = count($this->_incomingQueue);
	    foreach ($this->_incomingQueue as $k => $candidate) {
	        //$candidate = $this->_incomingQueue[$i];
	        if ($candidate instanceof ResponseMessage) {
    	        if ($candidate->getActionID('ActionID') === $id) {
    	            $result = $candidate;
    	            unset($this->_incomingQueue[$k]);
    	        }
	        }
	    }
	    return $result;
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
	    if (fwrite($this->_socket, $message->serialize()) < $length) {
    	    throw new ClientException('Could not send message');
	    }
	    /**
	     * @todo this should not be an infinite loop. Check read timeout.
	     */
	    while(true) {
	        $this->process();
	        $response = $this->getRelated($message);
	        if (!empty($response)) {
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
