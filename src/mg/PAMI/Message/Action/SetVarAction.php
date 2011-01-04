<?php
/**
 * SetVar action message.
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
 * SetVar action message.
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
class SetVarAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $name    Variable name.
     * @param string $value   Variable value.
     * @param string $channel Optional channel name.
     * 
     * @return void
     */
    public function __construct($name, $value, $channel = false)
    {
        parent::__construct('Setvar');
        $this->setKey('Variable', $name);
        $this->setKey('Value', $value);
        if ($channel != false) {
            $this->setKey('Channel', $channel);
        }
    }
}