<?php
/**
 * Event triggered when getting a dongle device.
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

use PAMI\Message\Event\EventMessage;

/**
 * Event triggered when getting a dongle device.
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
class DongleDeviceEntryEvent extends EventMessage
{
    /**
     * Returns key: 'Device'.
     *
     * @return string
     */
    public function getDevice()
    {
        return $this->getKey('Device');
    }

    /**
     * Returns key: 'AudioSetting'.
     *
     * @return string
     */
    public function getAudioSetting()
    {
        return $this->getKey('AudioSetting');
    }

    /**
     * Returns key: 'DataSetting'.
     *
     * @return string
     */
    public function getDataSetting()
    {
        return $this->getKey('DataSetting');
    }

    /**
     * Returns key: 'IMEISetting'.
     *
     * @return string
     */
    public function getIMEISetting()
    {
        return $this->getKey('IMEISetting');
    }

    /**
     * Returns key: 'IMSISetting'.
     *
     * @return string
     */
    public function getIMSISetting()
    {
        return $this->getKey('IMSISetting');
    }

    /**
     * Returns key: 'ChannelLanguage'.
     *
     * @return string
     */
    public function getChannelLanguage()
    {
        return $this->getKey('ChannelLanguage');
    }

    /**
     * Returns key: 'Context'.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }

    /**
     * Returns key: 'Exten'.
     *
     * @return string
     */
    public function getExten()
    {
        return $this->getKey('Exten');
    }

    /**
     * Returns key: 'Group'.
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->getKey('Group');
    }

    /**
     * Returns key: 'RXGain'.
     *
     * @return string
     */
    public function getRXGain()
    {
        return $this->getKey('RXGain');
    }

    /**
     * Returns key: 'TXGain'.
     *
     * @return string
     */
    public function getTXGain()
    {
        return $this->getKey('TXGain');
    }

    /**
     * Returns key: 'U2DIAG'.
     *
     * @return string
     */
    public function getU2DIAG()
    {
        return $this->getKey('U2DIAG');
    }

    /**
     * Returns key: 'UseCallingPres'.
     *
     * @return string
     */
    public function getUseCallingPres()
    {
        return $this->getKey('UseCallingPres');
    }

    /**
     * Returns key: 'DefaultCallingPres'.
     *
     * @return string
     */
    public function getDefaultCallingPres()
    {
        return $this->getKey('DefaultCallingPres');
    }

    /**
     * Returns key: 'AutoDeleteSMS'.
     *
     * @return string
     */
    public function getAutoDeleteSMS()
    {
        return $this->getKey('AutoDeleteSMS');
    }

    /**
     * Returns key: 'DisableSMS'.
     *
     * @return string
     */
    public function getDisableSMS()
    {
        return $this->getKey('DisableSMS');
    }

    /**
     * Returns key: 'ResetDongle'.
     *
     * @return string
     */
    public function getResetDongle()
    {
        return $this->getKey('ResetDongle');
    }

    /**
     * Returns key: 'SMSPDU'.
     *
     * @return string
     */
    public function getSMSPDU()
    {
        return $this->getKey('SMSPDU');
    }

    /**
     * Returns key: 'CallWaitingSetting'.
     *
     * @return string
     */
    public function getCallWaitingSetting()
    {
        return $this->getKey('CallWaitingSetting');
    }

    /**
     * Returns key: 'DTMF'.
     *
     * @return string
     */
    public function getDTMF()
    {
        return $this->getKey('DTMF');
    }

    /**
     * Returns key: 'MinimalDTMFGap'.
     *
     * @return string
     */
    public function getMinimalDTMFGap()
    {
        return $this->getKey('MinimalDTMFGap');
    }

    /**
     * Returns key: 'MinimalDTMFDuration'.
     *
     * @return string
     */
    public function getMinimalDTMFDuration()
    {
        return $this->getKey('MinimalDTMFDuration');
    }

    /**
     * Returns key: 'MinimalDTMFInterval'.
     *
     * @return string
     */
    public function getMinimalDTMFInterval()
    {
        return $this->getKey('MinimalDTMFInterval');
    }

    /**
     * Returns key: 'State'.
     *
     * @return string
     */
    public function getState()
    {
        return $this->getKey('State');
    }

    /**
     * Returns key: 'AudioState'.
     *
     * @return string
     */
    public function getAudioState()
    {
        return $this->getKey('AudioState');
    }

    /**
     * Returns key: 'DataState'.
     *
     * @return string
     */
    public function getDataState()
    {
        return $this->getKey('DataState');
    }

    /**
     * Returns key: 'Voice'.
     *
     * @return string
     */
    public function getVoice()
    {
        return $this->getKey('Voice');
    }

    /**
     * Returns key: 'SMS'.
     *
     * @return string
     */
    public function getSMS()
    {
        return $this->getKey('SMS');
    }

    /**
     * Returns key: 'Manufacturer'.
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->getKey('Manufacturer');
    }

    /**
     * Returns key: 'Model'.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->getKey('Model');
    }

    /**
     * Returns key: 'Firmware'.
     *
     * @return string
     */
    public function getFirmware()
    {
        return $this->getKey('Firmware');
    }

    /**
     * Returns key: 'IMEIState'.
     *
     * @return string
     */
    public function getIMEIState()
    {
        return $this->getKey('IMEIState');
    }

    /**
     * Returns key: 'IMSIState'.
     *
     * @return string
     */
    public function getIMSIState()
    {
        return $this->getKey('IMSIState');
    }

    /**
     * Returns key: 'GSMRegistrationStatus'.
     *
     * @return string
     */
    public function getGSMRegistrationStatus()
    {
        return $this->getKey('GSMRegistrationStatus');
    }

    /**
     * Returns key: 'RSSI'.
     *
     * @return string
     */
    public function getRSSI()
    {
        return $this->getKey('RSSI');
    }

    /**
     * Returns key: 'Mode'.
     *
     * @return string
     */
    public function getMode()
    {
        return $this->getKey('Mode');
    }

    /**
     * Returns key: 'Submode'.
     *
     * @return string
     */
    public function getSubmode()
    {
        return $this->getKey('Submode');
    }

    /**
     * Returns key: 'ProviderName'.
     *
     * @return string
     */
    public function getProviderName()
    {
        return $this->getKey('ProviderName');
    }

    /**
     * Returns key: 'LocationAreaCode'.
     *
     * @return string
     */
    public function getLocationAreaCode()
    {
        return $this->getKey('LocationAreaCode');
    }

    /**
     * Returns key: 'CellID'.
     *
     * @return string
     */
    public function getCellID()
    {
        return $this->getKey('CellID');
    }

    /**
     * Returns key: 'SubscriberNumber'.
     *
     * @return string
     */
    public function getSubscriberNumber()
    {
        return $this->getKey('SubscriberNumber');
    }

    /**
     * Returns key: 'SMSServiceCenter'.
     *
     * @return string
     */
    public function getSMSServiceCenter()
    {
        return $this->getKey('SMSServiceCenter');
    }

    /**
     * Returns key: 'UseUCS2Encoding'.
     *
     * @return string
     */
    public function getUseUCS2Encoding()
    {
        return $this->getKey('UseUCS2Encoding');
    }

    /**
     * Returns key: 'USSDUse7BitEncoding'.
     *
     * @return string
     */
    public function getUSSDUse7BitEncoding()
    {
        return $this->getKey('USSDUse7BitEncoding');
    }

    /**
     * Returns key: 'USSDUseUCS2Decoding'.
     *
     * @return string
     */
    public function getUSSDUseUCS2Decoding()
    {
        return $this->getKey('USSDUseUCS2Decoding');
    }

    /**
     * Returns key: 'TasksInQueue'.
     *
     * @return string
     */
    public function getTasksInQueue()
    {
        return $this->getKey('TasksInQueue');
    }

    /**
     * Returns key: 'CommandsInQueue'.
     *
     * @return string
     */
    public function getCommandsInQueue()
    {
        return $this->getKey('CommandsInQueue');
    }

    /**
     * Returns key: 'CallWaitingState'.
     *
     * @return string
     */
    public function getCallWaitingState()
    {
        return $this->getKey('CallWaitingState');
    }

    /**
     * Returns key: 'CurrentDeviceState'.
     *
     * @return string
     */
    public function getCurrentDeviceState()
    {
        return $this->getKey('CurrentDeviceState');
    }

    /**
     * Returns key: 'DesiredDeviceState'.
     *
     * @return string
     */
    public function getDesiredDeviceState()
    {
        return $this->getKey('DesiredDeviceState');
    }

    /**
     * Returns key: 'CallsChannels'.
     *
     * @return string
     */
    public function getCallsChannels()
    {
        return $this->getKey('CallsChannels');
    }

    /**
     * Returns key: 'Active'.
     *
     * @return string
     */
    public function getActive()
    {
        return $this->getKey('Active');
    }

    /**
     * Returns key: 'Held'.
     *
     * @return string
     */
    public function getHeld()
    {
        return $this->getKey('Held');
    }

    /**
     * Returns key: 'Dialing'.
     *
     * @return string
     */
    public function getDialing()
    {
        return $this->getKey('Dialing');
    }

    /**
     * Returns key: 'Alerting'.
     *
     * @return string
     */
    public function getAlerting()
    {
        return $this->getKey('Alerting');
    }

    /**
     * Returns key: 'Incoming'.
     *
     * @return string
     */
    public function getIncoming()
    {
        return $this->getKey('Incoming');
    }

    /**
     * Returns key: 'Waiting'.
     *
     * @return string
     */
    public function getWaiting()
    {
        return $this->getKey('Waiting');
    }

    /**
     * Returns key: 'Releasing'.
     *
     * @return string
     */
    public function getReleasing()
    {
        return $this->getKey('Releasing');
    }

    /**
     * Returns key: 'Initializing'.
     *
     * @return string
     */
    public function getInitializing()
    {
        return $this->getKey('Initializing');
    }
}