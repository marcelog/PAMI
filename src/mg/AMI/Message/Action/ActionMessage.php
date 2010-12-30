<?php
/**
 * A generic action ami message.
 *
 * PHP Version 5
 *
 * @category Ami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://www.noneyet.ar/
 */
namespace AMI\Message\Action;

use AMI\Message\OutgoingMessage;

/**
 * A generic action ami message.
 *
 * PHP Version 5
 *
 * @category Ami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @link     http://www.noneyet.ar/
 */
abstract class ActionMessage extends OutgoingMessage
{
    public function getActionID()
    {
        return $this->getVariable('ActionID');
    }
    
    /**
     * Constructor.
     *
     * @param string $what Action command.
     * 
     * @return void
     */
    public function __construct($what)
    {
        parent::__construct();
        $this->setKey('Action', $what);
        $this->setKey('ActionID', microtime(true));
    }
}
