<?php
/**
 * TCP Client implementation for AMI.
 *
 * PHP Version 5
 *
 * @category Ami
 * @package  Client
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://www.noneyet.ar/
 */
namespace AMI\Client\Impl;

use AMI\Message\Action\LoginAction;

use AMI\Message\OutgoingMessage;
use AMI\Message\Message;
use AMI\Message\IncomingMessage;
use AMI\Message\Response\ResponseMessage;
use AMI\Client\Exception\ClientException;
use AMI\Client\IClient;

/**
 * TCP Client implementation for AMI.
 *
 * PHP Version 5
 *
 * @category Ami
 * @package  Client
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @link     http://www.noneyet.ar/
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
	 * R/W timeout, in milliseconds.
	 * @var integer
	 */
	private $_rTimeout;
	private $_socket;
	private $_context;
	private $_eventListeners;
	private $_outgoingQueue;
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
		stream_set_timeout($this->_socket, 0, $this->_rTimeout * 1000);
	    $msg = new LoginAction($this->_user, $this->_pass);
	    $id = $this->getLine();
	    if (strstr($id, 'Asterisk Call Manager/') === false) {
	        throw new ClientException('Unknown peer. Is this an ami?');
	    }
	    $response = $this->send($msg);
	    if (!$response->isSuccess()) {
	        throw new ClientException('Could not connect: ' . $response->getMessage());
	    }
	}

	protected function getLine()
	{
        return stream_get_line($this->_socket, 1024, Message::EOL);
	}

	protected function getMessage()
	{
        return stream_get_line($this->_socket, 1024, Message::EOM);
	}
	
	public function process()
	{
	    $aMsg = $this->getMessage();
	    if ($aMsg == false) {
	        return;
	    }
	    $response = new ResponseMessage($aMsg);
	    $this->_incomingQueue[] = $response;
	}
	
	protected function getRelated(OutgoingMessage $message)
	{
	    $id = $message->getActionID('ActionID');
	    $result = false;
	    $total = count($this->_incomingQueue);
	    for ($i = 0; $i < $total; $i++) {
	        $candidate = $this->_incomingQueue[$i];
	        if ($candidate instanceof ResponseMessage) {
    	        if ($candidate->getActionID('ActionID') === $id) {
    	            $result = $candidate;
    	            unset($this->_incomingQueue[$i]);
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
	 * @throws ClientException
	 */
	protected function send(OutgoingMessage $message)
	{
	    
	    $length = strlen($message->serialize());
	    if (fwrite($this->_socket, $message->serialize()) < $length) {
    	    throw new ClientException('Could not send message');
	    }
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
	}
}
