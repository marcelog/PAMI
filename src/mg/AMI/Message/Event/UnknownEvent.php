<?php
/**
 * This is an unknown (not implemented yet) event received from ami.
 *
 * PHP Version 5
 *
 * @category   Ami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace AMI\Message\Event;

use AMI\Message\IncomingMessage;

/**
 * This is an unknown (not implemented yet) event received from ami.
 *
 * PHP Version 5
 *
 * @category   Ami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class UnknownEvent extends EventMessage
{
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
    }
}
