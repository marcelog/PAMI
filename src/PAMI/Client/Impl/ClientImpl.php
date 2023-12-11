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

use PAMI\Stream\Stream;
use Psr\Log\NullLogger;
use PAMI\Client\IClient;
use PAMI\Message\Message;
use Psr\Log\LoggerInterface;
use PAMI\Message\OutgoingMessage;
use PAMI\Message\IncomingMessage;
use PAMI\Listener\IEventListener;
use PAMI\Message\Action\LoginAction;
use PAMI\Message\Event\EventMessage;
use PAMI\Message\Response\ResponseMessage;
use PAMI\Client\Exception\ClientException;
use PAMI\Message\Event\Factory\Impl\EventFactoryImpl;

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
     * PSR-3 logger.
     *
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * Hostname
     *
     * @var string
     */
    private string $host;

    /**
     * TCP Port.
     *
     * @var integer
     */
    private int $port;

    /**
     * Username
     *
     * @var string
     */
    private string $user;

    /**
     * Password
     *
     * @var string
     */
    private string $pass;

    /**
     * Connection timeout, in seconds.
     *
     * @var integer
     */
    private int $cTimeout;

    /**
     * Connection scheme, like tcp:// or tls://
     *
     * @var string
     */
    private string $scheme;

    /**
     * Event factory.
     *
     * @var EventFactoryImpl
     */
    private EventFactoryImpl $eventFactory;

    /**
     * R/W timeout, in milliseconds.
     *
     * @var integer
     */
    private int $rTimeout;

    /**
     * Our stream socket resource.
     *
     * @var \PAMI\Stream\Stream
     */
    private Stream $stream;

    /**
     * Our event listeners
     *
     * @var array<string,array<int,callable|IEventListener|null>>
     */
    private array $eventListeners;

    /**
     * The receiving queue.
     *
     * @var array<string,ResponseMessage>
     */
    private array $incomingQueue;

    /**
     * Our current received message. May be incomplete, will be completed
     * eventually with an EOM.
     *
     * @var string
     */
    private string $currentProcessingMessage = '';

    /**
     * This should not happen. Asterisk may send responses without a
     * corresponding ActionId.
     *
     * @var string
     */
    private string $lastActionId;

    /**
     * Event mask to apply on login action.
     *
     * @var string|null
     */
    private ?string $eventMask;

    /**
     * Constructor.
     *
     * @param string[] $options Options for ami client.
     *
     */
    public function __construct(array $options)
    {
        $this->logger         = new NullLogger;
        $this->host           = $options['host'] ?? '';
        $this->port           = (int)$options['port'];
        $this->user           = $options['username'] ?? '';
        $this->pass           = $options['secret'] ?? '';
        $this->cTimeout       = intval($options['connect_timeout'] ?? 60);
        $this->rTimeout       = intval($options['read_timeout'] ?? 60);
        $this->scheme         = $options['scheme'] ?? 'tcp://';
        $this->eventMask      = $options['event_mask'] ?? null;
        $this->eventListeners = [];
        $this->eventFactory   = new EventFactoryImpl();
        $this->incomingQueue  = [];
        $this->lastActionId   = "";
    }

    /**
     * Opens a tcp connection to ami.
     *
     * @return void
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function open(): void
    {
        $cString = $this->scheme . $this->host . ':' . $this->port;

        $this->stream = $this->makeStream($cString, $this->cTimeout);

        if (!$this->stream->isConnected()) {
            throw new ClientException(sprintf(
                'Error connecting to ami: (%d) %s',
                $this->stream->getErrorCode(),
                $this->stream->getErrorMessage()
            ));
        }

        $msg = new LoginAction($this->user, $this->pass, $this->eventMask);

        $asteriskId = $this->stream->getLine();
        if (!$asteriskId || !str_contains($asteriskId, 'Asterisk')) {
            throw new ClientException(
                "Unknown peer. Is this an ami?: $asteriskId"
            );
        }

        $response = $this->send($msg);
        if (!$response->isSuccess()) {
            throw new ClientException(
                'Could not connect: ' . $response->getMessage()
            );
        }
        $this->stream->setBlocking(false);

        $this->currentProcessingMessage = '';
        $this->logger->debug('Logged in successfully to ami.');
    }

    protected function makeStream(string $address, int $timeout = null): Stream
    {
        return new Stream($address, $this->cTimeout);
    }

    /**
     * Registers the given listener so it can receive events. Returns the generated
     * id for this new listener. You can pass in an IEventListener, a Closure,
     * and an array containing the object and name of the method to invoke. Can specify
     * an optional predicate to invoke before calling the callback.
     *
     * @param callable|\PAMI\Listener\IEventListener $listener
     * @param callable|null                          $predicate
     *
     * @return string
     */
    public function registerEventListener(callable|IEventListener $listener, ?callable $predicate = null): string
    {
        $listenerId = uniqid('PamiListener');

        $this->eventListeners[$listenerId] = [$listener, $predicate];

        return $listenerId;
    }

    /**
     * Unregisters an event listener.
     *
     * @param string $listenerId The id returned by registerEventListener.
     *
     * @return void
     */
    public function unregisterEventListener(string $listenerId): void
    {
        if (isset($this->eventListeners[$listenerId])) {
            unset($this->eventListeners[$listenerId]);
        }
    }

    /**
     * Reads a complete message over the stream until EOM.
     *
     * @return array<int,string>
     * @throws ClientException
     */
    protected function getMessages(): array
    {
        static $i = 0;

        $i++;
        $messages = [];

        // Read something.
        $read = $this->stream->read();

        if ($read === false || $this->stream->endOfFile()) {
            throw new ClientException('Error reading!');
        }

        $this->currentProcessingMessage .= $read;

        // If we have a complete message, then return it. Save the rest for
        // later.
        while (($marker = strpos($this->currentProcessingMessage, Message::EOM))) {
            $msg        = substr($this->currentProcessingMessage, 0, $marker);
            $this->currentProcessingMessage = substr(
                $this->currentProcessingMessage,
                $marker + strlen(Message::EOM)
            );
            $messages[] = $msg;
        }

        return $messages;
    }

    /**
     * Main processing loop. Also called from send(), you should call this in
     * your own application in order to continue reading events and responses
     * from ami.
     *
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function process(): void
    {
        $messages = $this->getMessages();

        foreach ($messages as $message) {
            $this->logger->debug(
                '------ Received: ------ ' . "\n" . $message . "\n\n"
            );
            $resPos = strpos($message, 'Response:');
            $evePos = strpos($message, 'Event:');
            if (($resPos !== false) &&
                (($resPos < $evePos) || $evePos === false)
            ) {
                $response = $this->messageToResponse($message);

                $this->incomingQueue[$response->getActionId()] = $response;
            } elseif ($evePos !== false) {
                $event = $this->messageToEvent($message);
                $response = $this->findResponse($event);
                if ($response === null || $response->isComplete()) {
                    $this->dispatch($event);
                } else {
                    $response->addEvent($event);
                }
            } else {
                // broken ami... sending a response with events without
                // Event and ActionId
                $bMsg = 'Event: ResponseEvent' . "\r\n";
                $bMsg .= 'ActionId: ' . $this->lastActionId . "\r\n" . $message;
                $event = $this->messageToEvent($bMsg);
                $response = $this->findResponse($event);

                if ($response) {
                    $response->addEvent($event);
                } else {
                    $this->logger->debug('Unable to find an associated response for the given message.');
                }
            }
            $this->logger->debug('----------------');
        }
    }

    /**
     * Tries to find an associated response for the given message.
     *
     * @param IncomingMessage $message Message sent by asterisk.
     *
     * @return \PAMI\Message\Response\ResponseMessage|null
     */
    protected function findResponse(IncomingMessage $message): ?ResponseMessage
    {
        $actionId = $message->getActionId();
        if (isset($this->incomingQueue[$actionId])) {
            return $this->incomingQueue[$actionId];
        }

        return null;
    }

    /**
     * Dispatches the incoming message to a handler.
     *
     * @param \PAMI\Message\Event\EventMessage $message Message to dispatch.
     *
     * @return void
     */
    protected function dispatch(EventMessage $message): void
    {
        foreach ($this->eventListeners as $data) {
            $listener = $data[0];
            $predicate = $data[1];
            if (is_callable($predicate) && !call_user_func($predicate, $message)) {
                continue;
            }
            if (is_callable($listener)) {
                call_user_func($listener, $message);
            } elseif ($listener instanceof IEventListener) {
                $listener->handle($message);
            }
        }
    }

    /**
     * Returns a ResponseMessage from a raw string that came from asterisk.
     *
     * @param string $msg Raw string.
     *
     * @return \PAMI\Message\Response\ResponseMessage
     */
    private function messageToResponse(string $msg): ResponseMessage
    {
        $response = new ResponseMessage($msg);
        $actionId = $response->getActionId();
        if (empty($actionId)) {
            $response->setActionId($this->lastActionId);
        }

        return $response;
    }

    /**
     * Returns a EventMessage from a raw string that came from asterisk.
     *
     * @param string $msg Raw string.
     *
     * @return \PAMI\Message\Event\EventMessage
     */
    private function messageToEvent(string $msg): EventMessage
    {
        return $this->eventFactory->createFromRaw($msg);
    }

    /**
     * Returns a message (response) related to the given message. This uses
     * the ActionID tag (key).
     *
     * @param \PAMI\Message\OutgoingMessage $message
     *
     * @return false|\PAMI\Message\Response\ResponseMessage
     * @todo not suitable for multi-threaded applications.
     */
    protected function getRelated(OutgoingMessage $message): false|ResponseMessage
    {
        $ret = false;
        $id = $message->getActionID();

        if (isset($this->incomingQueue[$id])) {
            $response = $this->incomingQueue[$id];
            if ($response->isComplete()) {
                unset($this->incomingQueue[$id]);
                $ret = $response;
            }
        }

        return $ret;
    }

    /**
     * Sends a message to ami.
     *
     * @param \PAMI\Message\OutgoingMessage $message Message to send.
     *
     * @return \PAMI\Message\Response\ResponseMessage
     * @throws \PAMI\Client\Exception\ClientException
     * @see ClientImpl::send()
     */
    public function send(OutgoingMessage $message): ResponseMessage
    {
        $messageToSend = $message->serialize();
        $length = strlen($messageToSend);
        $this->logger->debug(
            '------ Sending: ------ ' . "\n" . $messageToSend . '----------'
        );
        $this->lastActionId = $message->getActionId();
        if ($this->stream->write($messageToSend) < $length) {
            throw new ClientException('Could not send message: ' . $messageToSend);
        }
        $read = 0;
        while ($read <= $this->rTimeout) {
            $this->process();
            $response = $this->getRelated($message);
            if ($response) {
                $this->lastActionId = "";

                return $response;
            }
            usleep(1000); // 1ms delay
            if ($this->rTimeout > 0) {
                $read++;
            }
        }
        throw new ClientException('Read timeout. Buffer: "' . $this->currentProcessingMessage . '"');
    }

    /**
     * Closes the connection to ami.
     *
     * @return void
     */
    public function close(): void
    {
        $this->logger->debug('Closing connection to asterisk.');
        $this->stream->close();
    }

    /**
     * Sets the logger implementation.
     *
     * @param LoggerInterface $logger The PSR3-Logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}
