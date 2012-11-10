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
 * ModuleReload action message.
 */
class ModuleReloadAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $module Asterisk module name (including.so extension) or
     *                       subsystem identifier:
     *                       - cdr
     *                       - enum
     *                       - dnsmgr
     *                       - extconfig
     *                       - manager
     *                       - rtp
     *                       - http Module name
     */
    public function __construct($module)
    {
        parent::__construct('ModuleLoad');

        $this->setKey('Module', $module);
        $this->setKey('LoadType', 'reload');
    }
}
