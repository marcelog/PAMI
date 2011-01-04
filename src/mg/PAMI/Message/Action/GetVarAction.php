<?php
/**
 * GetVar action message.
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
 * GetVar action message.
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
class GetVarAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $name    Variable name.
     * @param string $channel Optional channel name.
     * 
     * @return void
     */
    public function __construct($name, $channel = false)
    {
        parent::__construct('Getvar');
        $this->setKey('Variable', $name);
        if ($channel != false) {
            $this->setKey('Channel', $channel);
        }
    }
}