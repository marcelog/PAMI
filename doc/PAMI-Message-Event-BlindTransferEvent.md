PAMI\Message\Event\BlindTransferEvent
===============

Event triggered when a blind transfer is complete.

PHP Version 5


* Class name: BlindTransferEvent
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


### getPrivilege

    string PAMI\Message\Event\BlindTransferEvent::getPrivilege()

Returns key: 'Privilege'.



* Visibility: **public**




### getResult

    string PAMI\Message\Event\BlindTransferEvent::getResult()

Returns key: 'Result'.

Result - Indicates if the transfer was successful or if it failed.

- Fail - An internal error occurred.
- Invalid - Invalid configuration for transfer (e.g. Not bridged)
- Not Permitted - Bridge does not permit transfers
- Success - Transfer completed successfully

* Visibility: **public**




### getTransfererChannel

    string PAMI\Message\Event\BlindTransferEvent::getTransfererChannel()

Returns key: 'TransfererChannel'.



* Visibility: **public**




### getTransfererChannelState

    string PAMI\Message\Event\BlindTransferEvent::getTransfererChannelState()

Returns key: 'TransfererChannelState'.

TransfererChannelState - A numeric code for the channel's current state, related to TransfererChannelStateDesc

* Visibility: **public**




### getTransfererChannelStateDesc

    string PAMI\Message\Event\BlindTransferEvent::getTransfererChannelStateDesc()

Returns key: 'TransfererChannelStateDesc'.

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




### getTransfererCallerIDNum

    string PAMI\Message\Event\BlindTransferEvent::getTransfererCallerIDNum()

Returns key: 'TransfererCallerIDNum'.



* Visibility: **public**




### getTransfererCallerIDName

    string PAMI\Message\Event\BlindTransferEvent::getTransfererCallerIDName()

Returns key: 'TransfererCallerIDName'.



* Visibility: **public**




### getTransfererConnectedLineNum

    string PAMI\Message\Event\BlindTransferEvent::getTransfererConnectedLineNum()

Returns key: 'TransfererConnectedLineNum'.



* Visibility: **public**




### getTransfererConnectedLineName

    string PAMI\Message\Event\BlindTransferEvent::getTransfererConnectedLineName()

Returns key: 'TransfererConnectedLineName'.



* Visibility: **public**




### getTransfererAccountCode

    string PAMI\Message\Event\BlindTransferEvent::getTransfererAccountCode()

Returns key: 'TransfererAccountCode'.



* Visibility: **public**




### getTransfererContext

    string PAMI\Message\Event\BlindTransferEvent::getTransfererContext()

Returns key: 'TransfererContext'.



* Visibility: **public**




### getTransfererExten

    string PAMI\Message\Event\BlindTransferEvent::getTransfererExten()

Returns key: 'TransfererExten'.



* Visibility: **public**




### getTransfererPriority

    string PAMI\Message\Event\BlindTransferEvent::getTransfererPriority()

Returns key: 'TransfererPriority'.



* Visibility: **public**




### getTransfererUniqueid

    string PAMI\Message\Event\BlindTransferEvent::getTransfererUniqueid()

Returns key: 'TransfererUniqueid'.



* Visibility: **public**




### getTransfereeChannel

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeChannel()

Returns key: 'TransfereeChannel'.



* Visibility: **public**




### getTransfereeChannelState

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeChannelState()

Returns key: 'TransfereeChannelState'.

TransfereeChannelState - A numeric code for the channel's current state, related to TransfereeChannelStateDesc

* Visibility: **public**




### getTransfereeChannelStateDesc

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeChannelStateDesc()

Returns key: 'TransfereeChannelStateDesc'.

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




### getTransfereeCallerIDNum

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeCallerIDNum()

Returns key: 'TransfereeCallerIDNum'.



* Visibility: **public**




### getTransfereeCallerIDName

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeCallerIDName()

Returns key: 'TransfereeCallerIDName'.



* Visibility: **public**




### getTransfereeConnectedLineNum

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeConnectedLineNum()

Returns key: 'TransfereeConnectedLineNum'.



* Visibility: **public**




### getTransfereeConnectedLineName

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeConnectedLineName()

Returns key: 'TransfereeConnectedLineName'.



* Visibility: **public**




### getTransfereeAccountCode

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeAccountCode()

Returns key: 'TransfereeAccountCode'.



* Visibility: **public**




### getTransfereeContext

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeContext()

Returns key: 'TransfereeContext'.



* Visibility: **public**




### getTransfereeExten

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeExten()

Returns key: 'TransfereeExten'.



* Visibility: **public**




### getTransfereePriority

    string PAMI\Message\Event\BlindTransferEvent::getTransfereePriority()

Returns key: 'TransfereePriority'.



* Visibility: **public**




### getTransfereeUniqueid

    string PAMI\Message\Event\BlindTransferEvent::getTransfereeUniqueid()

Returns key: 'TransfereeUniqueid'.



* Visibility: **public**




### getBridgeUniqueid

    string PAMI\Message\Event\BlindTransferEvent::getBridgeUniqueid()

Returns key: 'BridgeUniqueid'.



* Visibility: **public**




### getBridgeType

    string PAMI\Message\Event\BlindTransferEvent::getBridgeType()

Returns key: 'BridgeType'.

BridgeType - The type of bridge

* Visibility: **public**




### getBridgeTechnology

    string PAMI\Message\Event\BlindTransferEvent::getBridgeTechnology()

Returns key: 'BridgeTechnology'.

BridgeTechnology - Technology in use by the bridge

* Visibility: **public**




### getBridgeCreator

    string PAMI\Message\Event\BlindTransferEvent::getBridgeCreator()

Returns key: 'BridgeCreator'.

BridgeCreator - Entity that created the bridge if applicable

* Visibility: **public**




### getBridgeName

    string PAMI\Message\Event\BlindTransferEvent::getBridgeName()

Returns key: 'BridgeName'.

BridgeName - Name used to refer to the bridge by its BridgeCreator if applicable

* Visibility: **public**




### getBridgeNumChannels

    string PAMI\Message\Event\BlindTransferEvent::getBridgeNumChannels()

Returns key: 'BridgeNumChannels'.

BridgeNumChannels - Number of channels in the bridge

* Visibility: **public**




### getIsExternal

    string PAMI\Message\Event\BlindTransferEvent::getIsExternal()

Returns key: 'IsExternal'.

IsExternal - Indicates if the transfer was performed outside of Asterisk.
For instance, a channel protocol native transfer is external. A DTMF transfer is internal.

Yes
No

* Visibility: **public**




### isExternal

    boolean PAMI\Message\Event\BlindTransferEvent::isExternal()

Indicates if the transfer was performed outside of Asterisk.

For instance, a channel protocol native transfer is external. A DTMF transfer is internal.

* Visibility: **public**




### getContext

    string PAMI\Message\Event\BlindTransferEvent::getContext()

Returns key: 'Context'.

Context - Destination context for the blind transfer.

* Visibility: **public**




### getExtension

    string PAMI\Message\Event\BlindTransferEvent::getExtension()

Returns key: 'Extension'.

Extension - Destination extension for the blind transfer.

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



