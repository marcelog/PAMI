<?php
/**
 * This is a generic event received from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Message\Event;

use PAMI\Message\IncomingMessage;

/**
 * This is a generic event received from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
abstract class EventMessage extends IncomingMessage
{
    public function getName()
    {
        return $this->getKey('Event');
    }
    
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
    }
}
