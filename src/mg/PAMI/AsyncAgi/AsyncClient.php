<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\AsyncAgi;

use PAGI\Client\AbstractClient;
use PAMI\Listener\EventListenerInterface;
use PAMI\Message\Action\AGIAction;
use PAMI\Message\Event\EventMessage;
use PAMI\Message\Event\AsyncAGIEvent

/**
 * An AGI client implementation.
 */
class AsyncClient extends AbstractClient implements EventListenerInterface
{
    /**
     * The ami client to be used.
     *
     * @var \PAMI\Client\ClientInterface
     */
    private $client;

    /**
     * The event that originated this async agi request.
     *
     * @var AsyncAGIEvent
     */
    private $asyncAgiEvent;

    /**
     * The channel that originated this async agi request.
     *
     * @var string
     */
    private $channel;

    /**
     * The listener id after registering with the ami client.
     *
     * @var string
     */
    private $listenerId;

    /**
     * Last CommandId issued, so we can track responses for agi commands.
     *
     * @var string
     */
    private $lastCommandId;

    /**
     * Filled when an async agi event has been received, with command id equal
     * to the last command id sent.
     *
     * @var string
     */
    private $lastAgiResult;

    /**
     * The singleton instance
     *
     * @var AsyncClient
     */
    private static $instance = null;

    /**
     * Returns the singleton instance
     *
     * @param array $options Configuration options
     *
     * @return AsyncClient
     */
    public static function getInstance(array $options = array())
    {
        if (null === self::$instance) {
            self::$instance = new self($options);
        }

        return self::$instance;
    }

    /**
     * Constructor.
     *
     * Note: The client accepts an array with options. The available options are
     *
     * client => The ami client that will be used to run this async client.
     *
     * environment => Environment as received by the AsyncAGI Event.
     *
     * @param array $options Optional properties
     */
    public function __construct(array $options = array())
    {
        $this->options = $options;
        $this->client = $options['client'];
        $this->asyncAgiEvent = $options['asyncAgiEvent'];
        $this->open();
    }

    /**
     * Handles ami events.
     *
     * @param EventMessage $event
     */
    public function handle(EventMessage $event)
    {
        if ($event instanceof AsyncAGIEvent) {
            if ($event->getCommandId() == $this->lastCommandId) {
                $this->lastAgiResult = trim($event->getResult());
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function send($text)
    {
        $this->lastCommandId = uniqid(__CLASS__);
        $action = new AGIAction($this->channel, $text, $this->lastCommandId);
        $this->lastAgiResult = false;
        $this->client->send($action);

        while ($this->lastAgiResult === false) {
            $this->client->process();
            usleep(1000);
        }

        return $this->getResultFromResultString($this->lastAgiResult);
    }

    /**
     * {@inheritdoc}
     */
    protected function open()
    {
        $environment = $this->asyncAgiEvent->getEnvironment();
        $this->channel = $this->asyncAgiEvent->getChannel();

        foreach (explode("\n", $environment) as $line) {
            if ($this->isEndOfEnvironmentVariables($line)) {
                break;
            }

            $this->readEnvironmentVariable($line);
        }

        $this->listenerId = $this->client->registerEventListener($this);
    }

    /**
     * {@inheritdoc}
     */
    protected function close()
    {
        $this->client->unregisterEventListener($this->listenerId);
    }
}
