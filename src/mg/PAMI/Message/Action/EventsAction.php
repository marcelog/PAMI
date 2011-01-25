<?php
/**
 * Events action message.
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
 * Events action message.
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
class EventsAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string[] $mask Asterisk events to handle (system, call, log, etc).
     *
     * @return void
     */
    public function __construct(array $mask = array())
    {
        parent::__construct('Events');
        if (empty($mask)) {
            $this->setKey('EventMask', 'off');
        } else {
            $this->setKey('EventMask', implode(',', $mask));
        }
    }
}