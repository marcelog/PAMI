<?php
/**
 * QueueReload action message.
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
 * QueueReload action message.
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
class QueueReloadAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param boolean $queue      Queue name.
     * @param boolean $members    Reload members.
     * @param boolean $rules      Reload rules.
     * @param boolean $parameters Reload parameters.
     *
     * @return void
     */
    public function __construct(
        $queue = false, $members = false, $rules = false, $parameters = false
    ) {
        parent::__construct('QueueReload');
        if ($queue !== false) {
            $this->setKey('Queue', $queue);
        }
        $this->setKey('Members', $members ? 'yes' : 'no');
        $this->setKey('Rules', $rules ? 'yes' : 'no');
        $this->setKey('Parameters', $parameters ? 'yes' : 'no');
    }
}