<?php
/**
 * AgentLogoff action message.
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
 * AgentLogoff action message.
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
class AgentLogoffAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $agent Agent ID of the agent to log off.
     * @param string $soft  Set to true to not hangup existing calls.
     * 
     * @return void
     */
    public function __construct($agent, $soft = false)
    {
        parent::__construct('AgentLogoff');
        $this->setKey('Soft', $soft ? 'true' : 'false');
    }
}