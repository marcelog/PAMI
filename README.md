[![Build](https://github.com/level23/PAMI/actions/workflows/build.yml/badge.svg)](https://github.com/level23/PAMI/actions/workflows/build.yml)
[![License](https://poser.pugx.org/marcelog/PAMI/license)](https://packagist.org/packages/marcelog/PAMI)

# Introduction

PAMI means PHP Asterisk Manager Interface. As its name suggests its just a
set of php classes that will let you issue commands to an ami and/or receive
events, using an observer-listener pattern.

The idea behind this, is to easily implement operator consoles, monitors, etc.
either via SOA or ajax.

This package was forked and updated to the latest PHP standards. The original can be found here:
[https://github.com/marcelog/PAMI](https://github.com/marcelog/PAMI)

# Resources

 * [API](http://pami.readthedocs.org/en/latest/ApiIndex/)
 * [Complete PAGI/PAMI talk for the PHP Conference Argentina 2013](http://www.slideshare.net/mgornstein/phpconf-2013). Check the slide notes for the complete text :)

# PHP Versions

This PAMI requires PHP 8.2 or higher.

# Installing
Add this library to your [Composer](https://packagist.org/) configuration. In
composer.json:
```json
  "require": {
"level23/pami": "2.*"
  }
```

# QuickStart

For an in-depth tutorial: http://marcelog.github.com/articles/pami_introduction_tutorial_how_to_install.html

```php
// Make sure you include the composer autoload.
require __DIR__ . '/vendor/autoload.php';

$options = [
    'host' => '2.3.4.5',
    'scheme' => 'tcp://',
    'port' => 9999,
    'username' => 'asd',
    'secret' => 'asd',
    'connect_timeout' => 10,
    'read_timeout' => 10,
];
$client = new \PAMI\Client\Impl\ClientImpl($options);

// Registering a closure
$client->registerEventListener(function ($event) {
});

// Register a specific method of an object for event listening
$client->registerEventListener(array($listener, 'handle'));

// Register an IEventListener:
$client->registerEventListener($listener);
```

# Using Predicates
A second (optional) argument can be used when registering the event listener: a
closure that will be evaluated before calling the callback. The callback will
be called only if this predicate returns true:

```php
use PAMI\Message\Event\DialEvent;

$client->registerEventListener(
    array($listener, 'handleDialStart'),
    function ($event) {
        return $event instanceof DialEvent && $event->getSubEvent() == 'Begin';
    })
);
```

# Example

Please see docs/examples/quickstart/example.php for a very basic example.

AsterTrace is a full application: https://github.com/marcelog/AsterTrace.

Also, you might want to look at this article: http://marcelog.github.com/articles/php_asterisk_listener_example_using_pami_and_ding.html

For an example of using asynchronous AGI with PAMI, see docs/examples/asyncagi

The [march edition](http://sdjournal.org/a-practical-introduction-to-functional-programming-with-php-sdj-issue-released/) of [Software Developer Journal](http://sdjournal.org/) features a complete article about writing telephony applications with PAMI and PAGI.

# Currently Supported Events

More events will be added with time. I can only add the ones I can test for and
use, so your contributions may make the difference! ;)

Unknown (not yet implemented) events will be reported as UnknownEvent, so you
can still catch them. If you catch one of these, please report it!

* AgentsComplete
* AgentConnect
* Agentlogin
* Agentlogoff
* AGIExec
* AsyncAGI
* Bridge
* BridgeInfoChannel
* BridgeInfoComplete
* CEL
* ChannelUpdate
* ConfbridgeEnd
* ConfbridgeJoin
* ConfbridgeLeave
* ConfbridgeList
* ConfbridgeListComplete
* ConfbridgeMute
* ConfbridgeStart
* ConfbridgeTalking
* ConfbridgeUnmute
* CoreShowChannel
* CoreShowChannelComplete
* DAHDIShowChannel
* DAHDIShowChannelsComplete
* FullyBooted
* DongleSMSStatus
* DongleUSSDStatus
* DongleNewUSSD
* DongleNewUSSDBase64
* DongleNewCUSD
* DongleStatus
* DongleDeviceEntry
* DongleShowDevicesComplete
* DBGetResponse
* Dial
* DTMF
* Extension
* Hangup
* Hold
* JabberEvent
* Join
* Leave
* Link
* ListDialplan
* Masquerade
* MessageWaiting
* MusicOnHold
* NewAccountCode
* NewCallerid
* Newchannel
* Newexten
* Newstate
* OriginateResponse
* ParkedCall
* ParkedCallsComplete
* PeerEntry
* PeerlistComplete
* PeerStatus
* QueueMember
* QueueMemberAdded
* QueueMemberRemoved
* QueueMemberPause
* QueueMemberStatus
* QueueParams
* QueueStatusComplete
* QueueSummaryComplete
* RegistrationsComplete
* Registry
* Rename
* RTCPReceived
* RTCPReceiver
* RTCPSent
* RTPReceiverStat
* RTPSenderStat
* ShowDialPlanComplete
* Status
* StatusComplete
* Transfer
* Unlink
* UnParkedCall
* UserEvent
* VarSet
* vgsm_me_state
* vgsm_net_state
* vgsm_sms_rx
* VoicemailUserEntry
* VoicemailUserEntryComplete

# Currently Supported Actions

* AbsoluteTimeout
* AGI
* Agents
* AgentLogoff
* Atxfer (asterisk 1.8?)
* Bridge
* BridgeInfo
* ChangeMonitor
* Command
* ConfbridgeList
* ConfbridgeMute
* ConfbridgeUnmute
* CoreSettings
* CoreShowChannels
* CoreStatus
* DAHDIDialOffHookAction
* DAHDIHangup
* DAHDIRestart
* DAHDIShowChannels
* DAHDIDNDOn
* DAHDIDNDOff
* DBGet
* DBPut
* DBDel
* DBDelTree
* DongleSendSMS
* DongleSendUSSD
* DongleSendPDU
* DongleReload
* DongleStop
* DongleStart
* DongleRestart
* DongleReset
* DongleShowDevices
* ExtensionState
* CreateConfig
* GetConfig
* GetConfigJSON
* GetVar
* Hangup
* JabberSend
* LocalOptimizeAway
* Login
* Logoff
* ListCategories
* ListCommands
* MailboxCount
* MailboxStatus
* MeetmeList
* MeetmeMute
* MeetmeUnmute
* MixMonitor
* ModuleCheck
* ModuleLoad (split in ModuleLoad, ModuleUnload, and ModuleReload)
* Monitor
* Originate
* ParkedCalls
* PauseMonitor
* Ping
* PlayDTMF
* Queues
* QueueAdd
* Queue
* QueueLog
* QueuePause
* QueuePenalty
* QueueReload
* QueueRemove
* QueueReset
* QueueRule
* QueueSummary
* QueueStatus
* QueueUnpause
* Redirect
* Reload
* SendText
* SetVar
* ShowDialPlan
* Sipnotify
* Sippeers
* Sipqualifypeer
* Sipshowpeer
* Sipshowregistry
* Status
* StopMixMonitor
* StopMonitor
* UnpauseMonitor
* VGSM_SMS_TX
* VoicemailUsersList



## Debugging, logging

You can optionally set a [PSR-3](http://www.php-fig.org/psr/psr-3/) compatible logger:
```php
$pami->setLogger($logger);
```

By default, the client will use the [NullLogger](http://www.php-fig.org/psr/psr-3/#1-4-helper-classes-and-interfaces).

# Developers
This project uses [phing](https://www.phing.info/). Current tasks include:
 * test: Runs [PHPUnit](https://phpunit.de/).
 * cs: Runs [CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer).
 * doc: Runs [PhpDocumentor](http://www.phpdoc.org/).
 * md: runs [PHPMD](http://phpmd.org/).
 * build: This is the default task, and will run all the other tasks.

## Running a phing task
To run a task, just do:

```sh
vendor/bin/phing build
```

## Contributing
To contribute:
 * Make sure you open a **concise** and **short** pull request.
* Throw in any needed unit tests to accommodate the new code or the
 changes involved.
 * Run `phing` and make sure everything is ok before submitting the pull
 request (make phpmd and CodeSniffer happy, also make sure that phpDocumentor
 does not throw any warnings, since all our documentation is automatically
 generated).
 * Your code must comply with [PSR-2](http://www.php-fig.org/psr/psr-2/),
 CodeSniffer should take care of that.

LICENSE
=======
Copyright 2016 Marcelo Gornstein <marcelog@gmail.com>

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

# Thanks To

* Jason Blank <rumpled at github> for helping in the debugging of the queue
functionality and some other ami inconsistencies.

* Francesco Usseglio Gaudi, for help in debugging the Originate action.

* Matías Barletta, for the vgms support.

* Eli Hunter, for helping in bringing in tls compatibility.

* Freddy dafredmail at googlemail, for his help and testing environment to add
dongle support.

* Joshua Elson for his help in trying and debugging in loaded asterisk servers.

* Jacob Kiers for his help in bringing in and testing async agi functionality,
and CEL event
support.

* Richard Baar for noticing the lack of eof support when reading from socket,
the JabberEvent, and the ScreenName in JabberAction.

* Scot Opell for helping in debugging stream_get_line() in 5.3.9 and 5.3.10

* Brian (wormling) for trying and fixing bugs on asyncagi

* Henning Bragge for helping with newstate event and queues.

* mbonneau for ParkedCall and UnParkedCall events.
