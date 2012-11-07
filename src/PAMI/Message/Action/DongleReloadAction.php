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
 * Reload a dongle.
 */
class DongleReloadAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $when now | gracefully | when convenient
     */
    public function __construct($when)
    {
        parent::__construct('DongleReload');

        $this->setKey('when', $when);
    }
}
