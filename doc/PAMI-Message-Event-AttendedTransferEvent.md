PAMI\Message\Event\AttendedTransferEvent
===============

Event triggered when an attended transfer is complete.

PHP Version 5


* Class name: AttendedTransferEvent
* Namespace: PAMI\Message\Event
* Parent class: [PAMI\Message\Event\EventMessage](PAMI-Message-Event-EventMessage.md)



Constants
----------


### RESULT_FAIL

    const RESULT_FAIL = 'Fail'





### RESULT_INVALID

    const RESULT_INVALID = 'Invalid'





### RESULT_NOT_PERMITTED

    const RESULT_NOT_PERMITTED = 'Not Permitted'





### RESULT_SUCCESS

    const RESULT_SUCCESS = 'Success'





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


### getResult

    string PAMI\Message\Event\AttendedTransferEvent::getResult()

Returns key: 'Result'.

Result - Indicates if the transfer was successful or if it failed.

- Fail - An internal error occurred.
- Invalid - Invalid configuration for transfer (e.g. Not bridged)
- Not Permitted - Bridge does not permit transfers
- Success - Transfer completed successfully

* Visibility: **public**




### getOrigTransfererChannel

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererChannel()

Returns key: 'OrigTransfererChannel'.



* Visibility: **public**




### getOrigTransfererChannelState

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererChannelState()

Returns key: 'OrigTransfererChannelState'.



* Visibility: **public**




### getOrigTransfererChannelStateDesc

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererChannelStateDesc()

Returns key: 'OrigTransfererChannelStateDesc'.

Down
Rsrvd
OffHook
Dialing
Ring
Ringing
Up
Busy
Dialing Offhook
Pre-ring
Unknown

* Visibility: **public**




### getOrigTransfererCallerIDNum

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererCallerIDNum()

Returns key: 'OrigTransfererCallerIDNum'.



* Visibility: **public**




### getOrigTransfererCallerIDName

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererCallerIDName()

Returns key: 'OrigTransfererCallerIDName'.



* Visibility: **public**




### getOrigTransfererConnectedLineNum

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererConnectedLineNum()

Returns key: 'OrigTransfererConnectedLineNum'.



* Visibility: **public**




### getOrigTransfererConnectedLineName

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererConnectedLineName()

Returns key: 'OrigTransfererConnectedLineName'.



* Visibility: **public**




### getOrigTransfererAccountCode

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererAccountCode()

Returns key: 'OrigTransfererAccountCode'.



* Visibility: **public**




### getOrigTransfererContext

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererContext()

Returns key: 'OrigTransfererContext'.



* Visibility: **public**




### getOrigTransfererExten

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererExten()

Returns key: 'OrigTransfererExten'.



* Visibility: **public**




### getOrigTransfererPriority

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererPriority()

Returns key: 'OrigTransfererPriority'.



* Visibility: **public**




### getOrigTransfererUniqueid

    string PAMI\Message\Event\AttendedTransferEvent::getOrigTransfererUniqueid()

Returns key: 'OrigTransfererUniqueid'.



* Visibility: **public**




### getOrigBridgeUniqueid

    string PAMI\Message\Event\AttendedTransferEvent::getOrigBridgeUniqueid()

Returns key: 'OrigBridgeUniqueid'.



* Visibility: **public**




### getOrigBridgeType

    string PAMI\Message\Event\AttendedTransferEvent::getOrigBridgeType()

Returns key: 'OrigBridgeType'.



* Visibility: **public**




### getOrigBridgeTechnology

    string PAMI\Message\Event\AttendedTransferEvent::getOrigBridgeTechnology()

Returns key: 'OrigBridgeTechnology'.



* Visibility: **public**




### getOrigBridgeCreator

    string PAMI\Message\Event\AttendedTransferEvent::getOrigBridgeCreator()

Returns key: 'OrigBridgeCreator'.



* Visibility: **public**




### getOrigBridgeName

    string PAMI\Message\Event\AttendedTransferEvent::getOrigBridgeName()

Returns key: 'OrigBridgeName'.



* Visibility: **public**




### getOrigBridgeNumChannels

    string PAMI\Message\Event\AttendedTransferEvent::getOrigBridgeNumChannels()

Returns key: 'OrigBridgeNumChannels'.



* Visibility: **public**




### getSecondTransfererChannel

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererChannel()

Returns key: 'SecondTransfererChannel'.



* Visibility: **public**




### getSecondTransfererChannelState

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererChannelState()

