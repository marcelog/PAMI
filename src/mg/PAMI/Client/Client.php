<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Client;

use PAMI\Message\OutgoingMessage;
use PAMI\Message\Message;
use PAMI\Message\IncomingMessage;
use PAMI\Message\Action\LoginAction;
use PAMI\Message\Response\ResponseMessage;
use PAMI\Message\Event\Factory\EventFactory;
use PAMI\Client\Exception\ClientException;

/**
 * TCP Client implementation for AMI.
 */
class Client implements ClientInterface
{
Client

    /**
     * Hostname
     *
     * @var string
     */
    private $host;

    /**
     * TCP Port
     *
     * @var integer
     */
    private $port;

    /**
     * Username
     *
     * @var string
     */
    private $user;

    /**
     * Password
     *
     * @var string
     */
    private $password;

    /**
     * Connection timeout, in seconds.
     *
     * @var integer
     */
    private $connectionTimeout;

    /**
     * Connection scheme, like tcp:// or tls://
     *
     * @var string
     */
    private $scheme;

    /**
     * Event factory.
     *
     * @var EventFactory
     */
    private $eventFactory;

    /**
     * R/W timeout, in milliseconds.
     *
     * @var integer
     */
    private $readWriteTimeout;

    /**
     * Our stream socket resource.
     *
     * @var resource
     */
    private $socket;

    /**
     * Our stream context resource.
     *
     * @var resource
     */
    private $context;

    /**
     * Our event listeners
     *
     * @var array
     */
    private $eventListeners;

    /**
     * The send queue.
     *
     * @var array
     */
    private $outgoingQueue;

    /**
     * The receiving queue.
     *
     * @var array
     */
    private $incomingQueue;

    /**
     * Our current received message. May be incomplete, will be completed
     * eventually with an EOM.
     *
     * @var string
     */
    private $currentProcessingMessage;

    /**
     * This should not happen. Asterisk may send responses without a
     * corresponding ActionId.
     *
     * @var string
     */
    private $lastActionId;

    /**
     * Constructor.
     *
     * @param array $options Options for ami client
     */
    public function __construct(array $options = array)
    {
        $this->host = $options['host'];
        $this->port = intval($options['port']);
        $this->user = $options['username'];
        $this->password = $options['secret'];
        $this->connectionTimeout = $options['connect_timeout'];
        $this->readWriteTimeout = $options['read_timeout'];
        $this->scheme = isset($options['scheme']) ? $options['scheme'] : 'tcp://';
        $this->eventListeners = array();
        $this->eventFactory = new EventFactory();
        $this->incomingQueue = array();
        $this->lastActionId = false;
    }

    /**
     * {@inheritdoc}
     */
    public function open()
    {
        $remoteSocker = sprintf('%s%s:%d', $this->scheme, $this->host, $this->port);

        $this->context = stream_context_create();

        $errno = 0;
        $errstr = null;

        $this->socket = @stream_socket_client(
            $remoteSocker, $errno, $errstr,
            $this->connectionTimeout, STREAM_CLIENT_CONNECT, $this->context
        );

        if ($this->socket === false) {
            throw new ClientException(sprintf('Error connecting to ami: %s', $errstr));
        }

        $loginAction = new LoginAction($this->user, $this->password);

        $id = @stream_get_line($this->socket, 1024, Message::EOL);

        if (strstr($id, 'Asterisk') === false) {
            throw new ClientException(sprintf('Unknown peer. Is this an ami?: %s', $id));
        }

        $response = $this->send($loginAction);
        if (!$response->isSuccess()) {
            throw new ClientException(sprintf('Could not connect: %s', $response->getMessage()));
        }

        @stream_set_blocking($this->socket, 0);

        $this->currentProcessingMessage = null;
    }

    /**
     * {@inheritdoc}
     */
    public function registerEventListener($listener, $predicate = null)
    {
        $id = uniqid('amiListener');

        $this->eventListeners[$id] = array($listener, $predicate);

        return $id;
    }

    /**
     * {@inheritdoc}
     */
    public function unregisterEventListener($id)
    {
        if (isset($this->eventListeners[$id])) {
            unset($this->eventListeners[$id]);
        }
    }

