PAMI\AsyncAgi\AsyncClientImpl
===============

An AGI client implementation.

PHP Version 5


* Class name: AsyncClientImpl
* Namespace: PAMI\AsyncAgi
* Parent class: PAGI\Client\AbstractClient
* This class implements: [PAMI\Listener\IEventListener](PAMI-Listener-IEventListener.md)




Properties
----------


### $pamiClient

    private \PAMI\Client\IClient $pamiClient

The pami client to be used.



* Visibility: **private**


### $asyncAgiEvent

    private \PAMI\Message\Event\AsyncAGIEvent $asyncAgiEvent

The event that originated this async agi request.



* Visibility: **private**


### $channel

    private string $channel

The channel that originated this async agi request.



* Visibility: **private**


### $listenerId

    private string $listenerId

The listener id after registering with the pami client.



* Visibility: **private**


### $lastCommandId

    private string $lastCommandId

Last CommandId issued, so we can track responses for agi commands.



* Visibility: **private**


### $lastAgiResult

    private string $lastAgiResult

Filled when an async agi event has been received, with command id equal
to the last command id sent.



* Visibility: **private**


Methods
-------


### handle

    void PAMI\Listener\IEventListener::handle(\PAMI\Message\Event\EventMessage $event)

Event handler.



* Visibility: **public**
* This method is defined by [PAMI\Listener\IEventListener](PAMI-Listener-IEventListener.md)


#### Arguments
* $event **[PAMI\Message\Event\EventMessage](PAMI-Message-Event-EventMessage.md)** - &lt;p&gt;The received event.&lt;/p&gt;



### send

    mixed PAMI\AsyncAgi\AsyncClientImpl::send($text)

(non-PHPdoc)



* Visibility: **protected**


#### Arguments
* $text **mixed**



### open

    mixed PAMI\AsyncAgi\AsyncClientImpl::open()

(non-PHPdoc)



* Visibility: **protected**




### close

    mixed PAMI\AsyncAgi\AsyncClientImpl::close()

(non-PHPdoc)



* Visibility: **protected**




### __construct

    void PAMI\AsyncAgi\AsyncClientImpl::__construct(array $options)

Constructor.

Note: The client accepts an array with options. The available options are

pamiClient => The PAMI client that will be used to run this async client.

environment => Environment as received by the AsyncAGI Event.

* Visibility: **public**


#### Arguments
* $options **array** - &lt;p&gt;Optional properties.&lt;/p&gt;


