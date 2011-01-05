<?php
/**
 * Extension action message.
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
 * Extension action message.
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
class ExtensionStateAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $exten   Extension to check for.
     * @param string $context Context for extension.
     *
     * @return void
     */
    public function __construct($exten, $context)
    {
        parent::__construct('ExtensionState');
        $this->setKey('Exten', $exten);
        $this->setKey('Context', $context);
    }
}