PAMI\Message\Event\DongleDeviceEntryEvent
===============

Event triggered when getting a dongle device.

PHP Version 5


* Class name: DongleDeviceEntryEvent
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


### getDevice

    string PAMI\Message\Event\DongleDeviceEntryEvent::getDevice()

Returns key: 'Device'.



* Visibility: **public**




### getAudioSetting

    string PAMI\Message\Event\DongleDeviceEntryEvent::getAudioSetting()

Returns key: 'AudioSetting'.



* Visibility: **public**




### getDataSetting

    string PAMI\Message\Event\DongleDeviceEntryEvent::getDataSetting()

Returns key: 'DataSetting'.



* Visibility: **public**




### getIMEISetting

    string PAMI\Message\Event\DongleDeviceEntryEvent::getIMEISetting()

Returns key: 'IMEISetting'.



* Visibility: **public**




### getIMSISetting

    string PAMI\Message\Event\DongleDeviceEntryEvent::getIMSISetting()

Returns key: 'IMSISetting'.



* Visibility: **public**




### getChannelLanguage

    string PAMI\Message\Event\DongleDeviceEntryEvent::getChannelLanguage()

Returns key: 'ChannelLanguage'.



* Visibility: **public**




### getContext

    string PAMI\Message\Event\DongleDeviceEntryEvent::getContext()

Returns key: 'Context'.



* Visibility: **public**




### getExten

    string PAMI\Message\Event\DongleDeviceEntryEvent::getExten()

Returns key: 'Exten'.



* Visibility: **public**




### getGroup

    string PAMI\Message\Event\DongleDeviceEntryEvent::getGroup()

Returns key: 'Group'.



* Visibility: **public**




### getRXGain

    string PAMI\Message\Event\DongleDeviceEntryEvent::getRXGain()

Returns key: 'RXGain'.



* Visibility: **public**




### getTXGain

    string PAMI\Message\Event\DongleDeviceEntryEvent::getTXGain()

Returns key: 'TXGain'.



* Visibility: **public**




### getU2DIAG

    string PAMI\Message\Event\DongleDeviceEntryEvent::getU2DIAG()

Returns key: 'U2DIAG'.



* Visibility: **public**




### getUseCallingPres

    string PAMI\Message\Event\DongleDeviceEntryEvent::getUseCallingPres()

Returns key: 'UseCallingPres'.



* Visibility: **public**




### getDefaultCallingPres

    string PAMI\Message\Event\DongleDeviceEntryEvent::getDefaultCallingPres()

Returns key: 'DefaultCallingPres'.



* Visibility: **public**




### getAutoDeleteSMS

    string PAMI\Message\Event\DongleDeviceEntryEvent::getAutoDeleteSMS()

Returns key: 'AutoDeleteSMS'.



* Visibility: **public**




### getDisableSMS

    string PAMI\Message\Event\DongleDeviceEntryEvent::getDisableSMS()

Returns key: 'DisableSMS'.



* Visibility: **public**




### getResetDongle

    string PAMI\Message\Event\DongleDeviceEntryEvent::getResetDongle()

Returns key: 'ResetDongle'.



* Visibility: **public**




### getSMSPDU

    string PAMI\Message\Event\DongleDeviceEntryEvent::getSMSPDU()

Returns key: 'SMSPDU'.



* Visibility: **public**




### getCallWaitingSetting

    string PAMI\Message\Event\DongleDeviceEntryEvent::getCallWaitingSetting()

Returns key: 'CallWaitingSetting'.



* Visibility: **public**




### getDTMF

    string PAMI\Message\Event\DongleDeviceEntryEvent::getDTMF()

Returns key: 'DTMF'.



* Visibility: **public**




### getMinimalDTMFGap

    string PAMI\Message\Event\DongleDeviceEntryEvent::getMinimalDTMFGap()

Returns key: 'MinimalDTMFGap'.



* Visibility: **public**




### getMinimalDTMFDuration

    string PAMI\Message\Event\DongleDeviceEntryEvent::getMinimalDTMFDuration()

Returns key: 'MinimalDTMFDuration'.



* Visibility: **public**




### getMinimalDTMFInterval

    string PAMI\Message\Event\DongleDeviceEntryEvent::getMinimalDTMFInterval()

Returns key: 'MinimalDTMFInterval'.



* Visibility: **public**




### getState

    string PAMI\Message\Event\DongleDeviceEntryEvent::getState()

Returns key: 'State'.



* Visibility: **public**




### getAudioState

    string PAMI\Message\Event\DongleDeviceEntryEvent::getAudioState()

Returns key: 'AudioState'.



* Visibility: **public**




### getDataState

    string PAMI\Message\Event\DongleDeviceEntryEvent::getDataState()

Returns key: 'DataState'.



* Visibility: **public**




### getVoice

    string PAMI\Message\Event\DongleDeviceEntryEvent::getVoice()

Returns key: 'Voice'.



* Visibility: **public**




### getSMS

    string PAMI\Message\Event\DongleDeviceEntryEvent::getSMS()

Returns key: 'SMS'.



* Visibility: **public**




### getManufacturer

    string PAMI\Message\Event\DongleDeviceEntryEvent::getManufacturer()

Returns key: 'Manufacturer'.



* Visibility: **public**




