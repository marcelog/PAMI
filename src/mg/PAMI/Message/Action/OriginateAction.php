<?php
/**
 * Originate action message.
 *
 * [ActionID] - ActionID for this transaction. Will be returned.
 * Channel - Channel name to call.
 * [Exten] - Extension to use (requires Context and Priority )
 * [Context] - Context to use (requires Exten and Priority )
 * [Priority] - Priority to use (requires Exten and Context )
 * [Application] - Application to execute.
 * [Data] - Data to use (requires Application ).
 * [Timeout] - How long to wait for call to be answered (in ms.).
 * [CallerID] - Caller ID to be set on the outgoing channel.
 * [Variable] - Channel variable to set, multiple Variable: headers are allowed.
 * [Account] - Account code.
 * [Async] - Set to true for fast origination.
 * [Codecs] - Comma-separated list of codecs to use for this call.
 * 
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Message\Action;

/**
 * Originate action message.
 * 
 * [ActionID] - ActionID for this transaction. Will be returned.
 * Channel - Channel name to call.
 * [Exten] - Extension to use (requires Context and Priority )
 * [Context] - Context to use (requires Exten and Priority )
 * [Priority] - Priority to use (requires Exten and Context )
 * [Application] - Application to execute.
 * [Data] - Data to use (requires Application ).
 * [Timeout] - How long to wait for call to be answered (in ms.).
 * [CallerID] - Caller ID to be set on the outgoing channel.
 * [Variable] - Channel variable to set, multiple Variable: headers are allowed.
 * [Account] - Account code.
 * [Async] - Set to true for fast origination.
 * [Codecs] - Comma-separated list of codecs to use for this call.
 * 
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class OriginateAction extends ActionMessage
{
    public function setExtension($extension)
    {
        $this->setKey('Exten', $extension);
    }
    
    public function setContext($context)
    {
        $this->setKey('Context', $context);
    }
    
    public function setPriority($priority)
    {
        $this->setKey('Priority', $priority);
    }
    
    public function setApplication($application)
    {
        $this->setKey('Application', $application);
    }
    
    public function setData($data)
    {
        $this->setKey('Data', $data);
    }
    
    public function setTimeout($timeout)
    {
        $this->setKey('Timeout', $timeout);
    }
    
    public function setCallerId($clid)
    {
        $this->setKey('CallerID', $clid);
    }
    
    public function setVariable($name, $value)
    {
        $this->setVariable($name, $value);
    }
    
    public function setAccount($account)
    {
        $this->setKey('Account', $account);
    }
    
    public function setAsync($async)
    {
        $this->setKey('Async', $async);
    }
    
    public function setCodecs($codecs)
    {
        $this->setKey('Codecs', $codecs);
    }
    /**
     * Constructor.
     *
     * @param string $channel Channel to call to.
     * 
     * @return void
     */
    public function __construct($channel)
    {
        parent::__construct('Originate');
        $this->setKey('Channel', $channel);
    }
}