Returns key: 'SecondTransfererChannelState'.



* Visibility: **public**




### getSecondTransfererChannelStateDesc

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererChannelStateDesc()

Returns key: 'SecondTransfererChannelStateDesc'.

Down
Rsrvd
OffHook
Dialing
Ring
Ringing
Up
Busy
Dialing Offhook
Pre-ring
Unknown

* Visibility: **public**




### getSecondTransfererCallerIDNum

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererCallerIDNum()

Returns key: 'SecondTransfererCallerIDNum'.



* Visibility: **public**




### getSecondTransfererCallerIDName

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererCallerIDName()

Returns key: 'SecondTransfererCallerIDName'.



* Visibility: **public**




### getSecondTransfererConnectedLineNum

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererConnectedLineNum()

Returns key: 'SecondTransfererConnectedLineNum'.



* Visibility: **public**




### getSecondTransfererConnectedLineName

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererConnectedLineName()

Returns key: 'SecondTransfererConnectedLineName'.



* Visibility: **public**




### getSecondTransfererAccountCode

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererAccountCode()

Returns key: 'SecondTransfererAccountCode'.



* Visibility: **public**




### getSecondTransfererContext

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererContext()

Returns key: 'SecondTransfererContext'.



* Visibility: **public**




### getSecondTransfererExten

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererExten()

Returns key: 'SecondTransfererExten'.



* Visibility: **public**




### getSecondTransfererPriority

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererPriority()

Returns key: 'SecondTransfererPriority'.



* Visibility: **public**




### getSecondTransfererUniqueid

    string PAMI\Message\Event\AttendedTransferEvent::getSecondTransfererUniqueid()

Returns key: 'SecondTransfererUniqueid'.



* Visibility: **public**




### getSecondBridgeUniqueid

    string PAMI\Message\Event\AttendedTransferEvent::getSecondBridgeUniqueid()

Returns key: 'SecondBridgeUniqueid'.



* Visibility: **public**




### getSecondBridgeType

    string PAMI\Message\Event\AttendedTransferEvent::getSecondBridgeType()

Returns key: 'SecondBridgeType'.



* Visibility: **public**




### getSecondBridgeTechnology

    string PAMI\Message\Event\AttendedTransferEvent::getSecondBridgeTechnology()

Returns key: 'SecondBridgeTechnology'.



* Visibility: **public**




### getSecondBridgeCreator

    string PAMI\Message\Event\AttendedTransferEvent::getSecondBridgeCreator()

Returns key: 'SecondBridgeCreator'.



* Visibility: **public**




### getSecondBridgeName

    string PAMI\Message\Event\AttendedTransferEvent::getSecondBridgeName()

Returns key: 'SecondBridgeName'.



* Visibility: **public**




### getSecondBridgeNumChannels

    string PAMI\Message\Event\AttendedTransferEvent::getSecondBridgeNumChannels()

Returns key: 'SecondBridgeNumChannels'.



* Visibility: **public**




### getDestType

    string PAMI\Message\Event\AttendedTransferEvent::getDestType()

Returns key: 'DestType'.

DestType - Indicates the method by which the attended transfer completed.

Bridge - The transfer was accomplished by merging two bridges into one.
App - The transfer was accomplished by having a channel or bridge run a dialplan application.
Link - The transfer was accomplished by linking two bridges together using a local channel pair.
Threeway - The transfer was accomplished by placing all parties into a threeway call.
Fail - The transfer failed.

* Visibility: **public**




### getDestBridgeUniqueid

    string PAMI\Message\Event\AttendedTransferEvent::getDestBridgeUniqueid()

Returns key: 'DestBridgeUniqueid'.



* Visibility: **public**




### getDestApp

    string PAMI\Message\Event\AttendedTransferEvent::getDestApp()

Returns key: 'DestApp'.



* Visibility: **public**




### getLocalOneChannel

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneChannel()

Returns key: 'LocalOneChannel'.



* Visibility: **public**




### getLocalOneChannelState

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneChannelState()

Returns key: 'LocalOneChannelState'.



* Visibility: **public**




### getLocalOneChannelStateDesc

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneChannelStateDesc()

Returns key: 'LocalOneChannelStateDesc'.



* Visibility: **public**




### getLocalOneCallerIDNum

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneCallerIDNum()

Returns key: 'LocalOneCallerIDNum'.



* Visibility: **public**




### getLocalOneCallerIDName

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneCallerIDName()

Returns key: 'LocalOneCallerIDName'.



