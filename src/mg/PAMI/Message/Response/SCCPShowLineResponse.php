<?php
/**
 * A sccp show line response message from ami.
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
namespace PAMI\Message\Response;

use PAMI\Message\Response\ResponseMessage;

/**
 * A sccp show line response message from ami.
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
class SCCPShowLineResponse extends SCCPGenericResponse
{

    /**
     * Constructor.
     *
     * @param string $rawContent Literal message as received from ami.
     *
     * @return void
     */
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
    }
	
	private function _getEventKey($keyname) {
		return $this->_events[0]->getKey($keyname);
	}

	private function _getEventBoolKey($keyname) {
		return $this->_events[0]->getBoolKey($keyname);
	}
	
    /**
     * Returns key: 'Name'.
     *
     * @return string
     */
    public function getName()
    {
        return $this->_getEventKey('Name');
    }

    /**
     * Returns key: 'Description'.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->_getEventKey('Description');
    }

    /**
     * Returns key: 'Label'.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->_getEventKey('Label');
    }

    /**
     * Returns key: 'ID'.
     *
     * @return integer
     */
    public function getID()
    {
        return intval($this->_getEventKey('ID'));
    }

    /**
     * Returns key: 'Pin'.
     *
     * @return integer
     */
    public function getPin()
    {
        return intval($this->_getEventKey('Pin'));
    }

    /**
     * Returns key: 'VoiceMailNumber'.
     *
     * @return string
     */
    public function getVoiceMailNumber()
    {
        return $this->_getEventKey('VoiceMailNumber');
    }

    /**
     * Returns key: 'TransferToVoicemail'.
     *
     * @return string
     */
    public function getTransferToVoicemail()
    {
        return $this->_getEventKey('TransferToVoicemail');
    }

    /**
     * Returns key: 'MeetMeEnabled'.
     *
     * @return boolean
     */
    public function getMeetMeEnabled()
    {
        return $this->_getEventBoolKey('MeetMeEnabled');
    }

    /**
     * Returns key: 'MeetMeNumber'.
     *
     * @return string
     */
    public function getMeetMeNumber()
    {
        return $this->_getEventKey('MeetMeNumber');
    }

    /**
     * Returns key: 'MeetMeOptions'.
     *
     * @return string
     */
    public function getMeetMeOptions()
    {
        return $this->_getEventKey('MeetMeOptions');
    }

    /**
     * Returns key: 'Context'.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->_getEventKey('Context');
    }

    /**
     * Returns key: 'Language'.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->_getEventKey('Language');
    }

    /**
     * Returns key: 'AccountCode'.
     *
     * @return string
     */
    public function getAccountCode()
    {
        return $this->_getEventKey('AccountCode');
    }

    /**
     * Returns key: 'Musicclass'.
     *
     * @return string
     */
    public function getMusicclass()
    {
        return $this->_getEventKey('Musicclass');
    }

    /**
     * Returns key: 'AmaFlags'.
     *
     * @return integer
     */
    public function getAmaFlags()
    {
        return intval($this->_getEventKey('AmaFlags'));
    }

    /**
     * Returns key: 'CallGroup'.
     *
     * @return int[]
     */
    public function getCallGroup()
    {
    	return array_map('intval', explode(",", $this->_getEventKey('Callgroup')));
    }

    /**
     * Returns key: 'PickupGroup'.
     *
     * @return int[]
     */
    public function getPickupGroup()
    {
    	return array_map('intval', explode(",", $this->_getEventKey('Pickupgroup')));
    }

    /**
     * Returns key: 'NamedCallGroup'.
     *
     * @return string[]
     */
    public function getNamedCallGroup()
    {
    	return explode(",", $this->_getEventKey('NamedCallGroup'));
    }

    /**
     * Returns key: 'NamedPickupGroup'.
     *
     * @return string[]
     */
    public function getNamedPickupGroup()
    {
        return explode(",", $this->_getEventKey('NamedPickupGroup'));
    }

    /**
     * Returns key: 'ParkingLot'.
     *
     * @return string
     */
    public function getParkingLot()
    {
        return $this->_getEventKey('ParkingLot');
    }

    /**
     * Returns key: 'CallerIDName'.
     *
     * @return string
     */
    public function getCallerIDName()
    {
        return $this->_getEventKey('CallerIDName');
    }

    /**
     * Returns key: 'CallerIDNumber'.
     *
     * @return string
     */
    public function getCallerIDNumber()
    {
        return $this->_getEventKey('CallerIDNumber');
    }

    /**
     * Returns key: 'IncomingCallsLimit'.
     *
     * @return integer
     */
    public function getIncomingCallsLimit()
    {
        return intval($this->_getEventKey('IncomingCallsLimit'));
    }

    /**
     * Returns key: 'ActiveChannelCount'.
     *
     * @return integer
     */
    public function getActiveChannelCount()
    {
        return intval($this->_getEventKey('ActiveChannelCount'));
    }

    /**
     * Returns key: 'SecDialtoneDigits'.
     *
     * @return integer
     */
    public function getSecDialtoneDigits()
    {
        return intval($this->_getEventKey('SecDialtoneDigits'));
    }

    /**
     * Returns key: 'SecDialtone'.
     *
     * @return integer
     */
    public function getSecDialtone()
    {
    	/* can be either integer or hex -> convert hex to int */
        return intval($this->_getEventKey('SecDialtone'), 0);
    }

    /**
     * Returns key: 'EchoCancellation'.
     *
     * @return boolean
     */
    public function getEchoCancellation()
    {
    	return $this->_getEventBoolKey('EchoCancellation');
    }

    /**
     * Returns key: 'SilenceSuppression'.
     *
     * @return boolean
     */
    public function getSilenceSuppression()
    {
    	return $this->_getEventBoolKey('SilenceSuppression');
    }

    /**
     * Returns key: 'CanTransfer'.
     *
     * @return boolean
     */
    public function getCanTransfer()
    {
    	return $this->_getEventBoolKey('CanTransfer');
    }

    /**
     * Returns key: 'DNDAction'.
     *
     * @return string
     */
    public function getDNDAction()
    {
    	return $this->_getEventKey('DNDAction');
    }

    /**
     * Returns key: 'IsRealtimeLine'.
     *
     * @return boolean
     */
    public function getIsRealtimeLine()
    {
    	return $this->_getEventBoolKey('IsRealtimeLine');
    }

    /**
     * Returns key: 'PendingDelete'.
     *
     * @return boolean
     */
    public function getPendingDelete()
    {
    	return $this->_getEventBoolKey('PendingDelete');
    }

    /**
     * Returns key: 'PendingUpdate'.
     *
     * @return boolean
     */
    public function getPendingUpdate()
    {
    	return $this->_getEventBoolKey('PendingUpdate');
    }

    /**
     * Returns key: 'RegistrationExtension'.
     *
     * @return string
     */
    public function getRegistrationExtension()
    {
        return $this->_getEventKey('RegistrationExtension');
    }

    /**
     * Returns key: 'RegistrationContext'.
     *
     * @return string
     */
    public function getRegistrationContext()
    {
        return $this->_getEventKey('RegistrationContext');
    }

    /**
     * Returns key: 'AdhocNumberAssigned'.
     *
     * @return boolean
     */
    public function getAdhocNumberAssigned()
    {
    	return $this->_getEventBoolKey('AdhocNumberAssigned');
    }

    /**
     * Returns key: 'MessageWaitingNew'.
     *
     * @return integer
     */
    public function getMessageWaitingNew()
    {
        return intval($this->_getEventKey('MessageWaitingNew'));
    }

    /**
     * Returns key: 'MessageWaitingOld'.
     *
     * @return integer
     */
    public function getMessageWaitingOld()
    {
        return intval($this->_getEventKey('MessageWaitingOld'));
    }
}
