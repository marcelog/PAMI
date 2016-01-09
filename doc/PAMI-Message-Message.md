PAMI\Message\Message
===============

A generic ami message, in-or-outbound.

PHP Version 5


* Class name: Message
* Namespace: PAMI\Message
* This is an **abstract** class



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


### __sleep

    array<mixed,string> PAMI\Message\Message::__sleep()

Serialize function.



* Visibility: **public**




### getCreatedDate

    integer PAMI\Message\Message::getCreatedDate()

Returns created date.



* Visibility: **public**




### setVariable

    void PAMI\Message\Message::setVariable(string $key, string $value)

Adds a variable to this message.



* Visibility: **public**


#### Arguments
* $key **string** - &lt;p&gt;Variable name.&lt;/p&gt;
* $value **string** - &lt;p&gt;Variable value.&lt;/p&gt;



### getVariable

    string PAMI\Message\Message::getVariable(string $key)

Returns a variable by name.



* Visibility: **public**


#### Arguments
* $key **string** - &lt;p&gt;Variable name.&lt;/p&gt;



### setKey

    void PAMI\Message\Message::setKey(string $key, string $value)

Adds a variable to this message.



* Visibility: **protected**


#### Arguments
* $key **string** - &lt;p&gt;Key name (i.e: Action).&lt;/p&gt;
* $value **string** - &lt;p&gt;Key value.&lt;/p&gt;



### getKey

    string PAMI\Message\Message::getKey(string $key)

Returns a key by name.



* Visibility: **public**


#### Arguments
* $key **string** - &lt;p&gt;Key name (i.e: Action).&lt;/p&gt;



### getKeys

    array<mixed,string> PAMI\Message\Message::getKeys()

Returns all keys for this message.



* Visibility: **public**




### getVariables

    array<mixed,string> PAMI\Message\Message::getVariables()

Returns all variabels for this message.



* Visibility: **public**




### finishMessage

    string PAMI\Message\Message::finishMessage($message)

Returns the end of message token appended to the end of a given message.



* Visibility: **protected**


#### Arguments
* $message **mixed**



### serializeVariable

    string PAMI\Message\Message::serializeVariable(string $key, string $value)

Returns the string representation for an ami action variable.



* Visibility: **private**


#### Arguments
* $key **string**
* $value **string**



### serialize

    string PAMI\Message\Message::serialize()

Gives a string representation for this message, ready to be sent to
ami.



* Visibility: **public**




### getActionID

    string PAMI\Message\Message::getActionID()

Returns key: 'ActionID'.



* Visibility: **public**




### __construct

    void PAMI\Message\Message::__construct()

Constructor.



* Visibility: **public**



