<?php
/**
 * MeetmeUnmute action message.
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
 * MeetmeUnmute action message.
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
class MeetmeUnmuteAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $conference Conference number.
     * @param string $user       User.
     *
     * @return void
     */
    public function __construct($conference, $user)
    {
        parent::__construct('MeetmeUnmute');
        $this->setKey('Meetme', $conference);
        $this->setKey('Usernum', $user);
    }
}