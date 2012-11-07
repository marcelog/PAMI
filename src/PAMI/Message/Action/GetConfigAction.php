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
 * GetConfig action message.
 */
class GetConfigAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $filename Configuration filename (e.g.: foo.conf)
     * @param Boolean $category Category in configuration file
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
