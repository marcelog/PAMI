PAMI\Message\Event\VoicemailUserEntryEvent
===============

Event triggered when issuing a VoicemailUsersList action.

PHP Version 5


* Class name: VoicemailUserEntryEvent
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


### getNewMessageCount

    string PAMI\Message\Event\VoicemailUserEntryEvent::getNewMessageCount()

Returns key: 'NewMessageCount'.



* Visibility: **public**




### getMaxMessageLength

    string PAMI\Message\Event\VoicemailUserEntryEvent::getMaxMessageLength()

Returns key: 'MaxMessageLength'.



* Visibility: **public**




### getMaxMessageCount

    string PAMI\Message\Event\VoicemailUserEntryEvent::getMaxMessageCount()

Returns key: 'MaxMessageCount'.



* Visibility: **public**




### getCallOperator

    string PAMI\Message\Event\VoicemailUserEntryEvent::getCallOperator()

Returns key: 'CallOperator'.



* Visibility: **public**




### getCanReview

    string PAMI\Message\Event\VoicemailUserEntryEvent::getCanReview()

Returns key: 'CanReview'.



* Visibility: **public**




### getVolumeGain

    string PAMI\Message\Event\VoicemailUserEntryEvent::getVolumeGain()

Returns key: 'VolumeGain'.



* Visibility: **public**




### getDeleteMessage

    string PAMI\Message\Event\VoicemailUserEntryEvent::getDeleteMessage()

Returns key: 'DeleteMessage'.



* Visibility: **public**




### getAttachmentFormat

    string PAMI\Message\Event\VoicemailUserEntryEvent::getAttachmentFormat()

Returns key: 'AttachmentFormat'.



* Visibility: **public**




### getAttachMessage

    string PAMI\Message\Event\VoicemailUserEntryEvent::getAttachMessage()

Returns key: 'AttachMessage'.



* Visibility: **public**




### getSayCID

    string PAMI\Message\Event\VoicemailUserEntryEvent::getSayCID()

Returns key: 'SayCID'.



* Visibility: **public**




### getSayEnvelope

    string PAMI\Message\Event\VoicemailUserEntryEvent::getSayEnvelope()

Returns key: 'SayEnvelope'.



* Visibility: **public**




### getSayDurationMin

    string PAMI\Message\Event\VoicemailUserEntryEvent::getSayDurationMin()

Returns key: 'SayDurationMin'.



* Visibility: **public**




### getExitContext

    string PAMI\Message\Event\VoicemailUserEntryEvent::getExitContext()

Returns key: 'ExitContext'.



* Visibility: **public**




### getUniqueID

    string PAMI\Message\Event\VoicemailUserEntryEvent::getUniqueID()

Returns key: 'UniqueID'.



* Visibility: **public**




### getDialOut

    string PAMI\Message\Event\VoicemailUserEntryEvent::getDialOut()

Returns key: 'DialOut'.



* Visibility: **public**




### getCallback

    string PAMI\Message\Event\VoicemailUserEntryEvent::getCallback()

Returns key: 'Callback'.



* Visibility: **public**




### getTimezone

    string PAMI\Message\Event\VoicemailUserEntryEvent::getTimezone()

Returns key: 'Timezone'.



* Visibility: **public**




### getLanguage

    string PAMI\Message\Event\VoicemailUserEntryEvent::getLanguage()

Returns key: 'Language'.



* Visibility: **public**




### getMailCommand

    string PAMI\Message\Event\VoicemailUserEntryEvent::getMailCommand()

Returns key: 'MailCommand'.



* Visibility: **public**




### getServerEmail

    string PAMI\Message\Event\VoicemailUserEntryEvent::getServerEmail()

Returns key: 'ServerEmail'.



* Visibility: **public**




### getPager

    string PAMI\Message\Event\VoicemailUserEntryEvent::getPager()

Returns key: 'Pager'.



* Visibility: **public**




### getEmail

    string PAMI\Message\Event\VoicemailUserEntryEvent::getEmail()

Returns key: 'Email'.



* Visibility: **public**




### getFullname

    string PAMI\Message\Event\VoicemailUserEntryEvent::getFullname()

Returns key: 'Fullname'.



* Visibility: **public**




### getVoicemailBox

    string PAMI\Message\Event\VoicemailUserEntryEvent::getVoicemailBox()

Returns key: 'VoicemailBox'.



* Visibility: **public**




### getVoicemailContext

    string PAMI\Message\Event\VoicemailUserEntryEvent::getVoicemailContext()

Returns key: 'VmContext'.



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



