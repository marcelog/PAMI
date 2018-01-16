<?php

namespace PAMI\Message\Event;


class BridgeListItemEvent extends EventMessage
{

    /**
     * Returns key: 'BridgeUniqueid'.
     *
     * @return string
     */
    public function getBridgeUniqueid()
    {
        return $this->getKey('BridgeUniqueid');
    }

    /**
     * Returns key: 'BridgeType'.
     *
     * @return string
     */
    public function getBridgeType()
    {
        return $this->getKey('BridgeType');
    }

    /**
     * Returns key: 'BridgeTechnology'.
     *
     * @return string
     */
    public function getBridgeTechnology()
    {
        return $this->getKey('BridgeTechnology');
    }

    /**
     * Returns key: 'BridgeCreator'.
     *
     * @return string
     */
    public function getBridgeCreator()
    {
        return $this->getKey('BridgeCreator');
    }

    /**
     * Returns key: 'BridgeName'.
     *
     * @return string
     */
    public function getBridgeName()
    {
        return $this->getKey('BridgeName');
    }

    /**
     * Returns key: 'BridgeNumChannels'.
     *
     * @return string
     */
    public function getBridgeNumChannels()
    {
        return $this->getKey('BridgeNumChannels');
    }

    /**
     * Returns key: 'BridgeNumChannels'.
     *
     * @return string
     */
    public function getBridgeVideoSourceMode()
    {
        return $this->getKey('BridgeVideoSourceMode');
    }
}