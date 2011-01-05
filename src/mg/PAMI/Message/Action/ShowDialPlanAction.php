<?php
/**
 * ShowDialPlan action message.
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
 * ShowDialPlan action message.
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
class ShowDialPlanAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $context   Show a specific context (optional)
     * @param string $extension Show a specific extension (optional)
     *
     * @return void
     */
    public function __construct($context = false, $extension = false)
    {
        parent::__construct('ShowDialPlan');
        if ($context != false) {
            $this->setKey('Context', $context);
        }
        if ($extension != false) {
            $this->setKey('Extension', $extension);
        }
    }
}