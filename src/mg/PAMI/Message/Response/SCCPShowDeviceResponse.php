<?php
/**
 * An sccp showdevice response message from ami.
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
use PAMI\Exception\PAMIException;

/**
 * An sccp showdevice response message from ami.
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
class SCCPShowDeviceResponse extends SCCPGenericResponse
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
	
	private function getEventKey($keyname) {
		return $this->_events[0]->getKey($keyname);
	}
	
    /**
     * Returns key: 'MACAddress'.
     *
     * @return string
     */
    public function getMACAddress()
    {
        return $this->getEventKey('MACAddress');
    }

    /**
     * Returns key: 'DeviceName'.
     *
     * @return string
     */
    public function getDeviceName()
    {
        return $this->getMACAddress();
    }

    /**
     * Returns key: 'ProtocolVersion'.
     *
     * @return string
     */
    public function getProtocolVersion()
    {
        return $this->getEventKey('ProtocolVersion');
    }

    /**
     * Returns key: 'ProtocolInUse'.
     *
     * @return string
     */
    public function getProtocolInUse()
    {
        return $this->getEventKey('ProtocolInUse');
    }

    /**
     * Returns key: 'DeviceFeatures'.
     *
     * @return string
     */
    public function getDeviceFeatures()
    {
        return $this->getEventKey('DeviceFeatures');
    }

    /**
     * Returns key: 'Tokenstate'.
     *
     * @return string
     */
    public function getTokenstate()
    {
        return $this->getEventKey('Tokenstate');
    }

    /**
     * Returns key: 'Keepalive'.
     *
     * @return integer
     */
    public function getKeepalive()
    {
        return intval($this->getEventKey('Keepalive'));
    }

    /**
     * Returns key: 'RegistrationState'.
     *
     * @return string
     */
    public function getRegistrationState()
    {
        return $this->getEventKey('RegistrationState');
    }

    /**
     * Returns key: 'State'.
     *
     * @return string
     */
    public function getState()
    {
        return $this->getEventKey('State');
    }

    /**
     * Returns key: 'MWILight'.
     *
     * @return string
     */
    public function getMWILight()
    {
        return $this->getEventKey('MWILight');
    }

    /**
     * Returns key: 'MWIHandsetLight'.
     *
     * @return boolean
     */
    public function getMWIHandsetLight()
    {
        return $this->getBoolKey('MWIHandsetLight');
    }

    /**
     * Returns key: 'Description'.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getEventKey('Description');
    }

    /**
     * Returns key: 'ConfigPhoneType'.
     *
     * @return string
     */
    public function getConfigPhoneType()
    {
        return $this->getEventKey('ConfigPhoneType');
    }

    /**
     * Returns key: 'SkinnyPhoneType'.
     *
     * @return string
     */
    public function getSkinnyPhoneType()
    {
        return $this->getEventKey('SkinnyPhoneType');
    }

    /**
     * Returns key: 'SoftkeySupport'.
     *
     * @return boolean
     */
    public function getSoftkeySupport()
    {
        return $this->getBoolKey('SoftkeySupport');
    }

    /**
     * Returns key: 'Softkeyset'.
     *
     * @return string
     */
    public function getSoftkeyset()
    {
        return $this->getEventKey('Softkeyset');
    }

    /**
     * Returns key: 'BTemplateSupport'.
     *
     * @return boolean
     */
    public function getBTemplateSupport()
    {
        return $this->getBoolKey('BTemplateSupport');
    }

    /**
     * Returns key: 'linesRegistered'.
     *
     * @return boolean
     */
    public function getLinesRegistered()
    {
        return $this->getBoolKey('linesRegistered');
    }

    /**
     * Returns key: 'ImageVersion'.
     *
     * @return string
     */
    public function getImageVersion()
    {
        return $this->getEventKey('ImageVersion');
    }

    /**
     * Returns key: 'TimezoneOffset'.
     *
     * @return integer
     */
    public function getTimezoneOffset()
    {
        return intval($this->getEventKey('TimezoneOffset'));
    }

    /**
     * Returns key: 'Capabilities'.
     *
     * @return (string|int)[]
     */
    public function getCapabilities()
    {
    	$ret = array();
    	$codecs=explode(", ", substr($this->getEventKey('Capabilities'), 1, -1));
    	foreach($codecs as $codec) {
    		$codec_parts=explode(" ", $codec);
    		$ret[] = array("name" => $codec_parts[0], "value" => substr($codec_parts[1], 1, -1));
    	}
        return $ret;
    }

    /**
     * Returns key: 'CodecsPreference'.
     *
     * @return (string|int)[]
     */
    public function getCodecsPreference()
    {
    	$ret = array();
    	$codecs=explode(", ", substr($this->getEventKey('CodecsPreference'), 1, -1));
    	foreach($codecs as $codec) {
    		$codec_parts=explode(" ", $codec);
    		$ret[] = array("name" => $codec_parts[0], "value" => substr($codec_parts[1], 1, -1));
    	}
        return $ret;
    }

    /**
     * Returns key: 'AudioTOS'.
     *
     * @return integer
     */
    public function getAudioTOS()
    {
        return intval($this->getEventKey('AudioTOS'));
    }

    /**
     * Returns key: 'AudioCOS'.
     *
     * @return integer
     */
    public function getAudioCOS()
    {
        return intval($this->getEventKey('AudioCOS'));
    }

    /**
     * Returns key: 'VideoTOS'.
     *
     * @return integer
     */
    public function getVideoTOS()
    {
        return intval($this->getEventKey('VideoTOS'));
    }

    /**
     * Returns key: 'VideoCOS'.
     *
     * @return integer
     */
    public function getVideoCOS()
    {
        return intval($this->getEventKey('VideoCOS'));
    }

    /**
     * Returns key: 'DNDFeatureEnabled'.
     *
     * @return boolean
     */
    public function getDNDFeatureEnabled()
    {
        return $this->getBoolKey('DNDFeatureEnabled');
    }

    /**
     * Returns key: 'DNDStatus'.
     *
     * @return string
     */
    public function getDNDStatus()
    {
        return $this->getEventKey('DNDStatus');
    }

    /**
     * Returns key: 'DNDAction'.
     *
     * @return string
     */
    public function getDNDAction()
    {
        return $this->getEventKey('DNDAction');
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
     * Returns key: 'CanPark'.
     *
     * @return boolean
     */
    public function getCanPark()
    {
        return $this->getBoolKey('CanPark');
    }

    /**
     * Returns key: 'CanCFWDALL'.
     *
     * @return boolean
     */
    public function getCanCFWDALL()
    {
        return $this->getBoolKey('CanCFWDALL');
    }

    /**
     * Returns key: 'CanCFWBUSY'.
     *
     * @return boolean
     */
    public function getCanCFWBUSY()
    {
        return $this->getBoolKey('CanCFWBUSY');
    }

    /**
     * Returns key: 'CanCFWNOANSWER'.
     *
     * @return boolean
     */
    public function getCanCFWNOANSWER()
    {
        return $this->getBoolKey('CanCFWNOANSWER');
    }

    /**
     * Returns key: 'AllowRinginNotification'.
     *
     * @return boolean
     */
    public function getAllowRinginNotification()
    {
        return $this->getBoolKey('AllowRinginNotification');
    }

    /**
     * Returns key: 'PrivateSoftkey'.
     *
     * @return boolean
     */
    public function getPrivateSoftkey()
    {
        return $this->getBoolKey('PrivateSoftkey');
    }

    /**
     * Returns key: 'DtmfMode'.
     *
     * @return string
     */
    public function getDtmfMode()
    {
        return $this->getEventKey('DtmfMode');
    }

    /**
     * Returns key: 'Nat'.
     *
     * @return string
     */
    public function getNat()
    {
        return $this->getEventKey('Nat');
    }

    /**
     * Returns key: 'Videosupport'.
     *
     * @return boolean
     */
    public function getVideosupport()
    {
        return $this->getBoolKey('Videosupport');
    }

    /**
     * Returns key: 'DirectRTP'.
     *
     * @return boolean
     */
    public function getDirectRTP()
    {
        return $this->getBoolKey('DirectRTP');
    }

    /**
     * Returns key: 'BindAddress'.
     *
     * @return string
     */
    public function getBindAddress()
    {
        return $this->getEventKey('BindAddress');
    }

    /**
     * Returns key: 'ServerAddress'.
     *
     * @return string
     */
    public function getServerAddress()
    {
        return $this->getEventKey('ServerAddress');
    }

    /**
     * Returns key: 'DenyPermit'.
     *
     * @return string
     */
    public function getDenyPermit()
    {
    	$deny = array();
    	$permit = array();
    	$entries=explode(",", substr($this->getEventKey('DenyPermit'), 0, -1));
    	foreach($entries as $entry) {
    		$entry_parts=explode(":", $entry);
    		if ($entry_parts[0]=="deny") {
    			$deny[] = $entry_parts[1];
    		} else if ($entry_parts[0]=="permit") {
    			$permit[] = $entry_parts[1];
    		} else {
    			throw new PAMIException('Could not parse DenyPermit value: ' . $this->getEventKey('DenyPermit'));
    		}
    	}
        return array('deny'=>$deny, 'permit'=>$permit);
    }

    /**
     * Returns key: 'PermitHosts'.
     *
     * @return string
     */
    public function getPermitHosts()
    {
        return $this->getEventKey('PermitHosts');
    }

    /**
     * Returns key: 'EarlyRTP'.
     *
     * @return string
     */
    public function getEarlyRTP()
    {
        return $this->getEventKey('EarlyRTP');
    }

    /**
     * Returns key: 'DeviceStateAcc'.
     *
     * @return string
     */
    public function getDeviceStateAcc()
    {
        return $this->getEventKey('DeviceStateAcc');
    }

    /**
     * Returns key: 'LastUsedAccessory'.
     *
     * @return string
     */
    public function getLastUsedAccessory()
    {
        return $this->getEventKey('LastUsedAccessory');
    }

    /**
     * Returns key: 'LastDialedNumber'.
     *
     * @return string
     */
    public function getLastDialedNumber()
    {
        return $this->getEventKey('LastDialedNumber');
    }

    /**
     * Returns key: 'DefaultLineInstance'.
     *
     * @return integer
     */
    public function getDefaultLineInstance()
    {
        return intval($this->getEventKey('DefaultLineInstance'));
    }

    /**
     * Returns key: 'CustomBackgroundImage'.
     *
     * @return string
     */
    public function getCustomBackgroundImage()
    {
        return $this->getEventKey('CustomBackgroundImage');
    }

    /**
     * Returns key: 'CustomRingTone'.
     *
     * @return string
     */
    public function getCustomRingTone()
    {
        return $this->getEventKey('CustomRingTone');
    }

    /**
     * Returns key: 'UsePlacedCalls'.
     *
     * @return boolean
     */
    public function getUsePlacedCalls()
    {
        return $this->getBoolKey('UsePlacedCalls');
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
     * Returns key: 'PendingDelete'.
     *
     * @return boolean
     */
    public function getPendingDelete()
    {
        return $this->getBoolKey('PendingDelete');
    }

    /**
     * Returns key: 'DirectedPickup'.
     *
     * @return boolean
     */
    public function getDirectedPickup()
    {
        return $this->getBoolKey('DirectedPickup');
    }

    /**
     * Returns key: 'PickupContext'.
     *
     * @return string
     */
    public function getPickupContext()
    {
        return $this->getEventKey('PickupContext');
    }

    /**
     * Returns key: 'PickupModeAnswer'.
     *
     * @return boolean
     */
    public function getPickupModeAnswer()
    {
        return $this->getBoolKey('PickupModeAnswer');
    }

    /**
     * Returns key: 'allowConference'.
     *
     * @return boolean
     */
    public function getallowConference()
    {
        return $this->getBoolKey('allowConference');
    }

    /**
     * Returns key: 'confPlayGeneralAnnounce'.
     *
     * @return boolean
     */
    public function getconfPlayGeneralAnnounce()
    {
        return $this->getBoolKey('confPlayGeneralAnnounce');
    }

    /**
     * Returns key: 'confPlayPartAnnounce'.
     *
     * @return boolean
     */
    public function getconfPlayPartAnnounce()
    {
        return $this->getBoolKey('confPlayPartAnnounce');
    }

    /**
     * Returns key: 'confMuteOnEntry'.
     *
     * @return boolean
     */
    public function getconfMuteOnEntry()
    {
        return $this->getBoolKey('confMuteOnEntry');
    }

    /**
     * Returns key: 'confMusicOnHoldClass'.
     *
     * @return string
     */
    public function getconfMusicOnHoldClass()
    {
        return $this->getEventKey('confMusicOnHoldClass');
    }

    /**
     * Returns key: 'confShowConflist'.
     *
     * @return boolean
     */
    public function getconfShowConflist()
    {
        return $this->getBoolKey('confShowConflist');
    }

    /**
     * Returns key: 'conflistActive'.
     *
     * @return boolean
     */
    public function getconflistActive()
    {
        return $this->getBoolKey('conflistActive');
    }

    /**
     * Returns events[] related to ButtonEntries from the tables['Buttons']
     *
     * @return events[]
     */
	public function getButtons()
	{
		if ($this->hasTable() && array_key_exists('DeviceButtons', $this->_tables)) {
			return $this->_tables['DeviceButtons'];
		}
		return array();
	}

    /**
     * Returns events[] related to LineButtons from the tables['DeviceLineButtons']
     *
     * @return events[]
     */
	public function getLineButtons()
	{
		if ($this->hasTable() && array_key_exists('DeviceLineButtons', $this->_tables)) {
			return $this->_tables['DeviceLineButtons'];
		}
		return array();
	}

    /**
     * Returns events[] related to SpeeddialButtons from the tables['DeviceSpeeddialButtons']
     *
     * @return events[]
     */
	public function getSpeeddialButtons()
	{
		if ($this->hasTable() && array_key_exists('DeviceSpeeddialButtons', $this->_tables)) {
			return $this->_tables['DeviceSpeeddialButtons'];
		}
		return array();
	}


    /**
     * Returns events[] related to ServiceURLButtons from the tables['DeviceServiceURLs']
     *
     * @return events[]
     */
	public function getServiceURLButtons()
	{
		if ($this->hasTable() && array_key_exists('DeviceServiceURLs', $this->_tables)) {
			return $this->_tables['DeviceServiceURLs'];
		}
		return array();
	}


    /**
     * Returns events[] related to FeatureButtons from the tables['DeviceFeatureButtons']
     *
     * @return events[]
     */
	public function getFeatureButtons()
	{
		if ($this->hasTable() && array_key_exists('DeviceFeatureButtons', $this->_tables)) {
			return $this->_tables['DeviceFeatureButtons'];
		}
		return array();
	}


    /**
     * Returns events[] related to Variables from the tables['Variables']
     *
     * @return events[]
     */
	public function getVariables()
	{
		if ($this->hasTable() && array_key_exists('Variables', $this->_tables)) {
			return $this->_tables['Variables'];
		}
		return array();
	}

    /**
     * Returns events[] related to DeviceCallStatistics from the tables['DeviceCallStatistics']
     *
     * @return events[]
     */
	public function getCallStatistics()
	{
		if ($this->hasTable() && array_key_exists('DeviceCallStatistics', $this->_tables)) {
			return $this->_tables['DeviceCallStatistics'];
		}
		return array();
	}

}
