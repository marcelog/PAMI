<?php
/**
 * Event triggered when an agent logs in.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2015 Diederik de Groot <ddegroot@users.sf.net>, Marcelo Gornstein <marcelog@gmail.com>
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
 * Event triggered when an agent logs in.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class SCCPShowLineEvent extends EventMessage
{
    /**
     * Returns key: 'Name'.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getKey('Name');
    }

    /**
     * Returns key: 'Description'.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getKey('Description');
    }

    /**
     * Returns key: 'Label'.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->getKey('Label');
    }

    /**
     * Returns key: 'ID'.
     *
     * @return integer
     */
    public function getID()
    {
        return intval($this->getKey('ID'));
    }

    /**
     * Returns key: 'Pin'.
     *
     * @return integer
     */
    public function getPin()
    {
        return intval($this->getKey('Pin'));
    }

    /**
     * Returns key: 'VoiceMailNumber'.
     *
     * @return string
     */
    public function getVoiceMailNumber()
    {
        return $this->getKey('VoiceMailNumber');
    }

    /**
     * Returns key: 'TransferToVoicemail'.
     *
     * @return string
     */
    public function getTransferToVoicemail()
    {
        return $this->getKey('TransferToVoicemail');
    }

    /**
     * Returns key: 'MeetMeEnabled'.
     *
     * @return boolean
     */
    public function getMeetMeEnabled()
    {
        return $this->getBoolKey('MeetMeEnabled');
    }

    /**
     * Returns key: 'MeetMeNumber'.
     *
     * @return string
     */
    public function getMeetMeNumber()
    {
        return $this->getKey('MeetMeNumber');
    }

    /**
     * Returns key: 'MeetMeOptions'.
     *
     * @return string
     */
    public function getMeetMeOptions()
    {
        return $this->getKey('MeetMeOptions');
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
     * Returns key: 'Language'.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->getKey('Language');
    }

    /**
     * Returns key: 'AccountCode'.
     *
     * @return string
     */
    public function getAccountCode()
    {
        return $this->getKey('AccountCode');
    }

    /**
     * Returns key: 'Musicclass'.
     *
     * @return string
     */
    public function getMusicclass()
    {
        return $this->getKey('Musicclass');
    }

    /**
     * Returns key: 'AmaFlags'.
     *
     * @return integer
     */
    public function getAmaFlags()
    {
        return intval($this->getKey('AmaFlags'));
    }

    /**
     * Returns key: 'CallGroup'.
     *
     * @return int[]
     */
    public function getCallGroup()
    {
    	return array_map('intval', explode(",", $this->getKey('Callgroup')));
    }

    /**
     * Returns key: 'PickupGroup'.
     *
     * @return int[]
     */
    public function getPickupGroup()
    {
    	return array_map('intval', explode(",", $this->getKey('Pickupgroup')));
    }

    /**
     * Returns key: 'NamedCallGroup'.
     *
     * @return string[]
     */
    public function getNamedCallGroup()
    {
    	return explode(",", $this->getKey('NamedCallGroup'));
    }

    /**
     * Returns key: 'NamedPickupGroup'.
     *
     * @return string[]
     */
    public function getNamedPickupGroup()
    {
        return explode(",", $this->getKey('NamedPickupGroup'));
    }

    /**
     * Returns key: 'ParkingLot'.
     *
     * @return string
     */
    public function getParkingLot()
    {
        return $this->getKey('ParkingLot');
    }

    /**
     * Returns key: 'CallerIDName'.
     *
     * @return string
     */
    public function getCallerIDName()
    {
        return $this->getKey('CallerIDName');
    }

    /**
     * Returns key: 'CallerIDNumber'.
     *
     * @return string
     */
    public function getCallerIDNumber()
    {
        return $this->getKey('CallerIDNumber');
    }

    /**
     * Returns key: 'IncomingCallsLimit'.
     *
     * @return integer
     */
    public function getIncomingCallsLimit()
    {
        return intval($this->getKey('IncomingCallsLimit'));
    }

    /**
     * Returns key: 'ActiveChannelCount'.
     *
     * @return integer
     */
    public function getActiveChannelCount()
    {
        return intval($this->getKey('ActiveChannelCount'));
    }

    /**
     * Returns key: 'SecDialtoneDigits'.
     *
     * @return integer
     */
    public function getSecDialtoneDigits()
    {
        return intval($this->getKey('SecDialtoneDigits'));
    }

    /**
     * Returns key: 'SecDialtone'.
     *
     * @return integer
     */
    public function getSecDialtone()
    {
    	/* can be either integer or hex -> convert hex to int */
        return intval($this->getKey('SecDialtone'), 0);
    }

    /**
     * Returns key: 'EchoCancellation'.
     *
     * @return boolean
     */
    public function getEchoCancellation()
    {
    	return $this->getBoolKey('EchoCancellation');
    }

    /**
     * Returns key: 'SilenceSuppression'.
     *
     * @return boolean
     */
    public function getSilenceSuppression()
    {
    	return $this->getBoolKey('SilenceSuppression');
    }

    /**
     * Returns key: 'CanTransfer'.
     *
     * @return boolean
     */
    public function getCanTransfer()
    {
    	return $this->getBoolKey('CanTransfer');
    }

    /**
     * Returns key: 'DNDAction'.
     *
     * @return string
     */
    public function getDNDAction()
    {
    	return $this->getKey('DNDAction');
    }

    /**
     * Returns key: 'IsRealtimeLine'.
     *
     * @return boolean
     */
    public function getIsRealtimeLine()
    {
    	return $this->getBoolKey('IsRealtimeLine');
    }

    /**
     * Returns key: 'PendingDelete'.
     *
     * @return boolean
     */
    public function getPendingDelete()
    {
    	return $this->getBoolKey('PendingDelete');
    }

    /**
     * Returns key: 'PendingUpdate'.
     *
     * @return boolean
     */
    public function getPendingUpdate()
    {
    	return $this->getBoolKey('PendingUpdate');
    }

    /**
     * Returns key: 'RegistrationExtension'.
     *
     * @return string
     */
    public function getRegistrationExtension()
    {
        return $this->getKey('RegistrationExtension');
    }

    /**
     * Returns key: 'RegistrationContext'.
     *
     * @return string
     */
    public function getRegistrationContext()
    {
        return $this->getKey('RegistrationContext');
    }

    /**
     * Returns key: 'AdhocNumberAssigned'.
     *
     * @return boolean
     */
    public function getAdhocNumberAssigned()
    {
    	return $this->getBoolKey('AdhocNumberAssigned');
    }

    /**
     * Returns key: 'MessageWaitingNew'.
     *
     * @return integer
     */
    public function getMessageWaitingNew()
    {
        return intval($this->getKey('MessageWaitingNew'));
    }

    /**
     * Returns key: 'MessageWaitingOld'.
     *
     * @return integer
     */
    public function getMessageWaitingOld()
    {
        return intval($this->getKey('MessageWaitingOld'));
    }
}
