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

/**
 * Interface for an ami client.
 */
interface ClientInterface
{
    /**
     * Opens a tcp connection to ami.
     *
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function open();

    /**
     * Main processing loop. Also called from send(), you should call this in
     * your own application in order to continue reading events and responses
     * from ami.
     */
    public function process();

    /**
     * Registers the given listener so it can receive events. Returns the generated
     * id for this new listener. You can pass in a an IEventListener, a Closure,
     * and an array containing the object and name of the method to invoke. Can specify
     * an optional predicate to invoke before calling the callback.
     *
     * @param mixed    $listener
     * @param \Closure $predicate
     *
     * @return string
     */
    public function registerEventListener($listener, $predicate = null);

    /**
     * Unregisters an event listener.
     *
     * @param string $id The id returned by registerEventListener
     */
    public function unregisterEventListener($id);

    /**
     * Closes the connection to ami.
     */
    public function close();

    /**
     * Sends a message to ami.
     *
     * @param OutgoingMessage $message Message to send
     *
     * @return \PAMI\Message\Response\ResponseMessage
     *
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function send(OutgoingMessage $message);
}
