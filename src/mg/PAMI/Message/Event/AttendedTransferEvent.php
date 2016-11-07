<?php
/**
 * Event triggered when a call is transfered.
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
 * Event triggered when an attended transfer is complete.
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
class AttendedTransferEvent extends EventMessage
{
    const RESULT_FAIL = 'Fail';
    const RESULT_INVALID = 'Invalid';
    const RESULT_NOT_PERMITTED = 'Not Permitted';
    const RESULT_SUCCESS = 'Success';

    /**
     * Returns key: 'Result'.
     * Result - Indicates if the transfer was successful or if it failed.
     *
     * - Fail - An internal error occurred.
     * - Invalid - Invalid configuration for transfer (e.g. Not bridged)
     * - Not Permitted - Bridge does not permit transfers
     * - Success - Transfer completed successfully
     *
     * @return string
     */
    public function getResult()
    {
        return $this->getKey('Result');
    }

    /**
     * Returns key: 'OrigTransfererChannel'.
     *
     * @return string
     */
    public function getOrigTransfererChannel()
    {
        return $this->getKey('OrigTransfererChannel');
    }

    /**
     * Returns key: 'OrigTransfererChannelState'.
     *
     * @return string
     */
    public function getOrigTransfererChannelState()
    {
        return $this->getKey('OrigTransfererChannelState');
    }

    /**
     * Returns key: 'OrigTransfererChannelStateDesc'.
     *
     * Down
     * Rsrvd
     * OffHook
     * Dialing
     * Ring
     * Ringing
     * Up
     * Busy
     * Dialing Offhook
     * Pre-ring
     * Unknown
     *
     * @return string
     */
    public function getOrigTransfererChannelStateDesc()
    {
        return $this->getKey('OrigTransfererChannelStateDesc');
    }

    /**
     * Returns key: 'OrigTransfererCallerIDNum'.
     *
     * @return string
     */
    public function getOrigTransfererCallerIDNum()
    {
        return $this->getKey('OrigTransfererCallerIDNum');
    }

    /**
     * Returns key: 'OrigTransfererCallerIDName'.
     *
     * @return string
     */
    public function getOrigTransfererCallerIDName()
    {
        return $this->getKey('OrigTransfererCallerIDName');
    }

    /**
     * Returns key: 'OrigTransfererConnectedLineNum'.
     *
     * @return string
     */
    public function getOrigTransfererConnectedLineNum()
    {
        return $this->getKey('OrigTransfererConnectedLineNum');
    }

    /**
     * Returns key: 'OrigTransfererConnectedLineName'.
     *
     * @return string
     */
    public function getOrigTransfererConnectedLineName()
    {
        return $this->getKey('OrigTransfererConnectedLineName');
    }

    /**
     * Returns key: 'OrigTransfererAccountCode'.
     *
     * @return string
     */
    public function getOrigTransfererAccountCode()
    {
        return $this->getKey('OrigTransfererAccountCode');
    }

    /**
     * Returns key: 'OrigTransfererContext'.
     *
     * @return string
     */
    public function getOrigTransfererContext()
    {
        return $this->getKey('OrigTransfererContext');
    }

    /**
     * Returns key: 'OrigTransfererExten'.
     *
     * @return string
     */
    public function getOrigTransfererExten()
    {
        return $this->getKey('OrigTransfererExten');
    }

    /**
     * Returns key: 'OrigTransfererPriority'.
     *
     * @return string
     */
    public function getOrigTransfererPriority()
    {
        return $this->getKey('OrigTransfererPriority');
    }

    /**
     * Returns key: 'OrigTransfererUniqueid'.
     *
     * @return string
     */
    public function getOrigTransfererUniqueid()
    {
        return $this->getKey('OrigTransfererUniqueid');
    }

    /**
     * Returns key: 'OrigBridgeUniqueid'.
     *
     * @return string
     */
    public function getOrigBridgeUniqueid()
    {
        return $this->getKey('OrigBridgeUniqueid');
    }

    /**
     * Returns key: 'OrigBridgeType'.
     *
     * @return string
     */
    public function getOrigBridgeType()
    {
        return $this->getKey('OrigBridgeType');
    }

    /**
     * Returns key: 'OrigBridgeTechnology'.
     *
     * @return string
     */
    public function getOrigBridgeTechnology()
    {
        return $this->getKey('OrigBridgeTechnology');
    }

    /**
     * Returns key: 'OrigBridgeCreator'.
     *
     * @return string
     */
    public function getOrigBridgeCreator()
    {
        return $this->getKey('OrigBridgeCreator');
    }

    /**
     * Returns key: 'OrigBridgeName'.
     *
     * @return string
     */
    public function getOrigBridgeName()
    {
        return $this->getKey('OrigBridgeName');
    }

    /**
     * Returns key: 'OrigBridgeNumChannels'.
     *
     * @return string
     */
    public function getOrigBridgeNumChannels()
    {
        return $this->getKey('OrigBridgeNumChannels');
    }

    /**
     * Returns key: 'SecondTransfererChannel'.
     *
     * @return string
     */
    public function getSecondTransfererChannel()
    {
        return $this->getKey('SecondTransfererChannel');
    }

    /**
     * Returns key: 'SecondTransfererChannelState'.
     *
     * @return string
     */
    public function getSecondTransfererChannelState()
    {
        return $this->getKey('SecondTransfererChannelState');
    }

    /**
     * Returns key: 'SecondTransfererChannelStateDesc'.
     *
     * Down
     * Rsrvd
     * OffHook
     * Dialing
     * Ring
     * Ringing
     * Up
     * Busy
     * Dialing Offhook
     * Pre-ring
     * Unknown
     *
     * @return string
     */
    public function getSecondTransfererChannelStateDesc()
    {
        return $this->getKey('SecondTransfererChannelStateDesc');
    }

    /**
     * Returns key: 'SecondTransfererCallerIDNum'.
     *
     * @return string
     */
    public function getSecondTransfererCallerIDNum()
    {
        return $this->getKey('SecondTransfererCallerIDNum');
    }

    /**
     * Returns key: 'SecondTransfererCallerIDName'.
     *
     * @return string
     */
    public function getSecondTransfererCallerIDName()
    {
        return $this->getKey('SecondTransfererCallerIDName');
    }

    /**
     * Returns key: 'SecondTransfererConnectedLineNum'.
     *
     * @return string
     */
    public function getSecondTransfererConnectedLineNum()
    {
        return $this->getKey('SecondTransfererConnectedLineNum');
    }

    /**
     * Returns key: 'SecondTransfererConnectedLineName'.
     *
     * @return string
     */
    public function getSecondTransfererConnectedLineName()
    {
        return $this->getKey('SecondTransfererConnectedLineName');
    }

    /**
     * Returns key: 'SecondTransfererAccountCode'.
     *
     * @return string
     */
    public function getSecondTransfererAccountCode()
    {
        return $this->getKey('SecondTransfererAccountCode');
    }

    /**
     * Returns key: 'SecondTransfererContext'.
     *
     * @return string
     */
    public function getSecondTransfererContext()
    {
        return $this->getKey('SecondTransfererContext');
    }

    /**
     * Returns key: 'SecondTransfererExten'.
     *
     * @return string
     */
    public function getSecondTransfererExten()
    {
        return $this->getKey('SecondTransfererExten');
    }

    /**
     * Returns key: 'SecondTransfererPriority'.
     *
     * @return string
     */
    public function getSecondTransfererPriority()
    {
        return $this->getKey('SecondTransfererPriority');
    }

    /**
     * Returns key: 'SecondTransfererUniqueid'.
     *
     * @return string
     */
    public function getSecondTransfererUniqueid()
    {
        return $this->getKey('SecondTransfererUniqueid');
    }

    /**
     * Returns key: 'SecondBridgeUniqueid'.
     *
     * @return string
     */
    public function getSecondBridgeUniqueid()
    {
        return $this->getKey('SecondBridgeUniqueid');
    }

    /**
     * Returns key: 'SecondBridgeType'.
     *
     * @return string
     */
    public function getSecondBridgeType()
    {
        return $this->getKey('SecondBridgeType');
    }

    /**
     * Returns key: 'SecondBridgeTechnology'.
     *
     * @return string
     */
    public function getSecondBridgeTechnology()
    {
        return $this->getKey('SecondBridgeTechnology');
    }

    /**
     * Returns key: 'SecondBridgeCreator'.
     *
     * @return string
     */
    public function getSecondBridgeCreator()
    {
        return $this->getKey('SecondBridgeCreator');
    }

    /**
     * Returns key: 'SecondBridgeName'.
     *
     * @return string
     */
    public function getSecondBridgeName()
    {
        return $this->getKey('SecondBridgeName');
    }

    /**
     * Returns key: 'SecondBridgeNumChannels'.
     *
     * @return string
     */
    public function getSecondBridgeNumChannels()
    {
        return $this->getKey('SecondBridgeNumChannels');
    }

    /**
     * Returns key: 'DestType'.
     * DestType - Indicates the method by which the attended transfer completed.
     *
     * Bridge - The transfer was accomplished by merging two bridges into one.
     * App - The transfer was accomplished by having a channel or bridge run a dialplan application.
     * Link - The transfer was accomplished by linking two bridges together using a local channel pair.
     * Threeway - The transfer was accomplished by placing all parties into a threeway call.
     * Fail - The transfer failed.
     *
     * @return string
     */
    public function getDestType()
    {
        return $this->getKey('DestType');
    }

    /**
     * Returns key: 'DestBridgeUniqueid'.
     *
     * @return string
     */
    public function getDestBridgeUniqueid()
    {
        return $this->getKey('DestBridgeUniqueid');
    }

    /**
     * Returns key: 'DestApp'.
     *
     * @return string
     */
    public function getDestApp()
    {
        return $this->getKey('DestApp');
    }

    /**
     * Returns key: 'LocalOneChannel'.
     *
     * @return string
     */
    public function getLocalOneChannel()
    {
        return $this->getKey('LocalOneChannel');
    }

    /**
     * Returns key: 'LocalOneChannelState'.
     *
     * @return string
     */
    public function getLocalOneChannelState()
    {
        return $this->getKey('LocalOneChannelState');
    }

    /**
     * Returns key: 'LocalOneChannelStateDesc'.
     *
     * @return string
     */
    public function getLocalOneChannelStateDesc()
    {
        return $this->getKey('LocalOneChannelStateDesc');
    }

    /**
     * Returns key: 'LocalOneCallerIDNum'.
     *
     * @return string
     */
    public function getLocalOneCallerIDNum()
    {
        return $this->getKey('LocalOneCallerIDNum');
    }

    /**
     * Returns key: 'LocalOneCallerIDName'.
     *
     * @return string
     */
    public function getLocalOneCallerIDName()
    {
        return $this->getKey('LocalOneCallerIDName');
    }

    /**
     * Returns key: 'LocalOneConnectedLineNum'.
     *
     * @return string
     */
    public function getLocalOneConnectedLineNum()
    {
        return $this->getKey('LocalOneConnectedLineNum');
    }

    /**
     * Returns key: 'LocalOneConnectedLineName'.
     *
     * @return string
     */
    public function getLocalOneConnectedLineName()
    {
        return $this->getKey('LocalOneConnectedLineName');
    }

    /**
     * Returns key: 'LocalOneAccountCode'.
     *
     * @return string
     */
    public function getLocalOneAccountCode()
    {
        return $this->getKey('LocalOneAccountCode');
    }

    /**
     * Returns key: 'LocalOneContext'.
     *
     * @return string
     */
    public function getLocalOneContext()
    {
        return $this->getKey('LocalOneContext');
    }

    /**
     * Returns key: 'LocalOneExten'.
     *
     * @return string
     */
    public function getLocalOneExten()
    {
        return $this->getKey('LocalOneExten');
    }

    /**
     * Returns key: 'LocalOnePriority'.
     *
     * @return string
     */
    public function getLocalOnePriority()
    {
        return $this->getKey('LocalOnePriority');
    }

    /**
     * Returns key: 'LocalOneUniqueid'.
     *
     * @return string
     */
    public function getLocalOneUniqueid()
    {
        return $this->getKey('LocalOneUniqueid');
    }

    /**
     * Returns key: 'LocalTwoChannel'.
     *
     * @return string
     */
    public function getLocalTwoChannel()
    {
        return $this->getKey('LocalTwoChannel');
    }

    /**
     * Returns key: 'LocalTwoChannelState'.
     *
     * @return string
     */
    public function getLocalTwoChannelState()
    {
        return $this->getKey('LocalTwoChannelState');
    }

    /**
     * Returns key: 'LocalTwoChannelStateDesc'.
     *
     * @return string
     */
    public function getLocalTwoChannelStateDesc()
    {
        return $this->getKey('LocalTwoChannelStateDesc');
    }

    /**
     * Returns key: 'LocalTwoCallerIDNum'.
     *
     * @return string
     */
    public function getLocalTwoCallerIDNum()
    {
        return $this->getKey('LocalTwoCallerIDNum');
    }

    /**
     * Returns key: 'LocalTwoCallerIDName'.
     *
     * @return string
     */
    public function getLocalTwoCallerIDName()
    {
        return $this->getKey('LocalTwoCallerIDName');
    }

    /**
     * Returns key: 'LocalTwoConnectedLineNum'.
     *
     * @return string
     */
    public function getLocalTwoConnectedLineNum()
    {
        return $this->getKey('LocalTwoConnectedLineNum');
    }

    /**
     * Returns key: 'LocalTwoConnectedLineName'.
     *
     * @return string
     */
    public function getLocalTwoConnectedLineName()
    {
        return $this->getKey('LocalTwoConnectedLineName');
    }

    /**
     * Returns key: 'LocalTwoAccountCode'.
     *
     * @return string
     */
    public function getLocalTwoAccountCode()
    {
        return $this->getKey('LocalTwoAccountCode');
    }

    /**
     * Returns key: 'LocalTwoContext'.
     *
     * @return string
     */
    public function getLocalTwoContext()
    {
        return $this->getKey('LocalTwoContext');
    }

    /**
     * Returns key: 'LocalTwoExten'.
     *
     * @return string
     */
    public function getLocalTwoExten()
    {
        return $this->getKey('LocalTwoExten');
    }

    /**
     * Returns key: 'LocalTwoPriority'.
     *
     * @return string
     */
    public function getLocalTwoPriority()
    {
        return $this->getKey('LocalTwoPriority');
    }

    /**
     * Returns key: 'LocalTwoUniqueid'.
     *
     * @return string
     */
    public function getLocalTwoUniqueid()
    {
        return $this->getKey('LocalTwoUniqueid');
    }

    /**
     * Returns key: 'DestTransfererChannel'.
     *
     * @return string
     */
    public function getDestTransfererChannel()
    {
        return $this->getKey('DestTransfererChannel');
    }

    /**
     * Returns key: 'TransfereeChannel'.
     *
     * @return string
     */
    public function getTransfereeChannel()
    {
        return $this->getKey('TransfereeChannel');
    }

    /**
     * Returns key: 'TransfereeChannelState'.
     *
     * @return string
     */
    public function getTransfereeChannelState()
    {
        return $this->getKey('TransfereeChannelState');
    }

    /**
     * Returns key: 'TransfereeChannelStateDesc'.
     *
     * @return string
     */
    public function getTransfereeChannelStateDesc()
    {
        return $this->getKey('TransfereeChannelStateDesc');
    }

    /**
     * Returns key: 'TransfereeCallerIDNum'.
     *
     * @return string
     */
    public function getTransfereeCallerIDNum()
    {
        return $this->getKey('TransfereeCallerIDNum');
    }

    /**
     * Returns key: 'TransfereeCallerIDName'.
     *
     * @return string
     */
    public function getTransfereeCallerIDName()
    {
        return $this->getKey('TransfereeCallerIDName');
    }

    /**
     * Returns key: 'TransfereeConnectedLineNum'.
     *
     * @return string
     */
    public function getTransfereeConnectedLineNum()
    {
        return $this->getKey('TransfereeConnectedLineNum');
    }

    /**
     * Returns key: 'TransfereeConnectedLineName'.
     *
     * @return string
     */
    public function getTransfereeConnectedLineName()
    {
        return $this->getKey('TransfereeConnectedLineName');
    }

    /**
     * Returns key: 'TransfereeAccountCode'.
     *
     * @return string
     */
    public function getTransfereeAccountCode()
    {
        return $this->getKey('TransfereeAccountCode');
    }

    /**
     * Returns key: 'TransfereeContext'.
     *
     * @return string
     */
    public function getTransfereeContext()
    {
        return $this->getKey('TransfereeContext');
    }

    /**
     * Returns key: 'TransfereeExten'.
     *
     * @return string
     */
    public function getTransfereeExten()
    {
        return $this->getKey('TransfereeExten');
    }

    /**
     * Returns key: 'TransfereePriority'.
     *
     * @return string
     */
    public function getTransfereePriority()
    {
        return $this->getKey('TransfereePriority');
    }

    /**
     * Returns key: 'TransfereeUniqueid'.
     *
     * @return string
     */
    public function getTransfereeUniqueid()
    {
        return $this->getKey('TransfereeUniqueid');
    }
}
