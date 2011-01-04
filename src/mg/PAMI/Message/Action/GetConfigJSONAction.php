<?php
/**
 * GetConfigJSON action message.
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
 * GetConfigJSON action message.
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
class GetConfigJSONAction extends ActionMessage
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
        parent::__construct('GetConfigJSON');
        $this->setKey('Filename', $filename);
    }
}