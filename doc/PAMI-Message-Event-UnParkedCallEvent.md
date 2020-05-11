PAMI\Message\Event\UnParkedCallEvent
===============

Event triggered when a call is unparked.

PHP Version 5


* Class name: UnParkedCallEvent
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

    string PAMI\Message\Event\UnParkedCallEvent::getPrivilege()

Returns key: 'Privilege'.



* Visibility: **public**




### getParkinglot

    string PAMI\Message\Event\UnParkedCallEvent::getParkinglot()

Returns key: 'Parkinglot'.



* Visibility: **public**




### getFrom

    string PAMI\Message\Event\UnParkedCallEvent::getFrom()

Returns key: 'From'.



* Visibility: **public**




### getTimeout

    string PAMI\Message\Event\UnParkedCallEvent::getTimeout()

Returns key: 'Timeout'.



* Visibility: **public**




### getConnectedLineNum

    string PAMI\Message\Event\UnParkedCallEvent::getConnectedLineNum()

Returns key: 'ConnectedLineNum'.



* Visibility: **public**




### getConnectedLineName

    string PAMI\Message\Event\UnParkedCallEvent::getConnectedLineName()

Returns key: 'ConnectedLineName'.



* Visibility: **public**




### getChannel

    string PAMI\Message\Event\UnParkedCallEvent::getChannel()

Returns key: 'Channel'.



* Visibility: **public**




### getCallerIDNum

    string PAMI\Message\Event\UnParkedCallEvent::getCallerIDNum()

Returns key: 'CallerIDNum'.



* Visibility: **public**




### getCallerIDName

    string PAMI\Message\Event\UnParkedCallEvent::getCallerIDName()

Returns key: 'CallerIDName'.



* Visibility: **public**




### getUniqueID

    string PAMI\Message\Event\UnParkedCallEvent::getUniqueID()

Returns key: 'UniqueID'.



* Visibility: **public**




### getExtension

    string PAMI\Message\Event\UnParkedCallEvent::getExtension()

Returns key: 'Exten'.



* Visibility: **public**




### getParkeeChannel

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeChannel()

Returns key: 'ParkeeChannel'.



* Visibility: **public**




### getParkeeChannelState

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeChannelState()

Returns key: 'ParkeeChannelState'.



* Visibility: **public**




### getParkeeChannelStateDesc

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeChannelStateDesc()

Returns key: 'ParkeeChannelStateDesc'.



* Visibility: **public**




### getParkeeCallerIDNum

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeCallerIDNum()

Returns key: 'ParkeeCallerIDNum'.



* Visibility: **public**




### getParkeeCallerIDName

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeCallerIDName()

Returns key: 'ParkeeCallerIDName'.



* Visibility: **public**




### getParkeeConnectedLineNum

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeConnectedLineNum()

Returns key: 'ParkeeConnectedLineNum'.



* Visibility: **public**




### getParkeeConnectedLineName

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeConnectedLineName()

Returns key: 'ParkeeConnectedLineName'.



* Visibility: **public**




### getParkeeAccountCode

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeAccountCode()

Returns key: 'ParkeeAccountCode'.



* Visibility: **public**




### getParkeeContext

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeContext()

Returns key: 'ParkeeContext'.



* Visibility: **public**




### getParkeeExten

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeExten()

Returns key: 'ParkeeExten'.



* Visibility: **public**




### getParkeePriority

    string PAMI\Message\Event\UnParkedCallEvent::getParkeePriority()

Returns key: 'ParkeePriority'.



* Visibility: **public**




### getParkeeUniqueid

    string PAMI\Message\Event\UnParkedCallEvent::getParkeeUniqueid()

Returns key: 'ParkeeUniqueid'.



* Visibility: **public**




### getParkerDialString

    string PAMI\Message\Event\UnParkedCallEvent::getParkerDialString()

Returns key: 'ParkerDialString'.



* Visibility: **public**




### getParkingSpace

    string PAMI\Message\Event\UnParkedCallEvent::getParkingSpace()

Returns key: 'ParkingSpace'.



* Visibility: **public**




### getParkingTimeout

    string PAMI\Message\Event\UnParkedCallEvent::getParkingTimeout()

