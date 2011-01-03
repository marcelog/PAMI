<?php
/**
 * Login action message.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://www.noneyet.ar/
 */
namespace PAMI\Message\Action;

/**
 * Login action message.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @link     http://www.noneyet.ar/
 */
class LoginAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $what Action command.
     * 
     * @return void
     */
    public function __construct($user, $password)
    {
        parent::__construct('Login');
        $this->setKey('Username', $user);
        $this->setKey('Secret', $password);
    }
}