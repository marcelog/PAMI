<?php
/**
 * DBPut action message.
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
 * DBPut action message.
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
class DBPutAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $family Family.
     * @param string $key    Name.
     * @param string $value  Value.
     * 
     * @return void
     */
    public function __construct($family, $key, $value)
    {
        parent::__construct('DBGet');
        $this->setKey('Family', $family);
        $this->setKey('Key', $key);
        $this->setKey('Val', $value);
    }
}