Returns key: 'ParkingTimeout'.



* Visibility: **public**




### getParkingDuration

    string PAMI\Message\Event\UnParkedCallEvent::getParkingDuration()

Returns key: 'ParkingDuration'.



* Visibility: **public**




### getParkerChannel

    string PAMI\Message\Event\UnParkedCallEvent::getParkerChannel()

Returns key: 'ParkerChannel'.



* Visibility: **public**




### getParkerChannelState

    string PAMI\Message\Event\UnParkedCallEvent::getParkerChannelState()

Returns key: 'ParkerChannelState'.



* Visibility: **public**




### getParkerChannelStateDesc

    string PAMI\Message\Event\UnParkedCallEvent::getParkerChannelStateDesc()

Returns key: 'ParkerChannelStateDesc'.



* Visibility: **public**




### getParkerCallerIDNum

    string PAMI\Message\Event\UnParkedCallEvent::getParkerCallerIDNum()

Returns key: 'ParkerCallerIDNum'.



* Visibility: **public**




### getParkerCallerIDName

    string PAMI\Message\Event\UnParkedCallEvent::getParkerCallerIDName()

Returns key: 'ParkerCallerIDName'.



* Visibility: **public**




### getParkerConnectedLineNum

    string PAMI\Message\Event\UnParkedCallEvent::getParkerConnectedLineNum()

Returns key: 'ParkerConnectedLineNum'.



* Visibility: **public**




### getParkerConnectedLineName

    string PAMI\Message\Event\UnParkedCallEvent::getParkerConnectedLineName()

Returns key: 'ParkerConnectedLineName'.



* Visibility: **public**




### getParkerAccountCode

    string PAMI\Message\Event\UnParkedCallEvent::getParkerAccountCode()

Returns key: 'ParkerAccountCode'.



* Visibility: **public**




### getParkerContext

    string PAMI\Message\Event\UnParkedCallEvent::getParkerContext()

Returns key: 'ParkerContext'.



* Visibility: **public**




### getParkerExten

    string PAMI\Message\Event\UnParkedCallEvent::getParkerExten()

Returns key: 'ParkerExten'.



* Visibility: **public**




### getParkerPriority

    string PAMI\Message\Event\UnParkedCallEvent::getParkerPriority()

Returns key: 'ParkerPriority'.



* Visibility: **public**




### getParkerUniqueid

    string PAMI\Message\Event\UnParkedCallEvent::getParkerUniqueid()

Returns key: 'ParkerUniqueid'.



* Visibility: **public**




### getRetrieverChannel

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverChannel()

Returns key: 'RetrieverChannel'.



* Visibility: **public**




### getRetrieverChannelState

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverChannelState()

Returns key: 'RetrieverChannelState'.



* Visibility: **public**




### getRetrieverChannelStateDesc

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverChannelStateDesc()

Returns key: 'RetrieverChannelStateDesc'.



* Visibility: **public**




### getRetrieverCallerIDNum

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverCallerIDNum()

Returns key: 'RetrieverCallerIDNum'.



* Visibility: **public**




### getRetrieverCallerIDName

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverCallerIDName()

Returns key: 'RetrieverCallerIDName'.



* Visibility: **public**




### getRetrieverConnectedLineNum

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverConnectedLineNum()

Returns key: 'RetrieverConnectedLineNum'.



* Visibility: **public**




### getRetrieverConnectedLineName

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverConnectedLineName()

Returns key: 'RetrieverConnectedLineName'.



* Visibility: **public**




### getRetrieverAccountCode

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverAccountCode()

Returns key: 'RetrieverAccountCode'.



* Visibility: **public**




### getRetrieverContext

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverContext()

Returns key: 'RetrieverContext'.



* Visibility: **public**




### getRetrieverExten

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverExten()

Returns key: 'RetrieverExten'.



* Visibility: **public**




### getRetrieverPriority

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverPriority()

Returns key: 'RetrieverPriority'.



* Visibility: **public**




### getRetrieverUniqueid

    string PAMI\Message\Event\UnParkedCallEvent::getRetrieverUniqueid()

Returns key: 'RetrieverUniqueid'.



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



