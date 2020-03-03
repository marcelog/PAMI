PAMI\Message\Event\ParkedCallTimeOutEvent
===============

Event triggered when a channel leaves a parking lot due to reaching the time limit of being parked.

PHP Version 5


* Class name: ParkedCallTimeOutEvent
* Namespace: PAMI\Message\Event
* Parent class: [PAMI\Message\Event\EventMessage](PAMI-Message-Event-EventMessage.md)



Constants
----------


### EOL

    const EOL = "\r\n"





### EOM

    const EOM = "\r\n\r\n"





Properties
----------


### $rawContent

    protected string $rawContent

Holds original message.



* Visibility: **protected**


### $channelVariables

    protected array<mixed,string> $channelVariables

Metadata. Specific channel variables.



* Visibility: **protected**


### $lines

    protected array<mixed,string> $lines

Message content, line by line. This is what it gets sent
or received literally.



* Visibility: **protected**


### $variables

    protected array<mixed,string> $variables

Metadata. Message variables (key/value).



* Visibility: **protected**


### $keys

    protected array<mixed,string> $keys

Metadata. Message "keys" i.e: Action: login



* Visibility: **protected**


### $createdDate

    protected integer $createdDate

Created date (unix timestamp).



* Visibility: **protected**


Methods
-------


### getPrivilege

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getPrivilege()

Returns key: 'Privilege'.



* Visibility: **public**




### getParkeeChannel

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeChannel()

Returns key: 'ParkeeChannel'.



* Visibility: **public**




### getParkeeChannelState

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeChannelState()

Returns key: 'ParkeeChannelState'.



* Visibility: **public**




### getParkeeChannelStateDesc

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeChannelStateDesc()

Returns key: 'ParkeeChannelStateDesc'.



* Visibility: **public**




### getParkeeCallerIDNum

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeCallerIDNum()

Returns key: 'ParkeeCallerIDNum'.



* Visibility: **public**




### getParkeeCallerIDName

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeCallerIDName()

Returns key: 'ParkeeCallerIDName'.



* Visibility: **public**




### getParkeeConnectedLineNum

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeConnectedLineNum()

Returns key: 'ParkeeConnectedLineNum'.



* Visibility: **public**




### getParkeeConnectedLineName

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeConnectedLineName()

Returns key: 'ParkeeConnectedLineName'.



* Visibility: **public**




### getParkeeAccountCode

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeAccountCode()

Returns key: 'ParkeeAccountCode'.



* Visibility: **public**




### getParkeeContext

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeContext()

Returns key: 'ParkeeContext'.



* Visibility: **public**




### getParkeeExten

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeExten()

Returns key: 'ParkeeExten'.



* Visibility: **public**




### getParkeePriority

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeePriority()

Returns key: 'ParkeePriority'.



* Visibility: **public**




### getParkeeUniqueid

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkeeUniqueid()

Returns key: 'ParkeeUniqueid'.



* Visibility: **public**




### getParkerChannel

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerChannel()

Returns key: 'ParkerChannel'.



* Visibility: **public**




### getParkerChannelState

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerChannelState()

Returns key: 'ParkerChannelState'.



* Visibility: **public**




### getParkerChannelStateDesc

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerChannelStateDesc()

Returns key: 'ParkerChannelStateDesc'.



* Visibility: **public**




### getParkerCallerIDNum

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerCallerIDNum()

Returns key: 'ParkerCallerIDNum'.



* Visibility: **public**




### getParkerCallerIDName

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerCallerIDName()

Returns key: 'ParkerCallerIDName'.



* Visibility: **public**




### getParkerConnectedLineNum

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerConnectedLineNum()

Returns key: 'ParkerConnectedLineNum'.



* Visibility: **public**




### getParkerConnectedLineName

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerConnectedLineName()

Returns key: 'ParkerConnectedLineName'.



* Visibility: **public**




### getParkerAccountCode

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerAccountCode()

Returns key: 'ParkerAccountCode'.



* Visibility: **public**




### getParkerContext

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerContext()

Returns key: 'ParkerContext'.



* Visibility: **public**




### getParkerExten

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerExten()

Returns key: 'ParkerExten'.



* Visibility: **public**




### getParkerPriority

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerPriority()

Returns key: 'ParkerPriority'.



* Visibility: **public**




### getParkerUniqueid

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerUniqueid()

Returns key: 'ParkerUniqueid'.



* Visibility: **public**




