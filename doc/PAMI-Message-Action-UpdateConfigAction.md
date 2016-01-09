PAMI\Message\Action\UpdateConfigAction
===============

UpdateConfig action message.

PHP Version 5


* Class name: UpdateConfigAction
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


### $counter

    protected mixed $counter = -1





* Visibility: **protected**
* This property is **static**.


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


### __construct

    void PAMI\Message\Message::__construct()

Constructor.



* Visibility: **public**
* This method is defined by [PAMI\Message\Message](PAMI-Message-Message.md)




### setSrcFilename

    void PAMI\Message\Action\UpdateConfigAction::setSrcFilename($filename)

Sets Src filename key.



* Visibility: **public**


#### Arguments
* $filename **mixed**



### setDstFilename

    void PAMI\Message\Action\UpdateConfigAction::setDstFilename($filename)

Sets Dst Filename key.



* Visibility: **public**


#### Arguments
* $filename **mixed**



### setReload

    void PAMI\Message\Action\UpdateConfigAction::setReload($reload)

Sets Reload key.



* Visibility: **public**


#### Arguments
* $reload **mixed**



### setAction

    void PAMI\Message\Action\UpdateConfigAction::setAction($input)

Sets Action-XXXXXX key.



* Visibility: **public**


#### Arguments
* $input **mixed**



### setCat

    void PAMI\Message\Action\UpdateConfigAction::setCat($input)

Sets Cat-XXXXXX key.



* Visibility: **public**


#### Arguments
* $input **mixed**



### setVar

    void PAMI\Message\Action\UpdateConfigAction::setVar($input)

Sets Var-XXXXXX key.



* Visibility: **public**


#### Arguments
* $input **mixed**



### setValue

    void PAMI\Message\Action\UpdateConfigAction::setValue($input)

Sets Value-XXXXXX key.



* Visibility: **public**


#### Arguments
* $input **mixed**



### setMatch

    void PAMI\Message\Action\UpdateConfigAction::setMatch($input)

Sets Match-XXXXXX key.



* Visibility: **public**


#### Arguments
* $input **mixed**



### setLine

    void PAMI\Message\Action\UpdateConfigAction::setLine($input)

Sets Line-XXXXXX key.



* Visibility: **public**


#### Arguments
* $input **mixed**



### getPaddedCounter

    string PAMI\Message\Action\UpdateConfigAction::getPaddedCounter()

Returns the string representation for counter with leading zeroes in UpdateConfig action format.



* Visibility: **protected**




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



