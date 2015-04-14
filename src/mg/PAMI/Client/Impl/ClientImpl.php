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
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2011 Marcelo Gornstein <marcelog@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */
namespace PAMI\Client\Impl;

use PAMI\Message\OutgoingMessage;
use PAMI\Message\Message;
use PAMI\Message\IncomingMessage;
use PAMI\Message\Action\LoginAction;
use PAMI\Message\Action\LogoffAction;
use PAMI\Message\Response\ResponseMessage;
use PAMI\Message\Event\EventMessage;
use PAMI\Message\Event\Factory\Impl\EventFactoryImpl;
use PAMI\Message\Response\Factory\Impl\ResponseFactoryImpl;
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
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class ClientImpl implements IClient
{
    /**
     * log4php logger or dummy.
     * @var Logger
     */
    private $_logger;

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
	 * Connection scheme, like tcp:// or tls://
	 * @var string
	 */
	private $_scheme;

	/**
	 * Event factory.
	 * @var EventFactoryImpl
	 */
	private $_eventFactory;

	/**
	 * Event factory.
	 * @var EventFactoryImpl
	 */
	private $_responseFactory;

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
	 * This should not happen. Asterisk may send responses without a
	 * corresponding ActionId.
	 * @var string
	 */
	private $_lastActionId;

	/**
	 * @var string
	 */
	private $_lastRequestedResponseHandler;

	/**
	 * @object class
	 */
	private $_lastActionClass;

	/**
	 * Opens a tcp connection to ami.
	 *
	 * @throws PAMI\Client\Exception\ClientException
	 * @return void
	 */
	public function open()
	{
		$cString = $this->_scheme . $this->_host . ':' . $this->_port;
		$this->_context = stream_context_create();
		$errno = 0;
		$errstr = '';
		$this->_socket = @stream_socket_client(
			$cString, $errno, $errstr,
			$this->_cTimeout, STREAM_CLIENT_CONNECT, $this->_context
		);
		if ($this->_socket === false) {
			throw new ClientException('Error connecting to ami: ' . $errstr);
		}
	    $msg = new LoginAction($this->_user, $this->_pass);
	    $id = @stream_get_line($this->_socket, 1024, Message::EOL);
	    if (strstr($id, 'Asterisk') === false) {
	        throw new ClientException('Unknown peer. Is this an ami?: ' . $id);
	    }
	    $response = $this->send($msg);
	    if (!$response->isSuccess()) {
	        throw new ClientException('Could not connect: ' . $response->getMessage());
	    }
	    @stream_set_blocking($this->_socket, 0);
	    $this->_currentProcessingMessage = '';
	    //register_tick_function(array($this, 'process'));
	    if ($this->_logger->isDebugEnabled()) {
	        $this->_logger->debug('Logged in successfully to ami.');
	    }
	}

	/**
	 * Registers the given listener so it can receive events. Returns the generated
	 * id for this new listener. You can pass in a an IEventListener, a Closure,
	 * and an array containing the object and name of the method to invoke. Can specify
	 * an optional predicate to invoke before calling the callback.
	 *
	 * @param mixed $listener
	 * @param Closure|null $predicate
	 *
	 * @return string
	 */
	public function registerEventListener($listener, $predicate = null)
	{
	    $id = uniqid('PamiListener');
	    $this->_eventListeners[$id] = array($listener, $predicate);
	    return $id;
	}

	/**
	 * Unregisters an event listener.
	 *
	 * @param string $id The id returned by registerEventListener.
	 *
	 * @return void
	 */
	public function unregisterEventListener($id)
	{
	    if (isset($this->_eventListeners[$id])) {
	        unset($this->_eventListeners[$id]);
	    }
	}

	/**
	 * Reads a complete message over the stream until EOM.
	 *
	 * @return string
	 */
	protected function getMessages()
	{
	    $msgs = array();
	    // Read something.
	    $read = @fread($this->_socket, 65535);
	    if ($read === false || @feof($this->_socket)) {
	        throw new ClientException('Error reading');
	    }
	    $this->_currentProcessingMessage .= $read;
	    // If we have a complete message, then return it. Save the rest for
	    // later.
	    while (($marker = strpos($this->_currentProcessingMessage, Message::EOM))) {
    	    $msg = substr($this->_currentProcessingMessage, 0, $marker);
    	    $this->_currentProcessingMessage = substr(
    	        $this->_currentProcessingMessage, $marker + strlen(Message::EOM)
    	    );
    	    $msgs[] = $msg;
	    }
	    return $msgs;
	}

	/**
	 * Main processing loop. Also called from send(), you should call this in
	 * your own application in order to continue reading events and responses
	 * from ami. 
	 */
	public function process()
	{
	    $msgs = $this->getMessages();
	    foreach ($msgs as $aMsg) {
    	    if ($this->_logger->isDebugEnabled()) {
       	        $this->_logger->debug(
    	        	'------ Received: ------ ' . "\n" . $aMsg . "\n\n"
    	        );
    	    }
    	    $resPos = strpos($aMsg, 'Response:');
    	    $evePos = strpos($aMsg, 'Event:');
    	    if (($resPos !== false) && (($resPos < $evePos) || $evePos === false)) {
    	        $response = $this->_messageToResponse($aMsg);
                $this->_incomingQueue[$response->getActionId()] = $response;
    	    } else if ($evePos !== false) {
    	        $event = $this->_messageToEvent($aMsg);
        	    $response = $this->findResponse($event);
        	    if ($response === false || $response->isComplete()) {
                    $this->dispatch($event);
        	    } else {
        	        $response->addEvent($event);
        	    }
    	    } else {
    	    	// broken ami.. sending a response with events without
    	    	// Event and ActionId
                $bMsg = 'Event: ResponseEvent' . "\r\n";
                $bMsg .= 'ActionId: ' . $this->_lastActionId . "\r\n" . $aMsg;
                $event = $this->_messageToEvent($bMsg);
                $response = $this->findResponse($event);
                $response->addEvent($event);
    	    }
    	    if ($this->_logger->isDebugEnabled()) {
       	        $this->_logger->debug('----------------');
    	    }
	    }
	}

	/**
	 * Tries to find an associated response for the given message.
	 *
	 * @param IncomingMessage $message Message sent by asterisk.
	 *
	 * @return PAMI\Message\Response\ResponseMessage
	 */
	protected function findResponse(IncomingMessage $message)
	{
	    $actionId = $message->getActionId();
        if (isset($this->_incomingQueue[$actionId])) {
            return $this->_incomingQueue[$actionId];
        }
        return false;
	}

	/**
	 * Dispatchs the incoming message to a handler.
	 *
	 * @param PAMI\Message\IncomingMessage $message Message to dispatch.
	 *
	 * @return void
	 */
	protected function dispatch(IncomingMessage $message)
	{
        foreach ($this->_eventListeners as $data) {
            $listener = $data[0];
            $predicate = $data[1];
            if (is_callable($predicate) && !call_user_func($predicate, $message)) {
                continue;
            }
            if ($listener instanceof \Closure) {
                $listener($message);
            } else if (is_array($listener)) {
                $listener[0]->$listener[1]($message);
            } else {
                $listener->handle($message);
            }
        }
	}

	/**
	 * Returns a ResponseMessage from a raw string that came from asterisk.
	 *
	 * @param string $msg Raw string.
	 *
	 * @return PAMI\Message\Response\ResponseMessage
	 */
	private function _messageToResponse($msg)
	{
	    $response = $this->_responseFactory->createFromRaw($msg, $this->_lastActionClass, $this->_lastRequestedResponseHandler);
	    $actionId = $response->getActionId();
	    if ($actionId === null) {
	        $actionId = $this->_lastActionId;
	        $response->setActionId($this->_lastActionId);
	    }
	    return $response;
	}

	/**
	 * Returns a EventMessage from a raw string that came from asterisk.
	 *
	 * @param string $msg Raw string.
	 *
	 * @return PAMI\Message\Event\EventMessage
	 */
	private function _messageToEvent($msg)
	{
        return $this->_eventFactory->createFromRaw($msg);
	}

	/**
	 * Returns a message (response) related to the given message. This uses
	 * the ActionID tag (key).
	 *
	 * @todo not suitable for multithreaded applications.
	 *
	 * @return PAMI\Message\IncomingMessage
	 */
	protected function getRelated(OutgoingMessage $message)
	{
	    $ret = false;
	    $id = $message->getActionID('ActionID');
	    if (isset($this->_incomingQueue[$id])) {
	        $response = $this->_incomingQueue[$id];
	        if ($response->isComplete()) {
    	        unset($this->_incomingQueue[$id]);
	            $ret = $response;
	        }
	    }
	    return $ret;
	}

	/**
	 * Sends a message to ami.
	 *
	 * @param PAMI\Message\OutgoingMessage $message Message to send.
	 *
	 * @see ClientImpl::send()
	 * @throws PAMI\Client\Exception\ClientException
	 * @return PAMI\Message\Response\ResponseMessage
	 */
	public function send(OutgoingMessage $message)
	{
	    $messageToSend = $message->serialize();
	    $length = strlen($messageToSend);
	    if ($this->_logger->isDebugEnabled()) {
	        $this->_logger->debug(
	        	'------ Sending: ------ ' . "\n" . $messageToSend . '----------'
	        );
        }
        // If there are multiple outgoing messages in flight, we might have to add this information to a queue instead
        //$this->_outgoingQueue[$this->_lastActionId] == array('ResponseHandler' => $message->getResponseHandler()); // push
        $this->_lastActionId = $message->getActionId();
        $this->_lastRequestedResponseHandler = $message->getResponseHandler();
        $this->_lastActionClass = $message;

        if (@fwrite($this->_socket, $messageToSend) < $length) {
            throw new ClientException('Could not send message');
        }
        while (1) {
            stream_set_timeout($this->_socket, $this->_rTimeout ? $this->_rTimeout : 1);
            $this->process();
            $info = stream_get_meta_data($this->_socket);
            if ($info['timed_out'] == false) {
                $response = $this->getRelated($message);
                if ($response != false) {
                    $this->_lastActionId = false;
                    return $response;
                }
            } else {
                break;
            }
        }
        throw new ClientException("Read waittime: " . ($this->_rTimeout) . " exceeded (timeout).\n");
	}

	/**
	 * Closes the connection to ami.
	 *
	 * @return void
	 */
	public function close()
	{
	    if ($this->_logger->isDebugEnabled()) {
	        $this->_logger->debug('Closing connection to asterisk.');
	    }
		@stream_socket_shutdown($this->_socket, STREAM_SHUT_RDWR);
	}

	/**
	 * Constructor.
	 *
	 * @param string[] $options Options for ami client.
	 *
	 * @return void
	 */
	public function __construct(array $options)
	{
        if (isset($options['log4php.properties'])) {
            \Logger::configure($options['log4php.properties']);
        }
        $this->_logger = \Logger::getLogger('Pami.ClientImpl');
	    $this->_host = $options['host'];
		$this->_port = intval($options['port']);
		$this->_user = $options['username'];
		$this->_pass = $options['secret'];
		$this->_cTimeout = $options['connect_timeout'];
		$this->_rTimeout = $options['read_timeout'];
		$this->_scheme = isset($options['scheme']) ? $options['scheme'] : 'tcp://';
		$this->_eventListeners = array();
		$this->_eventFactory = new EventFactoryImpl(\Logger::getLogger('EventFactory'));
		$this->_responseFactory = new ResponseFactoryImpl(\Logger::getLogger('ResponseFactory'));
		$this->_incomingQueue = array();
		$this->_lastActionId = false;
	}
}
