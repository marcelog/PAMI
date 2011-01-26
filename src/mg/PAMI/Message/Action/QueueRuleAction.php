<?php
/**
 * QueueRule action message.
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
 * QueueRule action message.
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
class QueueRuleAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $rule Rule.
     *
     * @return void
     */
    public function __construct($rule = false)
    {
        parent::__construct('QueueRule');
        if ($rule !== false) {
            $this->setKey('Rule', $rule);
        }
    }
}