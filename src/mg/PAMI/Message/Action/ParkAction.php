<?php
/**
 * Park action message.
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
 * Park action message.
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
class ParkAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $channel1 Channel name to park.
     * @param string  $channel2 Channel to announce park info to (and return to if timeout).
     * @param integer $timeout  Number of milliseconds to wait before callback.
     * @param string  $lot      Parking lot to park channel in.
     *
     * @return void
     */
    public function __construct($channel1, $channel2, $timeout = false, $lot = false)
    {
        parent::__construct('Park');
        $this->setKey('Channel', $channel1);
        $this->setKey('Channel2', $channel2);
        if ($timeout != false) {
            $this->setKey('Timeout ', $timeout);
        }
        if ($lot != false) {
            $this->setKey('Parkinglot ', $lot);
        }
    }
}