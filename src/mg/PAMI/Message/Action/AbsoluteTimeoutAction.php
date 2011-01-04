<?php
/**
 * AbsoluteTimeout action message.
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
 * AbsoluteTimeout action message.
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
class AbsoluteTimeoutAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $channel Channel to work on.
     * @param integer $timeout Maximum duration of the call (sec).
     * 
     * @return void
     */
    public function __construct($channel, $timeout)
    {
        parent::__construct('AbsoluteTimeout');
        $this->setKey('Channel', $channel);
        $this->setKey('Timeout', $timeout);
    }
}