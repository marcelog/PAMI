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
 * Reload action message.
 */
class ReloadAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $module Optional module name
     */
    public function __construct($module = false)
    {
        parent::__construct('Reload');

        if ($module !== false) {
            $this->setKey('Module', $module);
        }
    }
}
