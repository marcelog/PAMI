<?php
/**
 * Originate action message.
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
    /**
     * Sets Exten key.
     *  
     * @param string $extension Extension to use (requires Context and Priority). 
     * 
     * @return void
     */
    public function setExtension($extension)
    {
        $this->setKey('Exten', $extension);
    }
    
    /**
     * Sets Context key.
     *  
     * @param string $context Context to use (requires Exten and Priority). 
     * 
     * @return void
     */
    public function setContext($context)
    {
        $this->setKey('Context', $context);
    }
    
    /**
     * Sets Priority key.
     *  
     * @param string $priority Priority to use (requires Exten and Context). 
     * 
     * @return void
     */
    public function setPriority($priority)
    {
        $this->setKey('Priority', $priority);
    }
    
    /**
     * Sets Application key.
     *  
     * @param string $application Application to execute. 
     * 
     * @return void
     */
    public function setApplication($application)
    {
        $this->setKey('Application', $application);
    }
    
    /**
     * Sets Data key.
     *  
     * @param string $data Data to use (requires Application). 
     * 
     * @return void
     */
    public function setData($data)
    {
        $this->setKey('Data', $data);
    }
    
    /**
     * Sets Timeout key.
     *  
     * @param integer $timeout How long to wait for call to be answered (in ms). 
     * 
     * @return void
     */
    public function setTimeout($timeout)
    {
        $this->setKey('Timeout', $timeout);
    }
    
    /**
     * Sets CallerID key.
     *  
     * @param string $clid Caller ID to be set on the outgoing channel. 
     * 
     * @return void
     */
    public function setCallerId($clid)
    {
        $this->setKey('CallerID', $clid);
    }
    
    /**
     * Sets Account key.
     *  
     * @param string $name  Channel variable to set, multiple are allowed.
     * @param string $value Variable value.
     * 
     * @return void
     */
    public function setVariable($name, $value)
    {
        $this->setVariable($name, $value);
    }
    
    /**
     * Sets Account key.
     *  
     * @param string Account code. 
     * 
     * @return void
     */
    public function setAccount($account)
    {
        $this->setKey('Account', $account);
    }
    
    /**
     * Sets Async key.
     *  
     * @param boolean $async Set to true for fast origination.
     * 
     * @return void
     */
    public function setAsync($async)
    {
        $this->setKey('Async', $async ? 'true' : 'false');
    }
    
    /**
     * Sets Codecs key.
     *  
     * @param string[] $codecs List of codecs to use for this call.
     * 
     * @return void
     */
    public function setCodecs(array $codecs)
    {
        $this->setKey('Codecs', implode(',', $codecs));
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