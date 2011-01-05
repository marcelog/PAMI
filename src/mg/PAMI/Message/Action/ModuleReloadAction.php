<?php
/**
 * ModuleReload action message.
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
 * ModuleReload action message.
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
class ModuleReloadAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $module - Asterisk module name (including.so extension) or
     * subsystem identifier:
     * cdr
     * enum
     * dnsmgr
     * extconfig
     * manager
     * rtp
     * http Module name.
     *
     * @return void
     */
    public function __construct($module)
    {
        parent::__construct('ModuleLoad');
        $this->setKey('Module', $module);
        $this->setKey('LoadType', 'reload');
    }
}