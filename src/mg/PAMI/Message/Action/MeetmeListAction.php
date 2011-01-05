<?php
/**
 * MeetmeList action message.
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
 * MeetmeList action message.
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
class MeetmeListAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $conference Conference number.
     *
     * @return void
     */
    public function __construct($conference)
    {
        parent::__construct('MeetmeList');
        $this->setKey('Conference', $conference);
    }
}