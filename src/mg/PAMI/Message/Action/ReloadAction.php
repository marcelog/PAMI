<?php
/**
 * Reload action message.
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
 * Reload action message.
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
class ReloadAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $module Optional module name.
     * 
     * @return void
     */
    public function __construct($module = false)
    {
        parent::__construct('Reload');
        if ($module !== false) {
            $this->setKey('Module', $module);
        }
    }
}