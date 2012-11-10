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
 * ExtensionState action message.
 */
class ExtensionStateAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $exten   Extension to check for
     * @param string $context Context for extension
     */
    public function __construct($exten, $context)
    {
        parent::__construct('ExtensionState');

        $this->setKey('Exten', $exten);
        $this->setKey('Context', $context);
    }
}
