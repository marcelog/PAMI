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
 * ShowDialPlan action message.
 */
class ShowDialPlanAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $context   Show a specific context (optional)
     * @param string $extension Show a specific extension (optional)
     */
    public function __construct($context = false, $extension = false)
    {
        parent::__construct('ShowDialPlan');

        if ($context != false) {
            $this->setKey('Context', $context);
        }

        if ($extension != false) {
            $this->setKey('Extension', $extension);
        }
    }
}
