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
 * ModuleCheck action message.
 */
class ModuleCheckAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $module Module name
     */
    public function __construct($module)
    {
        parent::__construct('ModuleCheck');

        $this->setKey('Module', $module);
    }
}
