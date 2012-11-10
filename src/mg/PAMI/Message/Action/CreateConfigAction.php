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
 * CreateConfig action message.
 */
class CreateConfigAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $filename Configuration filename (e.g.: foo.conf)
     */
    public function __construct($filename)
    {
        parent::__construct('CreateConfig');

        $this->setKey('Filename', $filename);
    }
}
