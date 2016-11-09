<?php
/**
 * Event triggered when a call is unparked.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
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
namespace PAMI\Message\Event;

/**
 * Event triggered when a call is unparked.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class UnParkedCallEvent extends EventMessage
{
    /**
     * Returns key: 'Privilege'.
     *
     * @return string
     */
    public function getPrivilege()
    {
        return $this->getKey('Privilege');
    }

    /**
     * Returns key: 'Parkinglot'.
     *
     * @return string
     */
    public function getParkinglot()
    {
        return $this->getKey('Parkinglot');
    }

    /**
     * Returns key: 'From'.
     * @deprecated Deprecated since Asterisk 12. {@use getRetrieverChannel()}.
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->getRetrieverChannel();
    }

    /**
     * Returns key: 'Timeout'.
     * @deprecated Deprecated since Asterisk 12. {@use ParkingTimeout()}.
     *
     * @return string
     */
    public function getTimeout()
    {
        return $this->getParkingTimeout();
    }

    /**
     * Returns key: 'ConnectedLineNum'.
     * @deprecated Deprecated since Asterisk 12. {@use getParkeeConnectedLineNum()}.
     *
     * @return string
     */
    public function getConnectedLineNum()
    {
        return $this->getParkeeConnectedLineNum();
    }

    /**
     * Returns key: 'ConnectedLineName'.
     * @deprecated Deprecated since Asterisk 12. {@use getParkeeConnectedLineName()}.
     *
     * @return string
     */
    public function getConnectedLineName()
    {
        return $this->getParkeeConnectedLineName();
    }

    /**
     * Returns key: 'Channel'.
     * @deprecated Deprecated since Asterisk 12. {@use getParkeeChannel()}.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getParkeeChannel();
    }

    /**
     * Returns key: 'CallerIDNum'.
     * @deprecated Deprecated since Asterisk 12. {@use getParkeeCallerIDNum()}.
     *
     * @return string
     */
    public function getCallerIDNum()
    {
        return $this->getParkeeCallerIDNum();
    }

    /**
     * Returns key: 'CallerIDName'.
     * @deprecated Deprecated since Asterisk 12. {@use getParkeeCallerIDName()}.
     *
     * @return string
     */
    public function getCallerIDName()
    {
        return $this->getParkeeCallerIDName();
    }

    /**
     * Returns key: 'UniqueID'.
     * @deprecated Deprecated since Asterisk 12. {@use getParkeeUniqueid()}.
     *
     * @return string
     */
    public function getUniqueID()
    {
        return $this->getParkeeUniqueid();
    }

    /**
     * Returns key: 'Exten'.
     * @deprecated Deprecated since Asterisk 12. {@use getParkingSpace()}.
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->getParkingSpace();
    }

    /**
     * Returns key: 'ParkeeChannel'.
     *
     * @return string
     */
    public function getParkeeChannel()
    {
        return $this->getKey('ParkeeChannel') ?: $this->getKey('Channel');
    }

    /**
     * Returns key: 'ParkeeChannelState'.
     *
     * @return string
     */
    public function getParkeeChannelState()
    {
        return $this->getKey('ParkeeChannelState');
    }

    /**
     * Returns key: 'ParkeeChannelStateDesc'.
     *
     * @return string
     */
    public function getParkeeChannelStateDesc()
    {
        return $this->getKey('ParkeeChannelStateDesc');
    }

    /**
     * Returns key: 'ParkeeCallerIDNum'.
     *
     * @return string
     */
    public function getParkeeCallerIDNum()
    {
        return $this->getKey('ParkeeCallerIDNum') ?: $this->getKey('CallerIDNum');
    }

    /**
     * Returns key: 'ParkeeCallerIDName'.
     *
     * @return string
     */
    public function getParkeeCallerIDName()
    {
        return $this->getKey('ParkeeCallerIDName') ?: $this->getKey('CallerIDName');
    }

    /**
     * Returns key: 'ParkeeConnectedLineNum'.
     *
     * @return string
     */
    public function getParkeeConnectedLineNum()
    {
        return $this->getKey('ParkeeConnectedLineNum') ?: $this->getKey('ConnectedLineNum');
    }

    /**
     * Returns key: 'ParkeeConnectedLineName'.
     *
     * @return string
     */
    public function getParkeeConnectedLineName()
    {
        return $this->getKey('ParkeeConnectedLineName') ?: $this->getKey('ConnectedLineName');
    }

    /**
     * Returns key: 'ParkeeAccountCode'.
     *
     * @return string
     */
    public function getParkeeAccountCode()
    {
        return $this->getKey('ParkeeAccountCode');
    }

    /**
     * Returns key: 'ParkeeContext'.
     *
     * @return string
     */
    public function getParkeeContext()
    {
        return $this->getKey('ParkeeContext');
    }

    /**
     * Returns key: 'ParkeeExten'.
     *
     * @return string
     */
    public function getParkeeExten()
    {
        return $this->getKey('ParkeeExten');
    }

    /**
     * Returns key: 'ParkeePriority'.
     *
     * @return string
     */
    public function getParkeePriority()
    {
        return $this->getKey('ParkeePriority');
    }

    /**
     * Returns key: 'ParkeeUniqueid'.
     *
     * @return string
     */
    public function getParkeeUniqueid()
    {
        return $this->getKey('ParkeeUniqueid') ?: $this->getKey('UniqueId');
    }

    /**
     * Returns key: 'ParkerDialString'.
     *
     * @return string
     */
    public function getParkerDialString()
    {
        return $this->getKey('ParkerDialString');
    }

    /**
     * Returns key: 'ParkingSpace'.
     *
     * @return string
     */
    public function getParkingSpace()
    {
        return $this->getKey('ParkingSpace') ?: $this->getKey('Exten');
    }

    /**
     * Returns key: 'ParkingTimeout'.
     *
     * @return string
     */
    public function getParkingTimeout()
    {
        return $this->getKey('ParkingTimeout') ?: $this->getKey('Timeout');
    }

    /**
     * Returns key: 'ParkingDuration'.
     *
     * @return string
     */
    public function getParkingDuration()
    {
        return $this->getKey('ParkingDuration');
    }

    /**
     * Returns key: 'ParkerChannel'.
     *
     * @return string
     */
    public function getParkerChannel()
    {
        return $this->getKey('ParkerChannel');
    }

    /**
     * Returns key: 'ParkerChannelState'.
     *
     * @return string
     */
    public function getParkerChannelState()
    {
        return $this->getKey('ParkerChannelState');
    }

    /**
     * Returns key: 'ParkerChannelStateDesc'.
     *
     * @return string
     */
    public function getParkerChannelStateDesc()
    {
        return $this->getKey('ParkerChannelStateDesc');
    }

    /**
     * Returns key: 'ParkerCallerIDNum'.
     *
     * @return string
     */
    public function getParkerCallerIDNum()
    {
        return $this->getKey('ParkerCallerIDNum');
    }

    /**
     * Returns key: 'ParkerCallerIDName'.
     *
     * @return string
     */
    public function getParkerCallerIDName()
    {
        return $this->getKey('ParkerCallerIDName');
    }

    /**
     * Returns key: 'ParkerConnectedLineNum'.
     *
     * @return string
     */
    public function getParkerConnectedLineNum()
    {
        return $this->getKey('ParkerConnectedLineNum');
    }

    /**
     * Returns key: 'ParkerConnectedLineName'.
     *
     * @return string
     */
    public function getParkerConnectedLineName()
    {
        return $this->getKey('ParkerConnectedLineName');
    }

    /**
     * Returns key: 'ParkerAccountCode'.
     *
     * @return string
     */
    public function getParkerAccountCode()
    {
        return $this->getKey('ParkerAccountCode');
    }

    /**
     * Returns key: 'ParkerContext'.
     *
     * @return string
     */
    public function getParkerContext()
    {
        return $this->getKey('ParkerContext');
    }

    /**
     * Returns key: 'ParkerExten'.
     *
     * @return string
     */
    public function getParkerExten()
    {
        return $this->getKey('ParkerExten');
    }

    /**
     * Returns key: 'ParkerPriority'.
     *
     * @return string
     */
    public function getParkerPriority()
    {
        return $this->getKey('ParkerPriority');
    }

    /**
     * Returns key: 'ParkerUniqueid'.
     *
     * @return string
     */
    public function getParkerUniqueid()
    {
        return $this->getKey('ParkerUniqueid');
    }

    /**
     * Returns key: 'RetrieverChannel'.
     *
     * @return string
     */
    public function getRetrieverChannel()
    {
        return $this->getKey('RetrieverChannel') ?: $this->getKey('From');
    }

    /**
     * Returns key: 'RetrieverChannelState'.
     *
     * @return string
     */
    public function getRetrieverChannelState()
    {
        return $this->getKey('RetrieverChannelState');
    }

    /**
     * Returns key: 'RetrieverChannelStateDesc'.
     *
     * @return string
     */
    public function getRetrieverChannelStateDesc()
    {
        return $this->getKey('RetrieverChannelStateDesc');
    }

    /**
     * Returns key: 'RetrieverCallerIDNum'.
     *
     * @return string
     */
    public function getRetrieverCallerIDNum()
    {
        return $this->getKey('RetrieverCallerIDNum');
    }

    /**
     * Returns key: 'RetrieverCallerIDName'.
     *
     * @return string
     */
    public function getRetrieverCallerIDName()
    {
        return $this->getKey('RetrieverCallerIDName');
    }

    /**
     * Returns key: 'RetrieverConnectedLineNum'.
     *
     * @return string
     */
    public function getRetrieverConnectedLineNum()
    {
        return $this->getKey('RetrieverConnectedLineNum');
    }

    /**
     * Returns key: 'RetrieverConnectedLineName'.
     *
     * @return string
     */
    public function getRetrieverConnectedLineName()
    {
        return $this->getKey('RetrieverConnectedLineName');
    }

    /**
     * Returns key: 'RetrieverAccountCode'.
     *
     * @return string
     */
    public function getRetrieverAccountCode()
    {
        return $this->getKey('RetrieverAccountCode');
    }

    /**
     * Returns key: 'RetrieverContext'.
     *
     * @return string
     */
    public function getRetrieverContext()
    {
        return $this->getKey('RetrieverContext');
    }

    /**
     * Returns key: 'RetrieverExten'.
     *
     * @return string
     */
    public function getRetrieverExten()
    {
        return $this->getKey('RetrieverExten');
    }

    /**
     * Returns key: 'RetrieverPriority'.
     *
     * @return string
     */
    public function getRetrieverPriority()
    {
        return $this->getKey('RetrieverPriority');
    }

    /**
     * Returns key: 'RetrieverUniqueid'.
     *
     * @return string
     */
    public function getRetrieverUniqueid()
    {
        return $this->getKey('RetrieverUniqueid');
    }
}