* Visibility: **public**




### getLocalOneConnectedLineNum

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneConnectedLineNum()

Returns key: 'LocalOneConnectedLineNum'.



* Visibility: **public**




### getLocalOneConnectedLineName

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneConnectedLineName()

Returns key: 'LocalOneConnectedLineName'.



* Visibility: **public**




### getLocalOneAccountCode

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneAccountCode()

Returns key: 'LocalOneAccountCode'.



* Visibility: **public**




### getLocalOneContext

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneContext()

Returns key: 'LocalOneContext'.



* Visibility: **public**




### getLocalOneExten

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneExten()

Returns key: 'LocalOneExten'.



* Visibility: **public**




### getLocalOnePriority

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOnePriority()

Returns key: 'LocalOnePriority'.



* Visibility: **public**




### getLocalOneUniqueid

    string PAMI\Message\Event\AttendedTransferEvent::getLocalOneUniqueid()

Returns key: 'LocalOneUniqueid'.



* Visibility: **public**




### getLocalTwoChannel

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoChannel()

Returns key: 'LocalTwoChannel'.



* Visibility: **public**




### getLocalTwoChannelState

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoChannelState()

Returns key: 'LocalTwoChannelState'.



* Visibility: **public**




### getLocalTwoChannelStateDesc

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoChannelStateDesc()

Returns key: 'LocalTwoChannelStateDesc'.



* Visibility: **public**




### getLocalTwoCallerIDNum

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoCallerIDNum()

Returns key: 'LocalTwoCallerIDNum'.



* Visibility: **public**




### getLocalTwoCallerIDName

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoCallerIDName()

Returns key: 'LocalTwoCallerIDName'.



* Visibility: **public**




### getLocalTwoConnectedLineNum

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoConnectedLineNum()

Returns key: 'LocalTwoConnectedLineNum'.



* Visibility: **public**




### getLocalTwoConnectedLineName

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoConnectedLineName()

Returns key: 'LocalTwoConnectedLineName'.



* Visibility: **public**




### getLocalTwoAccountCode

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoAccountCode()

Returns key: 'LocalTwoAccountCode'.



* Visibility: **public**




### getLocalTwoContext

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoContext()

Returns key: 'LocalTwoContext'.



* Visibility: **public**




### getLocalTwoExten

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoExten()

Returns key: 'LocalTwoExten'.



* Visibility: **public**




### getLocalTwoPriority

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoPriority()

Returns key: 'LocalTwoPriority'.



* Visibility: **public**




### getLocalTwoUniqueid

    string PAMI\Message\Event\AttendedTransferEvent::getLocalTwoUniqueid()

Returns key: 'LocalTwoUniqueid'.



* Visibility: **public**




### getDestTransfererChannel

    string PAMI\Message\Event\AttendedTransferEvent::getDestTransfererChannel()

Returns key: 'DestTransfererChannel'.



* Visibility: **public**




### getTransfereeChannel

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeChannel()

Returns key: 'TransfereeChannel'.



* Visibility: **public**




### getTransfereeChannelState

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeChannelState()

Returns key: 'TransfereeChannelState'.



* Visibility: **public**




### getTransfereeChannelStateDesc

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeChannelStateDesc()

Returns key: 'TransfereeChannelStateDesc'.



* Visibility: **public**




### getTransfereeCallerIDNum

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeCallerIDNum()

Returns key: 'TransfereeCallerIDNum'.



* Visibility: **public**




### getTransfereeCallerIDName

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeCallerIDName()

Returns key: 'TransfereeCallerIDName'.



* Visibility: **public**




### getTransfereeConnectedLineNum

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeConnectedLineNum()

Returns key: 'TransfereeConnectedLineNum'.



* Visibility: **public**




### getTransfereeConnectedLineName

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeConnectedLineName()

Returns key: 'TransfereeConnectedLineName'.



* Visibility: **public**




### getTransfereeAccountCode

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeAccountCode()

Returns key: 'TransfereeAccountCode'.



* Visibility: **public**




### getTransfereeContext

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeContext()

Returns key: 'TransfereeContext'.



* Visibility: **public**




### getTransfereeExten

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeExten()

Returns key: 'TransfereeExten'.



* Visibility: **public**




### getTransfereePriority

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereePriority()

Returns key: 'TransfereePriority'.



* Visibility: **public**




### getTransfereeUniqueid

    string PAMI\Message\Event\AttendedTransferEvent::getTransfereeUniqueid()

Returns key: 'TransfereeUniqueid'.



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



