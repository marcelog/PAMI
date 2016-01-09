PAMI\Client\IClient
===============

Interface for an ami client.

PHP Version 5


* Interface name: IClient
* Namespace: PAMI\Client
* This is an **interface**






Methods
-------


### open

    void PAMI\Client\IClient::open()

Opens a tcp connection to ami.



* Visibility: **public**




### process

    void PAMI\Client\IClient::process()

Main processing loop. Also called from send(), you should call this in
your own application in order to continue reading events and responses
from ami.



* Visibility: **public**




### registerEventListener

    string PAMI\Client\IClient::registerEventListener(mixed $listener, \PAMI\Client\Closure|null $predicate)

Registers the given listener so it can receive events. Returns the generated
id for this new listener. You can pass in a an IEventListener, a Closure,
and an array containing the object and name of the method to invoke. Can specify
an optional predicate to invoke before calling the callback.



* Visibility: **public**


#### Arguments
* $listener **mixed**
* $predicate **PAMI\Client\Closure|null**



### unregisterEventListener

    void PAMI\Client\IClient::unregisterEventListener(string $listenerId)

Unregisters an event listener.



* Visibility: **public**


#### Arguments
* $listenerId **string** - &lt;p&gt;The id returned by registerEventListener.&lt;/p&gt;



### close

    void PAMI\Client\IClient::close()

Closes the connection to ami.



* Visibility: **public**




### send

    \PAMI\Message\Response\ResponseMessage PAMI\Client\IClient::send(\PAMI\Message\OutgoingMessage $message)

Sends a message to ami.



* Visibility: **public**


#### Arguments
* $message **[PAMI\Message\OutgoingMessage](PAMI-Message-OutgoingMessage.md)** - &lt;p&gt;Message to send.&lt;/p&gt;



### setLogger

    void PAMI\Client\IClient::setLogger(\PAMI\Client\Psr\Log\LoggerInterface $logger)

Sets the logger implementation.



* Visibility: **public**


#### Arguments
* $logger **PAMI\Client\Psr\Log\LoggerInterface** - &lt;p&gt;The PSR3-Logger&lt;/p&gt;


