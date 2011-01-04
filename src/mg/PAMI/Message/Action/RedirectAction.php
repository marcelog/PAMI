<?php
/**
 * Redirect action message.
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
 * Redirect action message.
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
class RedirectAction extends ActionMessage
{
    /**
     * Sets key ExtraChannel.
     * 
     * @param string $channel Second call leg to transfer (optional).
     * 
     * @return void
     */
    public function setExtraChannel($channel)
    {
        $this->setKey('ExtraChannel', $channel);
    }
    
    /**
     * Sets key ExtraExten.
     * 
     * @param string $extension Extension to transfer extrachannel to (optional).
     * 
     * @return void
     */
    public function setExtraExtension($extension)
    {
        $this->setKey('ExtraExten', $extension);
    }

    /**
     * Sets key ExtraContext.
     * 
     * @param string $context Context to transfer extrachannel to (optional).
     * 
     * @return void
     */
    public function setExtraContext($context)
    {
        $this->setKey('ExtraContext', $context);
    }
    
    /**
     * Sets key ExtraPriority.
     * 
     * @param string $priority Priority to transfer extrachannel to (optional).
     * 
     * @return void
     */
    public function setExtraPriority($priority)
    {
        $this->setKey('ExtraPriority', $priority);
    }
    
    /**
     * Constructor.
     *
     * @param string $channel   Channel to redirect.
     * @param string $extension Extension to transfer to.
     * @param string $context   Context to transfer to.
     * @param string $priority  Priority to transfer to.
     * 
     * @return void
     */
    public function __construct($channel, $extension, $context, $priority)
    {
        parent::__construct('Redirect');
        $this->setKey('Channel', $channel);
        $this->setKey('Exten', $extension);
        $this->setKey('Context', $context);
        $this->setKey('Priority', $priority);
    }
}