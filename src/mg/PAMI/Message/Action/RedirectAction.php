<?php
/**
 * Redirect action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2011 Marcelo Gornstein <marcelog@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */
namespace PAMI\Message\Action;

/**
 * Redirect action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class RedirectAction extends ActionMessage
{
    /**
     * Sets key ExtraChannel.
     *
     * @param string $channel Second call leg to transfer (optional).
     *
     * @return void
     */
    public function setExtraChannel($channel)
    {
        $this->setKey('ExtraChannel', $channel);
    }

    /**
     * Sets key ExtraExten.
     *
     * @param string $extension Extension to transfer extrachannel to (optional).
     *
     * @return void
     */
    public function setExtraExtension($extension)
    {
        $this->setKey('ExtraExten', $extension);
    }

    /**
     * Sets key ExtraContext.
     *
     * @param string $context Context to transfer extrachannel to (optional).
     *
     * @return void
     */
    public function setExtraContext($context)
    {
        $this->setKey('ExtraContext', $context);
    }

    /**
     * Sets key ExtraPriority.
     *
     * @param string $priority Priority to transfer extrachannel to (optional).
     *
     * @return void
     */
    public function setExtraPriority($priority)
    {
        $this->setKey('ExtraPriority', $priority);
    }

    /**
     * Constructor.
     *
     * @param string $channel   Channel to redirect.
     * @param string $extension Extension to transfer to.
     * @param string $context   Context to transfer to.
     * @param string $priority  Priority to transfer to.
     *
     * @return void
     */
    public function __construct($channel, $extension, $context, $priority)
    {
        parent::__construct('Redirect');
        $this->setKey('Channel', $channel);
        $this->setKey('Exten', $extension);
        $this->setKey('Context', $context);
        $this->setKey('Priority', $priority);
    }
}