### getModel

    string PAMI\Message\Event\DongleDeviceEntryEvent::getModel()

Returns key: 'Model'.



* Visibility: **public**




### getFirmware

    string PAMI\Message\Event\DongleDeviceEntryEvent::getFirmware()

Returns key: 'Firmware'.



* Visibility: **public**




### getIMEIState

    string PAMI\Message\Event\DongleDeviceEntryEvent::getIMEIState()

Returns key: 'IMEIState'.



* Visibility: **public**




### getIMSIState

    string PAMI\Message\Event\DongleDeviceEntryEvent::getIMSIState()

Returns key: 'IMSIState'.



* Visibility: **public**




### getGSMRegistrationStatus

    string PAMI\Message\Event\DongleDeviceEntryEvent::getGSMRegistrationStatus()

Returns key: 'GSMRegistrationStatus'.



* Visibility: **public**




### getRSSI

    string PAMI\Message\Event\DongleDeviceEntryEvent::getRSSI()

Returns key: 'RSSI'.



* Visibility: **public**




### getMode

    string PAMI\Message\Event\DongleDeviceEntryEvent::getMode()

Returns key: 'Mode'.



* Visibility: **public**




### getSubmode

    string PAMI\Message\Event\DongleDeviceEntryEvent::getSubmode()

Returns key: 'Submode'.



* Visibility: **public**




### getProviderName

    string PAMI\Message\Event\DongleDeviceEntryEvent::getProviderName()

Returns key: 'ProviderName'.



* Visibility: **public**




### getLocationAreaCode

    string PAMI\Message\Event\DongleDeviceEntryEvent::getLocationAreaCode()

Returns key: 'LocationAreaCode'.



* Visibility: **public**




### getCellID

    string PAMI\Message\Event\DongleDeviceEntryEvent::getCellID()

Returns key: 'CellID'.



* Visibility: **public**




### getSubscriberNumber

    string PAMI\Message\Event\DongleDeviceEntryEvent::getSubscriberNumber()

Returns key: 'SubscriberNumber'.



* Visibility: **public**




### getSMSServiceCenter

    string PAMI\Message\Event\DongleDeviceEntryEvent::getSMSServiceCenter()

Returns key: 'SMSServiceCenter'.



* Visibility: **public**




### getUseUCS2Encoding

    string PAMI\Message\Event\DongleDeviceEntryEvent::getUseUCS2Encoding()

Returns key: 'UseUCS2Encoding'.



* Visibility: **public**




### getUSSDUse7BitEncoding

    string PAMI\Message\Event\DongleDeviceEntryEvent::getUSSDUse7BitEncoding()

Returns key: 'USSDUse7BitEncoding'.



* Visibility: **public**




### getUSSDUseUCS2Decoding

    string PAMI\Message\Event\DongleDeviceEntryEvent::getUSSDUseUCS2Decoding()

Returns key: 'USSDUseUCS2Decoding'.



* Visibility: **public**




### getTasksInQueue

    string PAMI\Message\Event\DongleDeviceEntryEvent::getTasksInQueue()

Returns key: 'TasksInQueue'.



* Visibility: **public**




### getCommandsInQueue

    string PAMI\Message\Event\DongleDeviceEntryEvent::getCommandsInQueue()

Returns key: 'CommandsInQueue'.



* Visibility: **public**




### getCallWaitingState

    string PAMI\Message\Event\DongleDeviceEntryEvent::getCallWaitingState()

Returns key: 'CallWaitingState'.



* Visibility: **public**




### getCurrentDeviceState

    string PAMI\Message\Event\DongleDeviceEntryEvent::getCurrentDeviceState()

Returns key: 'CurrentDeviceState'.



* Visibility: **public**




### getDesiredDeviceState

    string PAMI\Message\Event\DongleDeviceEntryEvent::getDesiredDeviceState()

Returns key: 'DesiredDeviceState'.



* Visibility: **public**




### getCallsChannels

    string PAMI\Message\Event\DongleDeviceEntryEvent::getCallsChannels()

Returns key: 'CallsChannels'.



* Visibility: **public**




### getActive

    string PAMI\Message\Event\DongleDeviceEntryEvent::getActive()

Returns key: 'Active'.



* Visibility: **public**




### getHeld

    string PAMI\Message\Event\DongleDeviceEntryEvent::getHeld()

Returns key: 'Held'.



* Visibility: **public**




### getDialing

    string PAMI\Message\Event\DongleDeviceEntryEvent::getDialing()

Returns key: 'Dialing'.



* Visibility: **public**




### getAlerting

    string PAMI\Message\Event\DongleDeviceEntryEvent::getAlerting()

Returns key: 'Alerting'.



* Visibility: **public**




### getIncoming

    string PAMI\Message\Event\DongleDeviceEntryEvent::getIncoming()

Returns key: 'Incoming'.



* Visibility: **public**




### getWaiting

    string PAMI\Message\Event\DongleDeviceEntryEvent::getWaiting()

Returns key: 'Waiting'.



* Visibility: **public**




### getReleasing

    string PAMI\Message\Event\DongleDeviceEntryEvent::getReleasing()

Returns key: 'Releasing'.



* Visibility: **public**




### getInitializing

    string PAMI\Message\Event\DongleDeviceEntryEvent::getInitializing()

Returns key: 'Initializing'.



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



