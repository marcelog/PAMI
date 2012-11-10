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
 * SetVar action message.
 */
class SetVarAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $name    Variable name
     * @param string $value   Variable value
     * @param string $channel Optional channel name
     */
    public function __construct($name, $value, $channel = false)
    {
        parent::__construct('Setvar');

        $this->setKey('Variable', $name);
        $this->setKey('Value', $value);

        if ($channel != false) {
            $this->setKey('Channel', $channel);
        }
    }
}
