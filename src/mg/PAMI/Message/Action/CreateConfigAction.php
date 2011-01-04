<?php
/**
 * CreateConfig action message.
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
 * CreateConfig action message.
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
class CreateConfigAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $filename Configuration filename (e.g.: foo.conf).
     * 
     * @return void
     */
    public function __construct($filename)
    {
        parent::__construct('CreateConfig');
        $this->setKey('Filename', $filename);
    }
}