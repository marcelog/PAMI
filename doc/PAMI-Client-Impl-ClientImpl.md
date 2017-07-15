PAMI\Client\Impl\ClientImpl
===============

TCP Client implementation for AMI.

PHP Version 5


* Class name: ClientImpl
* Namespace: PAMI\Client\Impl
* This class implements: [PAMI\Client\IClient](PAMI-Client-IClient.md)




Properties
----------


### $logger

    private \PAMI\Client\Impl\Logger $logger

PSR-3 logger.



* Visibility: **private**


### $host

    private string $host

Hostname



* Visibility: **private**


### $port

    private integer $port

TCP Port.



* Visibility: **private**


### $user

    private string $user

Username



* Visibility: **private**


### $pass

    private string $pass

Password



* Visibility: **private**


### $cTimeout

    private integer $cTimeout

Connection timeout, in seconds.



* Visibility: **private**


### $scheme

    private string $scheme

Connection scheme, like tcp:// or tls://



* Visibility: **private**


### $eventFactory

    private \PAMI\Message\Event\Factory\Impl\EventFactoryImpl $eventFactory

Event factory.



* Visibility: **private**


### $rTimeout

    private integer $rTimeout

R/W timeout, in milliseconds.



* Visibility: **private**


### $socket

    private resource $socket

Our stream socket resource.



* Visibility: **private**


### $context

    private resource $context

Our stream context resource.



* Visibility: **private**


### $eventListeners

    private array<mixed,\PAMI\Listener\IEventListener> $eventListeners

Our event listeners



* Visibility: **private**


### $incomingQueue

    private array<mixed,\PAMI\Message\IncomingMessage> $incomingQueue

The receiving queue.



* Visibility: **private**


### $currentProcessingMessage

    private string $currentProcessingMessage

Our current received message. May be incomplete, will be completed
eventually with an EOM.



* Visibility: **private**


### $lastActionId

    private string $lastActionId

This should not happen. Asterisk may send responses without a
corresponding ActionId.



* Visibility: **private**


Methods
-------


### open

    void PAMI\Client\IClient::open()

Opens a tcp connection to ami.



* Visibility: **public**
* This method is defined by [PAMI\Client\IClient](PAMI-Client-IClient.md)




### registerEventListener

    string PAMI\Client\IClient::registerEventListener(mixed $listener, \PAMI\Client\Closure|null $predicate)

Registers the given listener so it can receive events. Returns the generated
id for this new listener. You can pass in a an IEventListener, a Closure,
and an array containing the object and name of the method to invoke. Can specify
an optional predicate to invoke before calling the callback.



* Visibility: **public**
* This method is defined by [PAMI\Client\IClient](PAMI-Client-IClient.md)


#### Arguments
* $listener **mixed**
* $predicate **PAMI\Client\Closure|null**



### unregisterEventListener

    void PAMI\Client\IClient::unregisterEventListener(string $listenerId)

Unregisters an event listener.



* Visibility: **public**
* This method is defined by [PAMI\Client\IClient](PAMI-Client-IClient.md)


#### Arguments
* $listenerId **string** - &lt;p&gt;The id returned by registerEventListener.&lt;/p&gt;



### getMessages

    array<mixed,\string> PAMI\Client\Impl\ClientImpl::getMessages()

Reads a complete message over the stream until EOM.



* Visibility: **protected**




### process

    void PAMI\Client\IClient::process()

Main processing loop. Also called from send(), you should call this in
your own application in order to continue reading events and responses
from ami.



* Visibility: **public**
* This method is defined by [PAMI\Client\IClient](PAMI-Client-IClient.md)




### findResponse

    \PAMI\Message\Response\ResponseMessage PAMI\Client\Impl\ClientImpl::findResponse(\PAMI\Message\IncomingMessage $message)

Tries to find an associated response for the given message.



* Visibility: **protected**


#### Arguments
* $message **[PAMI\Message\IncomingMessage](PAMI-Message-IncomingMessage.md)** - &lt;p&gt;Message sent by asterisk.&lt;/p&gt;



### dispatch

    void PAMI\Client\Impl\ClientImpl::dispatch(\PAMI\Message\IncomingMessage $message)

Dispatchs the incoming message to a handler.



* Visibility: **protected**


#### Arguments
* $message **[PAMI\Message\IncomingMessage](PAMI-Message-IncomingMessage.md)** - &lt;p&gt;Message to dispatch.&lt;/p&gt;



### messageToResponse

    \PAMI\Message\Response\ResponseMessage PAMI\Client\Impl\ClientImpl::messageToResponse(string $msg)

Returns a ResponseMessage from a raw string that came from asterisk.



* Visibility: **private**


#### Arguments
* $msg **string** - &lt;p&gt;Raw string.&lt;/p&gt;



### messageToEvent

    \PAMI\Message\Event\EventMessage PAMI\Client\Impl\ClientImpl::messageToEvent(string $msg)

Returns a EventMessage from a raw string that came from asterisk.



* Visibility: **private**


#### Arguments
* $msg **string** - &lt;p&gt;Raw string.&lt;/p&gt;



### getRelated

    \PAMI\Message\IncomingMessage PAMI\Client\Impl\ClientImpl::getRelated(\PAMI\Message\OutgoingMessage $message)

Returns a message (response) related to the given message. This uses
the ActionID tag (key).



* Visibility: **protected**


#### Arguments
* $message **[PAMI\Message\OutgoingMessage](PAMI-Message-OutgoingMessage.md)**



### send

    \PAMI\Message\Response\ResponseMessage PAMI\Client\IClient::send(\PAMI\Message\OutgoingMessage $message)

Sends a message to ami.



* Visibility: **public**
* This method is defined by [PAMI\Client\IClient](PAMI-Client-IClient.md)


#### Arguments
* $message **[PAMI\Message\OutgoingMessage](PAMI-Message-OutgoingMessage.md)** - &lt;p&gt;Message to send.&lt;/p&gt;



### close

    void PAMI\Client\IClient::close()

Closes the connection to ami.



* Visibility: **public**
* This method is defined by [PAMI\Client\IClient](PAMI-Client-IClient.md)




### setLogger

    void PAMI\Client\IClient::setLogger(\PAMI\Client\Psr\Log\LoggerInterface $logger)

Sets the logger implementation.



* Visibility: **public**
* This method is defined by [PAMI\Client\IClient](PAMI-Client-IClient.md)


#### Arguments
* $logger **PAMI\Client\Psr\Log\LoggerInterface** - &lt;p&gt;The PSR3-Logger&lt;/p&gt;



### __construct

    mixed PAMI\Client\Impl\ClientImpl::__construct(array<mixed,string> $options)

Constructor.



* Visibility: **public**


#### Arguments
* $options **array&lt;mixed,string&gt;** - &lt;p&gt;Options for ami client.&lt;/p&gt;


