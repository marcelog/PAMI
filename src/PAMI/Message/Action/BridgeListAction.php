<?php
/**
 * BridgeList action message.
 *
 * PHP Version 5
 *
 * Get a list of bridges in the system.
 * Returns a list of bridges, optionally filtering on a bridge type.
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
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
 */
namespace PAMI\Message\Action;

/**
 * BridgeList action message.
 *
 * Get a list of bridges in the system.
 * Returns a list of bridges, optionally filtering on a bridge type.
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 */
class BridgeListAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string|bool $bridgeType Optional type for filtering the resulting list of bridges.
     * @param string $actionId ActionID for this transaction. Will be returned.
     */
    public function __construct($bridgeType = false, $actionId = '')
    {
        parent::__construct('BridgeList');
        if (false !== $bridgeType) {
            $this->setKey('BridgeType', $bridgeType);
        }
    }
}
