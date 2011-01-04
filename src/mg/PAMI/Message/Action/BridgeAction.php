<?php
/**
 * Bridge action message.
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
 * Bridge action message.
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
class BridgeAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $channel1 Channel1
     * @param string  $channel1 Channel1
     * @param boolean $tone     Play courtesy tone to Channel2
     * 
     * @return void
     */
    public function __construct($channel1, $channel2, $tone = false)
    {
        parent::__construct('Bridge');
        $this->setKey('Channel1', $channel1);
        $this->setKey('Channel2', $channel2);
        $this->setKey('Tone', $tone ? 'true' : 'false');
    }
}