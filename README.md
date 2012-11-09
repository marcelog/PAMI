PAMI
====

PAMI is a PHP client for AMI: [Asterisk Manager Interface](http://www.asteriskdocs.org/en/3rd_Edition/asterisk-book-html-chunk/asterisk-AMI.html). [Asterisk](http://www.digium.com/) is one of the hot topics in the IT world
due to its broad acceptance and use case scenarios.

The AMI interface to control and monitor your asterisk box(es) in a pretty easy way. Also, it supports [Asynchronous AGI](http://www.moythreads.com/wordpress/2007/12/24/asterisk-asynchronous-agi/),
so its even suitable to create a complete IVR solution.

With PAMI you receive [events](http://www.voip-info.org/wiki/view/asterisk+manager+events), and send [actions](http://www.voip-info.org/wiki/view/Asterisk+manager+API). Each action is a command (for example, issue a dial or hangup an
ongoing call). The events, on the other hand, are issued by asterisk whenever something interesting occurs in the
system.

You will send the actions through the PAMI client. This is a synchronous operation, the process will block until
the response has arrived. To get the events, just register an event listener (more on this after the installation
instructions).

Installation
============

The recommended way to install PAMI is [through composer](http://getcomposer.org). Just create a `composer.json` file and
run the `php composer.phar install` command to install it:

```json
{
    "minimum-stability": "dev",
    "require": {
        "marcelog/pami": "dev-master"
    }
}
```

Alternatively, you can download the [PAMI build](http://ci.marcelog.name:8080/job/PAMI/lastSuccessfulBuild/) file and extract it.

Usage
=====

In your [manager.conf](http://www.asteriskguru.com/tutorials/manager_conf.html) file, create a user with permissions to access AMI. In the following example,
the user admin, has ALL permissions granted (beware!). This is the username that we are going to
use from PAMI:

```ini
[admin]
secret = mysecret
deny=0.0.0.0/0.0.0.0
permit=127.0.0.1/255.255.255.0
read = system,call,log,verbose,agent,user,config,dtmf,reporting,cdr,dialplan
write = system,call,agent,log,verbose,user,config,command,reporting,originate
```

Connecting to AMI
-----------------

Working with PAMI is pretty straightforward. You need to get an instance of an ClientInterface implementation.
Currently, the only implementation is Client. A client will let you do this:

- Open the connection to Asterisk AMI
- Close the connection to Asterisk AMI
- Register an event listener
- Unregister an event listener

In order to get the client instance and open the connection, you need to provide the connection options through
an array:

```php
<?php

use PAMI\Client\Client;

/* These are (in order) the options we can pass to PAMI client:
 *
 * The hostname or ip address where Asterisk AMI is listening
 * The scheme can be tcp:// or tls://
 * The port where Asterisk AMI is listening
 * Username configured in manager.conf
 * Password configured for the above user
 * Connection timeout in milliseconds
 * Read timeout in milliseconds
 */
$options = array(
    'host' => '127.0.0.1',
    'scheme' => 'tcp://',
    'port' => 9999,
    'username' => 'admin',
    'secret' => 'mysecret',
    'connect_timeout' => 10000,
    'read_timeout' => 10000
);

$client = new Client($options);

// Open the connection
$client->open();

// Close the connection
$client->close();
```

Easy, isn't it?

Listening for events
--------------------

In order to get events, you need to register an event listener. There are 3 possible ways to register an event
listener, all of them using the registerEventListener() method of the ClientInterface implementation, and your
listener will receive EventMessage objects.

You can have as many listeners as you want, and mix them however you need.

**Register a [`Closure`](http://us.php.net/closure)**

```php
<?php

use PAMI\Message\Event\EventMessage;

$client->registerEventListener(function (EventMessage $event) {
    var_dump($event);
});
```

**Register a specific method of an object**

```php
<?php

use PAMI\Message\Event\EventMessage;

class MyListener
{
    public function handlerMethod(EventMessage $event)
    {
        var_dump($event);
    }
}

$listener = new MyListener();

$client->registerEventListener(array(
    $listener, 'handlerMethod'
));
```

**Register an object, that implements EventListenerInterface**

```php
<?php

use PAMI\Message\Event\EventMessage;
use PAMI\Listener\EventListenerInterface;

class MyOtherListener implements EventListenerInterface
{
    public function handle(EventMessage $event)
    {
        var_dump($event);
    }
}

$listener = new MyOtherListener();

$client->registerEventListener($listener);
```

In order for the PAMI to receive the events, you need to periodically call the process() method, like:

```php
<?php

$running = true;

while($running) {
    $client->process();

    usleep(1000);
}
```

If you don't like having a main loop like that, try using [`register_tick_function()`](http://us.php.net/register_tick_function) instead:

```php
<?php

register_tick_function(array($client, 'process'));
```

This will require to use [`declare(ticks=1)`](http://us.php.net/declare) at the top of your source file.

Putting it all together
-----------------------

```php
<?php

use PAMI\Client\Client;
use PAMI\Message\Event\EventMessage;
use PAMI\Listener\EventListenerInterface;

$options = array(
    'host' => '127.0.0.1',
    'scheme' => 'tcp://',
    'port' => 9999,
    'username' => 'admin',
    'secret' => 'mysecret',
    'connect_timeout' => 10000,
    'read_timeout' => 10000
);

$client = new Client($options);

// Open the connection
$client->open();

$client->registerEventListener(function (EventMessage $event) {
    var_dump($event);
});

$running = true;

// Main loop
while($running) {
    $client->process();
    usleep(1000);
}

// Close the connection
$client->close();
```

Filtering incoming events
-------------------------

Up to now, we've only seen how to register event listeners. These listeners will receive **ALL** the events
that get to the PAMI. What happens if we only want some events, or there is some important condition to be
met before receiving the events? That's where predicates come to the rescue. When registering an event listener,
an optional closure can be passed as argument that will be the predicate. If the predicate returns true, the
event will be dispatched. If the predicate returns false, the event wont get to the listener:

```php
<?php

use PAMI\Message\Event\DialEvent;

$client->registerEventListener(
    function (EventMessage $event) {
        var_dump($event);
    },
    function (EventMessage $event) {
        return
            $event instanceof DialEvent
            && $event->getSubEvent() == 'Begin'
        ;
    }
);
```

In this case, our predicate will only return true if and only if the event received is DialEvent, and the
sub-event type is a begin (i.e: an AGI application has issued a Dial() command). You can only add 1 predicate
(per listener, but you can have multiple listeners), but you can make it as complex as as you wish, and as
a result, your event listener will be a little cleaner.

Send actions
------------

You can also send actions to asterisk. An action is just an object of a given type. You can see all the
actions available here and the asterisk wiki with their official list of actions. Let's send a Reload action:

```php
<?php

use PAMI\Message\Action\ReloadAction;

$response = $client->send(new ReloadAction());
if ($response->isSuccess()) {
    echo "Ok!\n";
} else {
    echo "Failed!\n"
}
```

The result of the action sent, will come as a Response message.

Conclusion
==========

PAMI is simple and straightforward. I hope you have fun using it, just as I had when writing it! A component
like this can open a lot of new possibilities to your CLI and webapp applications.
