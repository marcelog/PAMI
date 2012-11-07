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
 * DBGet action message.
 */
class DBGetAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $family Family
     * @param string $key    Name
     */
    public function __construct($family, $key)
    {
        parent::__construct('DBGet');

        $this->setKey('Family', $family);
        $this->setKey('Key', $key);
    }
}