### getParkerDialString

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkerDialString()

Returns key: 'ParkerDialString'.



* Visibility: **public**




### getParkinglot

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkinglot()

Returns key: 'Parkinglot'.



* Visibility: **public**




### getParkingSpace

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkingSpace()

Returns key: 'ParkingSpace'.



* Visibility: **public**




### getParkingTimeout

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkingTimeout()

Returns key: 'ParkingTimeout'.



* Visibility: **public**




### getParkingDuration

    string PAMI\Message\Event\ParkedCallTimeOutEvent::getParkingDuration()

Returns key: 'ParkingDuration'.



* Visibility: **public**




### getName

    string PAMI\Message\Event\EventMessage::getName()

Returns key 'Event'.



* Visibility: **public**
* This method is defined by [PAMI\Message\Event\EventMessage](PAMI-Message-Event-EventMessage.md)




### __sleep

    array<mixed,string> PAMI\Message\Message::__sleep()

Serialize function.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)




### getEventList

    string PAMI\Message\IncomingMessage::getEventList()

Returns key 'EventList'. In respones, this will surely be a "start". In
events, should be a "complete".



* Visibility: **public**
* This method is defined by [PAMI\Message\IncomingMessage](PAMI-Message-IncomingMessage.md)




### getRawContent

    string PAMI\Message\IncomingMessage::getRawContent()

Returns the original message content without parsing.



* Visibility: **public**
* This method is defined by [PAMI\Message\IncomingMessage](PAMI-Message-IncomingMessage.md)




### getAllChannelVariables

    array PAMI\Message\IncomingMessage::getAllChannelVariables()

Returns the channel variables for all reported channels.

https://github.com/marcelog/PAMI/issues/85

The channel names will be lowercased.

* Visibility: **public**
* This method is defined by [PAMI\Message\IncomingMessage](PAMI-Message-IncomingMessage.md)




### getChannelVariables

    array PAMI\Message\IncomingMessage::getChannelVariables(string $channel)

Returns the channel variables for the given channel.

https://github.com/marcelog/PAMI/issues/85

* Visibility: **public**
* This method is defined by [PAMI\Message\IncomingMessage](PAMI-Message-IncomingMessage.md)


#### Arguments
* $channel **string** - &lt;p&gt;Channel name. If not given, will return variables
for the &quot;current&quot; channel.&lt;/p&gt;



### __construct

    void PAMI\Message\Message::__construct()

Constructor.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)




### getCreatedDate

    integer PAMI\Message\Message::getCreatedDate()

Returns created date.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)




### setVariable

    void PAMI\Message\Message::setVariable(string $key, string $value)

Adds a variable to this message.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)


#### Arguments
* $key **string** - &lt;p&gt;Variable name.&lt;/p&gt;
* $value **string** - &lt;p&gt;Variable value.&lt;/p&gt;



### getVariable

    string PAMI\Message\Message::getVariable(string $key)

Returns a variable by name.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)


#### Arguments
* $key **string** - &lt;p&gt;Variable name.&lt;/p&gt;



### setKey

    void PAMI\Message\Message::setKey(string $key, string $value)

Adds a variable to this message.



* Visibility: **protected**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)


#### Arguments
* $key **string** - &lt;p&gt;Key name (i.e: Action).&lt;/p&gt;
* $value **string** - &lt;p&gt;Key value.&lt;/p&gt;



### getKey

    string PAMI\Message\Message::getKey(string $key)

Returns a key by name.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)


#### Arguments
* $key **string** - &lt;p&gt;Key name (i.e: Action).&lt;/p&gt;



### getKeys

    array<mixed,string> PAMI\Message\Message::getKeys()

Returns all keys for this message.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)




### getVariables

    array<mixed,string> PAMI\Message\Message::getVariables()

Returns all variabels for this message.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)




### finishMessage

    string PAMI\Message\Message::finishMessage($message)

Returns the end of message token appended to the end of a given message.



* Visibility: **protected**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)


#### Arguments
* $message **mixed**



### serializeVariable

    string PAMI\Message\Message::serializeVariable(string $key, string $value)

Returns the string representation for an ami action variable.



* Visibility: **private**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)


#### Arguments
* $key **string**
* $value **string**



### serialize

    string PAMI\Message\Message::serialize()

Gives a string representation for this message, ready to be sent to
ami.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)




### getActionID

    string PAMI\Message\Message::getActionID()

Returns key: 'ActionID'.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)



