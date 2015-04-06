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
use PAMI\Exception\PAMIException;

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
class SCCPShowDeviceEvent extends EventMessage
{
    /**
     * Returns key: 'MACAddress'.
     *
     * @return string
     */
    public function getMACAddress()
    {
        return $this->getKey('MACAddress');
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
        return $this->getKey('ProtocolVersion');
    }

    /**
     * Returns key: 'ProtocolInUse'.
     *
     * @return string
     */
    public function getProtocolInUse()
    {
        return $this->getKey('ProtocolInUse');
    }

    /**
     * Returns key: 'DeviceFeatures'.
     *
     * @return string
     */
    public function getDeviceFeatures()
    {
        return $this->getKey('DeviceFeatures');
    }

    /**
     * Returns key: 'Tokenstate'.
     *
     * @return string
     */
    public function getTokenstate()
    {
        return $this->getKey('Tokenstate');
    }

    /**
     * Returns key: 'Keepalive'.
     *
     * @return integer
     */
    public function getKeepalive()
    {
        return intval($this->getKey('Keepalive'));
    }

    /**
     * Returns key: 'RegistrationState'.
     *
     * @return string
     */
    public function getRegistrationState()
    {
        return $this->getKey('RegistrationState');
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
     * Returns key: 'MWILight'.
     *
     * @return string
     */
    public function getMWILight()
    {
        return $this->getKey('MWILight');
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
        return $this->getKey('Description');
    }

    /**
     * Returns key: 'ConfigPhoneType'.
     *
     * @return string
     */
    public function getConfigPhoneType()
    {
        return $this->getKey('ConfigPhoneType');
    }

    /**
     * Returns key: 'SkinnyPhoneType'.
     *
     * @return string
     */
    public function getSkinnyPhoneType()
    {
        return $this->getKey('SkinnyPhoneType');
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
        return $this->getKey('Softkeyset');
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
        return $this->getKey('ImageVersion');
    }

    /**
     * Returns key: 'TimezoneOffset'.
     *
     * @return integer
     */
    public function getTimezoneOffset()
    {
        return intval($this->getKey('TimezoneOffset'));
    }

    /**
     * Returns key: 'Capabilities'.
     *
     * @return (string|int)[]
     */
    public function getCapabilities()
    {
    	$ret = array();
    	$codecs=explode(", ", substr($this->getKey('Capabilities'), 1, -1));
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
    	$codecs=explode(", ", substr($this->getKey('CodecsPreference'), 1, -1));
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
        return intval($this->getKey('AudioTOS'));
    }

    /**
     * Returns key: 'AudioCOS'.
     *
     * @return integer
     */
    public function getAudioCOS()
    {
        return intval($this->getKey('AudioCOS'));
    }

    /**
     * Returns key: 'VideoTOS'.
     *
     * @return integer
     */
    public function getVideoTOS()
    {
        return intval($this->getKey('VideoTOS'));
    }

    /**
     * Returns key: 'VideoCOS'.
     *
     * @return integer
     */
    public function getVideoCOS()
    {
        return intval($this->getKey('VideoCOS'));
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
        return $this->getKey('DNDStatus');
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
        return $this->getKey('DtmfMode');
    }

    /**
     * Returns key: 'Nat'.
     *
     * @return string
     */
    public function getNat()
    {
        return $this->getKey('Nat');
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
        return $this->getKey('BindAddress');
    }

    /**
     * Returns key: 'ServerAddress'.
     *
     * @return string
     */
    public function getServerAddress()
    {
        return $this->getKey('ServerAddress');
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
    	$entries=explode(",", substr($this->getKey('DenyPermit'), 0, -1));
    	foreach($entries as $entry) {
    		$entry_parts=explode(":", $entry);
    		if ($entry_parts[0]=="deny") {
    			$deny[] = $entry_parts[1];
    		} else if ($entry_parts[0]=="permit") {
    			$permit[] = $entry_parts[1];
    		} else {
    			throw new PAMIException('Could not parse DenyPermit value: ' . $this->getKey('DenyPermit'));
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
        return $this->getKey('PermitHosts');
    }

    /**
     * Returns key: 'EarlyRTP'.
     *
     * @return string
     */
    public function getEarlyRTP()
    {
        return $this->getKey('EarlyRTP');
    }

    /**
     * Returns key: 'DeviceStateAcc'.
     *
     * @return string
     */
    public function getDeviceStateAcc()
    {
        return $this->getKey('DeviceStateAcc');
    }

    /**
     * Returns key: 'LastUsedAccessory'.
     *
     * @return string
     */
    public function getLastUsedAccessory()
    {
        return $this->getKey('LastUsedAccessory');
    }

    /**
     * Returns key: 'LastDialedNumber'.
     *
     * @return string
     */
    public function getLastDialedNumber()
    {
        return $this->getKey('LastDialedNumber');
    }

    /**
     * Returns key: 'DefaultLineInstance'.
     *
     * @return integer
     */
    public function getDefaultLineInstance()
    {
        return intval($this->getKey('DefaultLineInstance'));
    }

    /**
     * Returns key: 'CustomBackgroundImage'.
     *
     * @return string
     */
    public function getCustomBackgroundImage()
    {
        return $this->getKey('CustomBackgroundImage');
    }

    /**
     * Returns key: 'CustomRingTone'.
     *
     * @return string
     */
    public function getCustomRingTone()
    {
        return $this->getKey('CustomRingTone');
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
        return $this->getKey('PickupContext');
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
        return $this->getKey('confMusicOnHoldClass');
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
     * Returns key: 'TableName'.
     *
     * @return string
     */
/*
    public function getTableName()
    {
        return $this->getKey('TableName');
    }
*/
}
