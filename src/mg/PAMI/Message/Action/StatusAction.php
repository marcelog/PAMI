<?php
/**
 * Queries for the status of a channel or all channels if none specified.
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
 * Queries for the status of a channel or all channels if none specified.
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
class StatusAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Channel to query (optional)
     * 
     * @return void
     */
    public function __construct($channel = false)
    {
        parent::__construct('Status');
        if (!$channel) {
            $this->setKey('Channel', $channel);
        }
    }
}