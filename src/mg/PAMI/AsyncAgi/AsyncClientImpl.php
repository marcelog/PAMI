<?php
/**
 * An AsyncAGI client implementation.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  AsyncAgi
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
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
namespace PAMI\AsyncAgi;

use PAMI\Client\IClient as PamiClient;
use PAGI\Client\AbstractClient as PagiClient;
use PAMI\Listener\IEventListener;
use PAMI\Message\Event\EventMessage;
use PAGI\Client\Result\Result;

/**
 * An AGI client implementation.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  AsyncAgi
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
class AsyncClientImpl extends PagiClient implements IEventListener
{
    /**
     * Current instance.
     * @var AsyncClientImpl
     */
    private static $_instance = false;
    /**
     * The pami client to be used.
     * @var PAMI\Client\IClient
     */
    private $_pamiClient;
    /**
     * The event that originated this async agi request.
     * @var PAMI\Message\Event\AsyncAGIEvent
     */
    private $_asyncAgiEvent;
    /**
     * The channel that originated this async agi request.
     * @var string
     */
    private $_channel;
    /**
     * The listener id after registering with the pami client.
     * @var string
     */
    private $_listenerId;

    /**
     * Last CommandId issued, so we can track responses for agi commands.
     * @var string
     */
    private $_lastCommandId;

    /**
     * Filled when an async agi event has been received, with command id equal
     * to the last command id sent.
     * @var string
     */
    private $_lastAgiResult;

    /**
     * Handles pami events.
     *
     * @param EventMessage $event
     *
     * @return void
     */
    public function handle(EventMessage $event)
    {
        if ($event instanceof \PAMI\Message\Event\AsyncAGIEvent) {
            if ($event->getCommandId() == $this->_lastCommandId) {
                $this->_lastAgiResult = trim($event->getResult());
            }
        }
    }

    /**
     * (non-PHPdoc)
     * @see ClientImpl::send()
     */
    protected function send($text)
    {
        if ($this->_logger->isDebugEnabled()) {
            $this->_logger->debug('Sending: ' . $text);
        }
        $this->_lastCommandId = uniqid(__CLASS__);
        $action = new \PAMI\Message\Action\AGIAction($this->_channel, $text, $this->_lastCommandId);
        $this->_lastAgiResult = false;
        $this->_pamiClient->send($action);
        while($this->_lastAgiResult === false) {
            $this->_pamiClient->process();
            usleep(1000);
        }
        return $this->getResultFromResultString($this->_lastAgiResult);
    }

    /**
     * (non-PHPdoc)
     * @see ClientImpl::open()
     */
    protected function open()
    {
        $environment = $this->_asyncAgiEvent->getEnvironment();
        $this->_channel = $this->_asyncAgiEvent->getChannel();
        foreach (explode("\n", $environment) as $line) {
            if ($this->isEndOfEnvironmentVariables($line)) {
                break;
            }
            $this->readEnvironmentVariable($line);
        }
        $this->_listenerId = $this->_pamiClient->registerEventListener($this);
        if ($this->_logger->isDebugEnabled()) {
            $this->_logger->debug(print_r($this->_variables, true));
        }
    }

    /**
     * (non-PHPdoc)
     * @see ClientImpl::close()
     */
    protected function close()
    {
        $this->_pamiClient->unregisterEventListener($this->_listenerId);
    }

    /**
     * Constructor.
     *
     * Note: The client accepts an array with options. The available options are
     *
     * log4php.properties => Optional. If set, should contain the absolute
     * path to the log4php.properties file.
     *
     * pamiClient => The PAMI client that will be used to run this async client.
     *
     * environment => Environment as received by the AsyncAGI Event.
     *
     * @param array $options Optional properties.
     *
     * @return void
     */
    public function __construct(array $options = array())
    {
        $this->_options = $options;
        if (isset($options['log4php.properties'])) {
            \Logger::configure($options['log4php.properties']);
        }
        $this->_logger = \Logger::getLogger(__CLASS__);
        $this->_pamiClient = $options['pamiClient'];
        $this->_asyncAgiEvent = $options['asyncAgiEvent'];
        $this->open();
    }
}