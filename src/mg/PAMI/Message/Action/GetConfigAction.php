<?php
/**
 * GetConfig action message.
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
 * GetConfig action message.
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
class GetConfigAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $filename Configuration filename (e.g.: foo.conf).
     * @param boolean $category Category in configuration file.
     * 
     * @return void
     */
    public function __construct($filename, $category = false)
    {
        parent::__construct('GetConfig');
        $this->setKey('Filename', $filename);
        if ($category != false) {
            $this->setKey('Category', $category);
        }
    }
}