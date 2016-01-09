PAMI\Message\Action\OriginateAction
===============

Originate action message.

PHP Version 5


* Class name: OriginateAction
* Namespace: PAMI\Message\Action
* Parent class: [PAMI\Message\Action\ActionMessage](PAMI-Message-Action-ActionMessage.md)



Constants
----------


### EOL

    const EOL = "\r\n"





### EOM

    const EOM = "\r\n\r\n"





Properties
----------


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


### setExtension

    void PAMI\Message\Action\OriginateAction::setExtension(string $extension)

Sets Exten key.



* Visibility: **public**


#### Arguments
* $extension **string** - &lt;p&gt;Extension to use (requires Context and Priority).&lt;/p&gt;



### setContext

    void PAMI\Message\Action\OriginateAction::setContext(string $context)

Sets Context key.



* Visibility: **public**


#### Arguments
* $context **string** - &lt;p&gt;Context to use (requires Exten and Priority).&lt;/p&gt;



### setPriority

    void PAMI\Message\Action\OriginateAction::setPriority(string $priority)

Sets Priority key.



* Visibility: **public**


#### Arguments
* $priority **string** - &lt;p&gt;Priority to use (requires Exten and Context).&lt;/p&gt;



### setApplication

    void PAMI\Message\Action\OriginateAction::setApplication(string $application)

Sets Application key.



* Visibility: **public**


#### Arguments
* $application **string** - &lt;p&gt;Application to execute.&lt;/p&gt;



### setData

    void PAMI\Message\Action\OriginateAction::setData(string $data)

Sets Data key.



* Visibility: **public**


#### Arguments
* $data **string** - &lt;p&gt;Data to use (requires Application).&lt;/p&gt;



### setTimeout

    void PAMI\Message\Action\OriginateAction::setTimeout(integer $timeout)

Sets Timeout key.



* Visibility: **public**


#### Arguments
* $timeout **integer** - &lt;p&gt;How long to wait for call to be answered (in ms).&lt;/p&gt;



### setCallerId

    void PAMI\Message\Action\OriginateAction::setCallerId(string $clid)

Sets CallerID key.



* Visibility: **public**


#### Arguments
* $clid **string** - &lt;p&gt;Caller ID to be set on the outgoing channel.&lt;/p&gt;



### setAccount

    void PAMI\Message\Action\OriginateAction::setAccount($account)

Sets Account key.



* Visibility: **public**


#### Arguments
* $account **mixed**



### setAsync

    void PAMI\Message\Action\OriginateAction::setAsync(boolean $async)

Sets Async key.



* Visibility: **public**


#### Arguments
* $async **boolean** - &lt;p&gt;Set to true for fast origination.&lt;/p&gt;



### setCodecs

    void PAMI\Message\Action\OriginateAction::setCodecs(array<mixed,string> $codecs)

Sets Codecs key.



* Visibility: **public**


#### Arguments
* $codecs **array&lt;mixed,string&gt;** - &lt;p&gt;List of codecs to use for this call.&lt;/p&gt;



### __construct

    void PAMI\Message\Message::__construct()

Constructor.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)




### setActionID

    void PAMI\Message\Action\ActionMessage::setActionID($actionID)

Sets Action ID.

The ActionID can be at most 69 characters long, according to
[Asterisk Issue 14847](https://issues.asterisk.org/jira/browse/14847).

Therefore we'll throw an exception when the ActionID is too long.

* Visibility: **public**
* This method is defined by [PAMI\Message\Action\ActionMessage](PAMI-Message-Action-ActionMessage.md)


#### Arguments
* $actionID **mixed** - &lt;p&gt;The Action ID to have this action known by&lt;/p&gt;



### __sleep

    array<mixed,string> PAMI\Message\Message::__sleep()

Serialize function.



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



