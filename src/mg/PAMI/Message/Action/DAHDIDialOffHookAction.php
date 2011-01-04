<?php
/**
 * DAHDIDiallOffhook action message.
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
 * DAHDIDiallOffhook action message.
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
class DAHDIDialOffHookAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct($channel, $number)
    {
        parent::__construct('DAHDIDialOffhook');
        $this->setKey('DAHDIChannel', $channel);
        $this->setKey('Number', $number);
    }
}