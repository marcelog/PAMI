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
 * MeetmeList action message.
 */
class MeetmeListAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $conference Conference number
     */
    public function __construct($conference)
    {
        parent::__construct('MeetmeList');

        $this->setKey('Conference', $conference);
    }
}
