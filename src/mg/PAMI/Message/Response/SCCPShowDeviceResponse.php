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
	
	private function _getEventKey($keyname) {
		return $this->_events[0]->getKey($keyname);
	}

	private function _getEventBoolKey($keyname) {
		return $this->_events[0]->getBoolKey($keyname);
	}
	
    /**
     * Returns key: 'MACAddress'.
     *
     * @return string
     */
    public function getMACAddress()
    {
        return $this->_getEventKey('MACAddress');
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
        return $this->_getEventKey('ProtocolVersion');
    }

    /**
     * Returns key: 'ProtocolInUse'.
     *
     * @return string
     */
    public function getProtocolInUse()
    {
        return $this->_getEventKey('ProtocolInUse');
    }

    /**
     * Returns key: 'DeviceFeatures'.
     *
     * @return string
     */
    public function getDeviceFeatures()
    {
        return $this->_getEventKey('DeviceFeatures');
    }

    /**
     * Returns key: 'Tokenstate'.
     *
     * @return string
     */
    public function getTokenstate()
    {
        return $this->_getEventKey('Tokenstate');
    }

    /**
     * Returns key: 'Keepalive'.
     *
     * @return integer
     */
    public function getKeepalive()
    {
        return intval($this->_getEventKey('Keepalive'));
    }

    /**
     * Returns key: 'RegistrationState'.
     *
     * @return string
     */
    public function getRegistrationState()
    {
        return $this->_getEventKey('RegistrationState');
    }

    /**
     * Returns key: 'State'.
     *
     * @return string
     */
    public function getState()
    {
        return $this->_getEventKey('State');
    }

    /**
     * Returns key: 'MWILight'.
     *
     * @return string
     */
    public function getMWILight()
    {
        return $this->_getEventKey('MWILight');
    }

    /**
     * Returns key: 'MWIHandsetLight'.
     *
     * @return boolean
     */
    public function getMWIHandsetLight()
    {
        return $this->_getEventBoolKey('MWIHandsetLight');
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
     * Returns key: 'ConfigPhoneType'.
     *
     * @return string
     */
    public function getConfigPhoneType()
    {
        return $this->_getEventKey('ConfigPhoneType');
    }

    /**
     * Returns key: 'SkinnyPhoneType'.
     *
     * @return string
     */
    public function getSkinnyPhoneType()
    {
        return $this->_getEventKey('SkinnyPhoneType');
    }

    /**
     * Returns key: 'SoftkeySupport'.
     *
     * @return boolean
     */
    public function getSoftkeySupport()
    {
        return $this->_getEventBoolKey('SoftkeySupport');
    }

    /**
     * Returns key: 'Softkeyset'.
     *
     * @return string
     */
    public function getSoftkeyset()
    {
        return $this->_getEventKey('Softkeyset');
    }

    /**
     * Returns key: 'BTemplateSupport'.
     *
     * @return boolean
     */
    public function getBTemplateSupport()
    {
        return $this->_getEventBoolKey('BTemplateSupport');
    }

    /**
     * Returns key: 'linesRegistered'.
     *
     * @return boolean
     */
    public function getLinesRegistered()
    {
        return $this->_getEventBoolKey('linesRegistered');
    }

    /**
     * Returns key: 'ImageVersion'.
     *
     * @return string
     */
    public function getImageVersion()
    {
        return $this->_getEventKey('ImageVersion');
    }

    /**
     * Returns key: 'TimezoneOffset'.
     *
     * @return integer
     */
    public function getTimezoneOffset()
    {
        return intval($this->_getEventKey('TimezoneOffset'));
    }

    /**
     * Returns key: 'Capabilities'.
     *
     * @return (string|int)[]
     */
    public function getCapabilities()
    {
    	$ret = array();
    	$codecs=explode(", ", substr($this->_getEventKey('Capabilities'), 1, -1));
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
    	$codecs=explode(", ", substr($this->_getEventKey('CodecsPreference'), 1, -1));
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
        return intval($this->_getEventKey('AudioTOS'));
    }

    /**
     * Returns key: 'AudioCOS'.
     *
     * @return integer
     */
    public function getAudioCOS()
    {
        return intval($this->_getEventKey('AudioCOS'));
    }

    /**
     * Returns key: 'VideoTOS'.
     *
     * @return integer
     */
    public function getVideoTOS()
    {
        return intval($this->_getEventKey('VideoTOS'));
    }

    /**
     * Returns key: 'VideoCOS'.
     *
     * @return integer
     */
    public function getVideoCOS()
    {
        return intval($this->_getEventKey('VideoCOS'));
    }

    /**
     * Returns key: 'DNDFeatureEnabled'.
     *
     * @return boolean
     */
    public function getDNDFeatureEnabled()
    {
        return $this->_getEventBoolKey('DNDFeatureEnabled');
    }

    /**
     * Returns key: 'DNDStatus'.
     *
     * @return string
     */
    public function getDNDStatus()
    {
        return $this->_getEventKey('DNDStatus');
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
     * Returns key: 'CanTransfer'.
     *
     * @return boolean
     */
    public function getCanTransfer()
    {
        return $this->_getEventBoolKey('CanTransfer');
    }

    /**
     * Returns key: 'CanPark'.
     *
     * @return boolean
     */
    public function getCanPark()
    {
        return $this->_getEventBoolKey('CanPark');
    }

    /**
     * Returns key: 'CanCFWDALL'.
     *
     * @return boolean
     */
    public function getCanCFWDALL()
    {
        return $this->_getEventBoolKey('CanCFWDALL');
    }

    /**
     * Returns key: 'CanCFWBUSY'.
     *
     * @return boolean
     */
    public function getCanCFWBUSY()
    {
        return $this->_getEventBoolKey('CanCFWBUSY');
    }

    /**
     * Returns key: 'CanCFWNOANSWER'.
     *
     * @return boolean
     */
    public function getCanCFWNOANSWER()
    {
        return $this->_getEventBoolKey('CanCFWNOANSWER');
    }

    /**
     * Returns key: 'AllowRinginNotification'.
     *
     * @return boolean
     */
    public function getAllowRinginNotification()
    {
        return $this->_getEventBoolKey('AllowRinginNotification');
    }

    /**
     * Returns key: 'PrivateSoftkey'.
     *
     * @return boolean
     */
    public function getPrivateSoftkey()
    {
        return $this->_getEventBoolKey('PrivateSoftkey');
    }

    /**
     * Returns key: 'DtmfMode'.
     *
     * @return string
     */
    public function getDtmfMode()
    {
        return $this->_getEventKey('DtmfMode');
    }

    /**
     * Returns key: 'Nat'.
     *
     * @return string
     */
    public function getNat()
    {
        return $this->_getEventKey('Nat');
    }

    /**
     * Returns key: 'Videosupport'.
     *
     * @return boolean
     */
    public function getVideosupport()
    {
        return $this->_getEventBoolKey('Videosupport');
    }

    /**
     * Returns key: 'DirectRTP'.
     *
     * @return boolean
     */
    public function getDirectRTP()
    {
        return $this->_getEventBoolKey('DirectRTP');
    }

    /**
     * Returns key: 'BindAddress'.
     *
     * @return string
     */
    public function getBindAddress()
    {
        return $this->_getEventKey('BindAddress');
    }

    /**
     * Returns key: 'ServerAddress'.
     *
     * @return string
     */
    public function getServerAddress()
    {
        return $this->_getEventKey('ServerAddress');
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
    	$entries=explode(",", substr($this->_getEventKey('DenyPermit'), 0, -1));
    	foreach($entries as $entry) {
    		$entry_parts=explode(":", $entry);
    		if ($entry_parts[0]=="deny") {
    			$deny[] = $entry_parts[1];
    		} else if ($entry_parts[0]=="permit") {
    			$permit[] = $entry_parts[1];
    		} else {
    			throw new PAMIException('Could not parse DenyPermit value: ' . $this->_getEventKey('DenyPermit'));
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
        return $this->_getEventKey('PermitHosts');
    }

    /**
     * Returns key: 'EarlyRTP'.
     *
     * @return string
     */
    public function getEarlyRTP()
    {
        return $this->_getEventKey('EarlyRTP');
    }

    /**
     * Returns key: 'DeviceStateAcc'.
     *
     * @return string
     */
    public function getDeviceStateAcc()
    {
        return $this->_getEventKey('DeviceStateAcc');
    }

    /**
     * Returns key: 'LastUsedAccessory'.
     *
     * @return string
     */
    public function getLastUsedAccessory()
    {
        return $this->_getEventKey('LastUsedAccessory');
    }

    /**
     * Returns key: 'LastDialedNumber'.
     *
     * @return string
     */
    public function getLastDialedNumber()
    {
        return $this->_getEventKey('LastDialedNumber');
    }

    /**
     * Returns key: 'DefaultLineInstance'.
     *
     * @return integer
     */
    public function getDefaultLineInstance()
    {
        return intval($this->_getEventKey('DefaultLineInstance'));
    }

    /**
     * Returns key: 'CustomBackgroundImage'.
     *
     * @return string
     */
    public function getCustomBackgroundImage()
    {
        return $this->_getEventKey('CustomBackgroundImage');
    }

    /**
     * Returns key: 'CustomRingTone'.
     *
     * @return string
     */
    public function getCustomRingTone()
    {
        return $this->_getEventKey('CustomRingTone');
    }

    /**
     * Returns key: 'UsePlacedCalls'.
     *
     * @return boolean
     */
    public function getUsePlacedCalls()
    {
        return $this->_getEventBoolKey('UsePlacedCalls');
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
     * Returns key: 'PendingDelete'.
     *
     * @return boolean
     */
    public function getPendingDelete()
    {
        return $this->_getEventBoolKey('PendingDelete');
    }

    /**
     * Returns key: 'DirectedPickup'.
     *
     * @return boolean
     */
    public function getDirectedPickup()
    {
        return $this->_getEventBoolKey('DirectedPickup');
    }

    /**
     * Returns key: 'PickupContext'.
     *
     * @return string
     */
    public function getPickupContext()
    {
        return $this->_getEventKey('PickupContext');
    }

    /**
     * Returns key: 'PickupModeAnswer'.
     *
     * @return boolean
     */
    public function getPickupModeAnswer()
    {
        return $this->_getEventBoolKey('PickupModeAnswer');
    }

    /**
     * Returns key: 'allowConference'.
     *
     * @return boolean
     */
    public function getallowConference()
    {
        return $this->_getEventBoolKey('allowConference');
    }

    /**
     * Returns key: 'confPlayGeneralAnnounce'.
     *
     * @return boolean
     */
    public function getconfPlayGeneralAnnounce()
    {
        return $this->_getEventBoolKey('confPlayGeneralAnnounce');
    }

    /**
     * Returns key: 'confPlayPartAnnounce'.
     *
     * @return boolean
     */
    public function getconfPlayPartAnnounce()
    {
        return $this->_getEventBoolKey('confPlayPartAnnounce');
    }

    /**
     * Returns key: 'confMuteOnEntry'.
     *
     * @return boolean
     */
    public function getconfMuteOnEntry()
    {
        return $this->_getEventBoolKey('confMuteOnEntry');
    }

    /**
     * Returns key: 'confMusicOnHoldClass'.
     *
     * @return string
     */
    public function getconfMusicOnHoldClass()
    {
        return $this->_getEventKey('confMusicOnHoldClass');
    }

    /**
     * Returns key: 'confShowConflist'.
     *
     * @return boolean
     */
    public function getconfShowConflist()
    {
        return $this->_getEventBoolKey('confShowConflist');
    }

    /**
     * Returns key: 'conflistActive'.
     *
     * @return boolean
     */
    public function getconflistActive()
    {
        return $this->_getEventBoolKey('conflistActive');
    }

    /**
     * Returns events[] related to ButtonEntries from the tables['Buttons']
     *
     * @return events[]
     */
	public function getButtons()
	{
		$res = array();
		if ($this->hasTable() && array_key_exists('Buttons', $this->_tables)) {
			$res = $this->_tables['Buttons'];
		}
		return $res;
	}

    /**
     * Returns events[] related to LineButtons from the tables['LineButtons']
     *
     * @return events[]
     */
	public function getLineButtons()
	{
		$res = array();
		if ($this->hasTable() && array_key_exists('LineButtons', $this->_tables)) {
			$res = $this->_tables['LineButtons'];
		}
		return $res;
	}

    /**
     * Returns events[] related to SpeeddialButtons from the tables['SpeeddialButtons']
     *
     * @return events[]
     */
	public function getSpeeddialButtons()
	{
		$res = array();
		if ($this->hasTable() && array_key_exists('SpeeddialButtons', $this->_tables)) {
			$res = $this->_tables['SpeeddialButtons'];
		}
		return $res;
	}


    /**
     * Returns events[] related to ServiceURLButtons from the tables['ServiceURLs']
     *
     * @return events[]
     */
	public function getServiceURLButtons()
	{
		$res = array();
		if ($this->hasTable() && array_key_exists('ServiceURLButtons', $this->_tables)) {
			$res = $this->_tables['ServiceURLButtons'];
		}
		return $res;
	}


    /**
     * Returns events[] related to FeatureButtons from the tables['FeatureButtons']
     *
     * @return events[]
     */
	public function getFeatureButtons()
	{
		$res = array();
		if ($this->hasTable() && array_key_exists('FeatureButtons', $this->_tables)) {
			$res = $this->_tables['FeatureButtons'];
		}
		return $res;
	}


    /**
     * Returns events[] related to Variables from the tables['Variables']
     *
     * @return events[]
     */
	public function getVariables()
	{
		$res = array();
		if ($this->hasTable() && array_key_exists('Variables', $this->_tables)) {
			$res = $this->_tables['Variables'];
		}
		return $res;
	}

    /**
     * Returns events[] related to DeviceCallStatistics from the tables['CallStatistics']
     *
     * @return events[]
     */
	public function getCallStatistics()
	{
		$res = array();
		if ($this->hasTable() && array_key_exists('CallStatistics', $this->_tables)) {
			$res = $this->_tables['CallStatistics'];
		}
		return $res;
	}

}