    /**
     * Reads a complete message over the stream until EOM.
     *
     * @return string
     */
    protected function getMessages()
    {
        $messages = array();

        // read something
        $read = @fread($this->socket, 65535);
        if ($read === false || @feof($this->socket)) {
            throw new ClientException('Error reading');
        }

        $this->currentProcessingMessage .= $read;

        // if we have a complete message, then return it. save the rest for later
        while (($pos = strpos($this->currentProcessingMessage, Message::EOM))) {
            $message = substr($this->currentProcessingMessage, 0, $pos);

            $this->currentProcessingMessage = substr($this->currentProcessingMessage, $pos + strlen(Message::EOM));

            $messages[] = $message;
        }

        return $messages;
    }

    /**
     * {@inheritdoc}
     */
    public function process()
    {
        $messages = $this->getMessages();

        foreach ($messages as $message) {
            $responsePos = strpos($message, 'Response:');
            $eventPos = strpos($message, 'Event:');

            if (($responsePos !== false) && (($responsePos < $eventPos) || $eventPos === false)) {
                $response = $this->messageToResponse($message);

                $this->incomingQueue[$response->getActionId()] = $response;
            } elseif ($eventPos !== false) {
                $event = $this->messageToEvent($message);

                $response = $this->findResponse($event);

                if ($response === false || $response->isComplete()) {
                    $this->dispatch($event);
                } else {
                    $response->addEvent($event);
                }
            } else {
                // broken ami.. sending a response with events without
                // Event and ActionId
                $message = sprintf("Event: ResponseEvent\r\nActionId: %s\r\n%s", $this->lastActionId, $message);

                $event = $this->messageToEvent($message);

                $response = $this->findResponse($event);
                $response->addEvent($event);
            }
        }
    }

    /**
     * Tries to find an associated response for the given message.
     *
     * @param IncomingMessage $message Message sent by asterisk
     *
     * @return \PAMI\Message\Response\ResponseMessage
     */
    protected function findResponse(IncomingMessage $message)
    {
        $actionId = $message->getActionId();

        if (isset($this->incomingQueue[$actionId])) {
            return $this->incomingQueue[$actionId];
        }

        return false;
    }

    /**
     * Dispatchs the incoming message to a handler.
     *
     * @param IncomingMessage $message Message to dispatch
     */
    protected function dispatch(IncomingMessage $message)
    {
        foreach ($this->eventListeners as $data) {
            $listener = $data[0];
            $predicate = $data[1];

            if ($predicate !== null && !$predicate($message)) {
                continue;
            }

            if ($listener instanceof \Closure) {
                $listener($message);
            } elseif (is_array($listener)) {
                $listener[0]->$listener[1]($message);
            } else {
                $listener->handle($message);
            }
        }
    }

    /**
     * Returns a ResponseMessage from a raw string that came from asterisk.
     *
     * @param string $message Raw string
     *
     * @return \PAMI\Message\Response\ResponseMessage
     */
    private function _messageToResponse($message)
    {
        $response = new ResponseMessage($message);

        $actionId = $response->getActionId();

        if ($actionId === null) {
            $actionId = $this->lastActionId;

            $response->setActionId($this->lastActionId);
        }

        return $response;
    }

    /**
     * Returns a EventMessage from a raw string that came from asterisk.
     *
     * @param string $message Raw string
     *
     * @return \PAMI\Message\Event\EventMessage
     */
    private function _messageToEvent($message)
    {
        return $this->eventFactory->createFromRaw($message);
    }

    /**
     * Returns a message (response) related to the given message. This uses
     * the ActionID tag (key).
     *
     * @todo not suitable for multithreaded applications
     *
     * @return \PAMI\Message\IncomingMessage
     */
    protected function getRelated(OutgoingMessage $message)
    {
        $id = $message->getActionID('ActionID');

        if (isset($this->incomingQueue[$id])) {
            $response = $this->incomingQueue[$id];

            if ($response->isComplete()) {
                unset($this->incomingQueue[$id]);

                return $response;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function send(OutgoingMessage $message)
    {
        $messageToSend = $message->serialize();

        $length = strlen($messageToSend);

        $this->lastActionId = $message->getActionId();

        if (@fwrite($this->socket, $messageToSend) < $length) {
            throw new ClientException('Could not send message');
        }

        $read = 0;
        while ($read <= $this->readWriteTimeout) {
            $this->process();

            $response = $this->getRelated($message);

            if ($response != false) {
                $this->lastActionId = false;

                return $response;
            }

            usleep(1000); // 1ms delay

            if ($this->readWriteTimeout > 0) {
                $read++;
            }
        }

        throw new ClientException('Read timeout');
    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
        @stream_socket_shutdown($this->socket, STREAM_SHUT_RDWR);
    }
}
