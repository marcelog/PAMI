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
 * Redirect action message.
 */
class RedirectAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel   Channel to redirect
     * @param string $extension Extension to transfer to
     * @param string $context   Context to transfer to
     * @param string $priority  Priority to transfer to
     */
    public function __construct($channel, $extension, $context, $priority)
    {
        parent::__construct('Redirect');
        $this->setKey('Channel', $channel);
        $this->setKey('Exten', $extension);
        $this->setKey('Context', $context);
        $this->setKey('Priority', $priority);
    }

    /**
     * Sets key ExtraChannel.
     *
     * @param string $channel Second call leg to transfer (optional)
     */
    public function setExtraChannel($channel)
    {
        $this->setKey('ExtraChannel', $channel);
    }

    /**
     * Sets key ExtraExten.
     *
     * @param string $extension Extension to transfer extrachannel to (optional)
     */
    public function setExtraExtension($extension)
    {
        $this->setKey('ExtraExten', $extension);
    }

    /**
     * Sets key ExtraContext.
     *
     * @param string $context Context to transfer extrachannel to (optional)
     */
    public function setExtraContext($context)
    {
        $this->setKey('ExtraContext', $context);
    }

    /**
     * Sets key ExtraPriority.
     *
     * @param string $priority Priority to transfer extrachannel to (optional)
     */
    public function setExtraPriority($priority)
    {
        $this->setKey('ExtraPriority', $priority);
    }
}
