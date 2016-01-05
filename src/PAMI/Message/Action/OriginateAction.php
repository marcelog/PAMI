<?php
/**
 * Originate action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
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
namespace PAMI\Message\Action;

/**
 * Originate action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class OriginateAction extends ActionMessage
{
    /**
     * Sets Exten key.
     *
     * @param string $extension Extension to use (requires Context and Priority).
     *
     * @return void
     */
    public function setExtension($extension)
    {
        $this->setKey('Exten', $extension);
    }

    /**
     * Sets Context key.
     *
     * @param string $context Context to use (requires Exten and Priority).
     *
     * @return void
     */
    public function setContext($context)
    {
        $this->setKey('Context', $context);
    }

    /**
     * Sets Priority key.
     *
     * @param string $priority Priority to use (requires Exten and Context).
     *
     * @return void
     */
    public function setPriority($priority)
    {
        $this->setKey('Priority', $priority);
    }

    /**
     * Sets Application key.
     *
     * @param string $application Application to execute.
     *
     * @return void
     */
    public function setApplication($application)
    {
        $this->setKey('Application', $application);
    }

    /**
     * Sets Data key.
     *
     * @param string $data Data to use (requires Application).
     *
     * @return void
     */
    public function setData($data)
    {
        $this->setKey('Data', $data);
    }

    /**
     * Sets Timeout key.
     *
     * @param integer $timeout How long to wait for call to be answered (in ms).
     *
     * @return void
     */
    public function setTimeout($timeout)
    {
        $this->setKey('Timeout', $timeout);
    }

    /**
     * Sets CallerID key.
     *
     * @param string $clid Caller ID to be set on the outgoing channel.
     *
     * @return void
     */
    public function setCallerId($clid)
    {
        $this->setKey('CallerID', $clid);
    }

    /**
     * Sets Account key.
     *
     * @param string Account code.
     *
     * @return void
     */
    public function setAccount($account)
    {
        $this->setKey('Account', $account);
    }

    /**
     * Sets Async key.
     *
     * @param boolean $async Set to true for fast origination.
     *
     * @return void
     */
    public function setAsync($async)
    {
        $this->setKey('Async', $async ? 'true' : 'false');
    }

    /**
     * Sets Codecs key.
     *
     * @param string[] $codecs List of codecs to use for this call.
     *
     * @return void
     */
    public function setCodecs(array $codecs)
    {
        $this->setKey('Codecs', implode(',', $codecs));
    }

    /**
     * Constructor.
     *
     * @param string $channel Channel to call to.
     *
     * @return void
     */
    public function __construct($channel)
    {
        parent::__construct('Originate');
        $this->setKey('Channel', $channel);
    }
}