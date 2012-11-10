<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Action;

/**
 * MeetmeMute action message.
 */
class MeetmeMuteAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $conference Conference number
     * @param string $user       User
     */
    public function __construct($conference, $user)
    {
        parent::__construct('MeetmeMute');

        $this->setKey('Meetme', $conference);
        $this->setKey('Usernum', $user);
    }
}
