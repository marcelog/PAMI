<?php
/**
 * Atxfer action message.
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
 * Atxfer action message.
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
class AttendedTransferAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel   Transferer's channel.
     * @param string $extension Extension to transfer to.
     * @param string $context   Context to transfer to.
     * @param string $priority  Priority to transfer to.
     * 
     * @return void
     */
    public function __construct($channel, $extension, $context, $priority)
    {
        parent::__construct('Atxfer');
        $this->setKey('Channel', $channel);
        $this->setKey('Exten', $extension);
        $this->setKey('Context', $context);
        $this->setKey('Priority', $priority);
    }
}