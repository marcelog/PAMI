<?php
/**
 * DBDelTree action message.
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
 * DBDelTree action message.
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
class DBDelTreeAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $family Family.
     * @param string $key    Name (optional)
     * 
     * @return void
     */
    public function __construct($family, $key = false)
    {
        parent::__construct('DBDel');
        $this->setKey('Family', $family);
        if ($key != false) {
            $this->setKey('Key', $key);
        }
    }
}