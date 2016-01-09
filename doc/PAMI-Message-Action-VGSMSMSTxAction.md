PAMI\Message\Action\VGSMSMSTxAction
===============

Not all methods were implemented. For reference please check
http://open.voismart.it/index.php/VGSM_Manager_Interface

PHP Version 5


* Class name: VGSMSMSTxAction
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


### setTo

    void PAMI\Message\Action\VGSMSMSTxAction::setTo(string $target)

Sets CellPhone Number . Mandatory



* Visibility: **public**


#### Arguments
* $target **string** - &lt;p&gt;phone to send SMS to. Sign + and Countr code is needed in some countries.&lt;/p&gt;



### setContentType

    void PAMI\Message\Action\VGSMSMSTxAction::setContentType(string $contentType)

Sets Content  Type. Optional



* Visibility: **public**


#### Arguments
* $contentType **string** - &lt;p&gt;Content to use, default text/plain; charset=ASCII&lt;/p&gt;



### setContentEncoding

    void PAMI\Message\Action\VGSMSMSTxAction::setContentEncoding(string $encoding)

Sets Content  Type Encoding.Optional



* Visibility: **public**


#### Arguments
* $encoding **string** - &lt;p&gt;Content to use, default text/plain; charset=ASCII&lt;/p&gt;



### setMe

    void PAMI\Message\Action\VGSMSMSTxAction::setMe(string $chipId)

Sets Chip Id - It will use the chip_id provided.Optional



* Visibility: **public**


#### Arguments
* $chipId **string** - &lt;p&gt;Chip Id to use format meX , eg. me0 for VGSM 2 cards&lt;/p&gt;



### setContent

    void PAMI\Message\Action\VGSMSMSTxAction::setContent(string $content)

Sets $content  - Message to send. Mandatory



* Visibility: **public**


#### Arguments
* $content **string** - &lt;p&gt;Should be ASCII not utf8, no accents nada!.&lt;/p&gt;



### setSmsClass

    void PAMI\Message\Action\VGSMSMSTxAction::setSmsClass($class)

Sets X-SMS-Class  key. Optional



* Visibility: **public**


#### Arguments
* $class **mixed**



### setConcatRefId

    void PAMI\Message\Action\VGSMSMSTxAction::setConcatRefId($refid)

Sets X-SMS-Concatenate-RefID . Optional. Should be set with
setConcatSeqNum and setConcatSeqNum



* Visibility: **public**


#### Arguments
* $refid **mixed**



### setConcatSeqNum

    void PAMI\Message\Action\VGSMSMSTxAction::setConcatSeqNum($seqnum)

Sets X-SMS-Concatenate-Sequence-Number. Optional. Should be set with
setConcatSeqNum: setConcatTotalMsg



* Visibility: **public**


#### Arguments
* $seqnum **mixed**



### setConcatTotalMsg

    void PAMI\Message\Action\VGSMSMSTxAction::setConcatTotalMsg($totalmsg)

Sets X-SMS-Concatenate-Total-Messages. Optional. Should be set with
setConcatRefId and setConcatSeqNum



* Visibility: **public**


#### Arguments
* $totalmsg **mixed**



### setAccount

    void PAMI\Message\Action\VGSMSMSTxAction::setAccount($account)

Sets Account key.



* Visibility: **public**


#### Arguments
* $account **mixed**



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



