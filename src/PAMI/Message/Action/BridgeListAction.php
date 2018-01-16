<?php

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
