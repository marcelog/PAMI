<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Action;

/**
 * Originate action message.
 */
class OriginateAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Channel to call to
     */
    public function __construct($channel)
    {
        parent::__construct('Originate');

        $this->setKey('Channel', $channel);
    }

    /**
     * Sets Exten key.
     *
     * @param string $extension Extension to use (requires Context and Priority)
     */
    public function setExtension($extension)
    {
        $this->setKey('Exten', $extension);
    }

    /**
     * Sets Context key.
     *
     * @param string $context Context to use (requires Exten and Priority)
     */
    public function setContext($context)
    {
        $this->setKey('Context', $context);
    }

    /**
     * Sets Priority key.
     *
     * @param string $priority Priority to use (requires Exten and Context)
     */
    public function setPriority($priority)
    {
        $this->setKey('Priority', $priority);
    }

    /**
     * Sets Application key.
     *
     * @param string $application Application to execute
     */
    public function setApplication($application)
    {
        $this->setKey('Application', $application);
    }

    /**
     * Sets Data key.
     *
     * @param string $data Data to use (requires Application)
     */
    public function setData($data)
    {
        $this->setKey('Data', $data);
    }

    /**
     * Sets Timeout key.
     *
     * @param integer $timeout How long to wait for call to be answered (in ms)
     */
    public function setTimeout($timeout)
    {
        $this->setKey('Timeout', $timeout);
    }

    /**
     * Sets CallerID key.
     *
     * @param string $clid Caller ID to be set on the outgoing channel
     */
    public function setCallerId($clid)
    {
        $this->setKey('CallerID', $clid);
    }

    /**
     * Sets Account key.
     *
     * @param string Account code
     */
    public function setAccount($account)
    {
        $this->setKey('Account', $account);
    }

    /**
     * Sets Async key.
     *
     * @param Boolean $async Set to true for fast origination
     */
    public function setAsync($async)
    {
        $this->setKey('Async', $async ? 'true' : 'false');
    }

    /**
     * Sets Codecs key.
     *
     * @param array $codecs List of codecs to use for this call
     */
    public function setCodecs(array $codecs = array())
    {
        $this->setKey('Codecs', implode(',', $codecs));
    }
}
