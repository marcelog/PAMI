<?php
/**
 * A generic response message from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
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
namespace PAMI\Message\Response;

use PAMI\Message\Response\ResponseMessage;

/**
 * A generic response message from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class SCCPShowGlobalsResponse extends SCCPGenericResponse
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
    
    /**
     * Returns key: 'ConfigFile'.
     *
     * @return string
     */
    public function getConfigFile()
    {
        return $this->getKey('ConfigFile');
    }

    /**
     * Returns key: 'PlatformByteOrder'.
     *
     * @return string
     */
    public function getPlatformByteOrder()
    {
        return $this->getKey('PlatformByteOrder');
    }

    /**
     * Returns key: 'ServerName'.
     *
     * @return string
     */
    public function getServerName()
    {
        return $this->getKey('ServerName');
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
     * Returns key: 'ExternIP'.
     *
     * @return string
     */
    public function getExternIP()
    {
        return $this->getKey('ExternIP');
    }

    /**
     * Returns key: 'Localnet'.
     *
     * @return string
     */
    public function getLocalnet()
    {
        return $this->getKey('Localnet');
    }

    /**
     * Returns key: 'DenyPermit'.
     *
     * @return string
     */
    public function getDenyPermit()
    {
        return $this->getKey('DenyPermit');
    }

    /**
     * Returns key: 'DirectRTP'.
     *
     * @return string
     */
    public function getDirectRTP()
    {
        return $this->getKey('DirectRTP');
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
     * Returns key: 'Keepalive'.
     *
     * @return integer
     */
    public function getKeepalive()
    {
        return intval($this->getKey('Keepalive'));
    }

    /**
     * Returns key: 'Debug'.
     *
     * @return string
     */
    public function getDebug()
    {
        return $this->getKey('Debug');
    }

    /**
     * Returns key: 'DateFormat'.
     *
     * @return string
     */
    public function getDateFormat()
    {
        return $this->getKey('DateFormat');
    }

    /**
     * Returns key: 'FirstDigitTimeout'.
     *
     * @return integer
     */
    public function getFirstDigitTimeout()
    {
        return intval($this->getKey('FirstDigitTimeout'));
    }

    /**
     * Returns key: 'DigitTimeout'.
     *
     * @return integer
     */
    public function getDigitTimeout()
    {
        return intval($this->getKey('DigitTimeout'));
    }

    /**
     * Returns key: 'DigitTimeoutChar'.
     *
     * @return string
     */
    public function getDigitTimeoutChar()
    {
        return $this->getKey('DigitTimeoutChar');
    }

    /**
     * Returns key: 'SCCPTosSignaling'.
     *
     * @return integer
     */
    public function getSCCPTosSignaling()
    {
        return intval($this->getKey('SCCPTosSignaling'));
    }

    /**
     * Returns key: 'SCCPCosSignaling'.
     *
     * @return integer
     */
    public function getSCCPCosSignaling()
    {
        return intval($this->getKey('SCCPCosSignaling'));
    }

    /**
     * Returns key: 'AUDIOTosRtp'.
     *
     * @return integer
     */
    public function getAUDIOTosRtp()
    {
        return intval($this->getKey('AUDIOTosRtp'));
    }

    /**
     * Returns key: 'AUDIOCosRtp'.
     *
     * @return integer
     */
    public function getAUDIOCosRtp()
    {
        return intval($this->getKey('AUDIOCosRtp'));
    }

    /**
     * Returns key: 'VIDEOTosVrtp'.
     *
     * @return string
     */
    public function getVIDEOTosVrtp()
    {
        return intval($this->getKey('VIDEOTosVrtp'));
    }

    /**
     * Returns key: 'VIDEOCosVrtp'.
     *
     * @return integer
     */
    public function getVIDEOCosVrtp()
    {
        return intval($this->getKey('VIDEOCosVrtp'));
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
     * Returns key: 'Accountcode'.
     *
     * @return string
     */
    public function getAccountcode()
    {
        return $this->getKey('Accountcode');
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
     * Returns key: 'AMAFlags'.
     *
     * @return string
     */
    public function getAMAFlags()
    {
        return $this->getKey('AMAFlags');
    }

    /**
     * Returns key: 'Callgroup'.
     *
     * @return integer[]
     */
    public function getCallgroup()
    {
        return array_map('intval', explode(",", $this->getKey('Callgroup')));
    }

    /**
     * Returns key: 'Pickupgroup'.
     *
     * @return integer[]
     */
    public function getPickupgroup()
    {
        return array_map('intval', explode(",", $this->getKey('Pickupgroup')));
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
     * Returns key: 'CFWDALL'.
     *
     * @return boolean
     */
    public function getCFWDALL()
    {
    	return $this->getBoolKey('CFWDALL');
    }

    /**
     * Returns key: 'CFWBUSY'.
     *
     * @return boolean
     */
    public function getCFWDBUSY()
    {
    	return $this->getBoolKey('CFWDBUSY');
    }

    /**
     * Returns key: 'CFWNOANSWER'.
     *
     * @return boolean
     */
    public function getCFWDNOANSWER()
    {
    	return $this->getBoolKey('CFWDNOANSWER');
    }

    /**
     * Returns key: 'CallEvents'.
     *
     * @return boolean
     */
    public function getCallEvents()
    {
    	return $this->getBoolKey('CallEvents');
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
     * Returns key: 'Park'.
     *
     * @return boolean
     */
    public function getPark()
    {
    	return $this->getBoolKey('Park');
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
     * Returns key: 'EchoCancel'.
     *
     * @return boolean
     */
    public function getEchoCancel()
    {
    	return $this->getBoolKey('EchoCancel');
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
     * Returns key: 'EarlyRTP'.
     *
     * @return string
     */
    public function getEarlyRTP()
    {
        return $this->getKey('EarlyRTP');
    }

    /**
     * Returns key: 'AutoAnswerRingtime'.
     *
     * @return string
     */
    public function getAutoAnswerRingtime()
    {
        return $this->getKey('AutoAnswerRingtime');
    }

    /**
     * Returns key: 'AutoAnswerTone'.
     *
     * @return string
     */
    public function getAutoAnswerTone()
    {
        return $this->getKey('AutoAnswerTone');
    }

    /**
     * Returns key: 'RemoteHangupTone'.
     *
     * @return integer
     */
    public function getRemoteHangupTone()
    {
        return intval($this->getKey('RemoteHangupTone'));
    }

    /**
     * Returns key: 'TransferTone'.
     *
     * @return string
     */
    public function getTransferTone()
    {
        return $this->getKey('TransferTone');
    }

    /**
     * Returns key: 'TransferOnHangup'.
     *
     * @return boolean
     */
    public function getTransferOnHangup()
    {
    	return $this->getBoolKey('TransferOnHangup');
    }

    /**
     * Returns key: 'CallwaitingTone'.
     *
     * @return integer
     */
    public function getCallwaitingTone()
    {
        return intval($this->getKey('CallwaitingTone'));
    }

    /**
     * Returns key: 'CallwaitingInterval'.
     *
     * @return integer
     */
    public function getCallwaitingInterval()
    {
        return intval($this->getKey('CallwaitingInterval'));
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
     * Returns key: 'JitterbufferEnabled'.
     *
     * @return boolean
     */
    public function getJitterbufferEnabled()
    {
    	return $this->getBoolKey('JitterbufferEnabled');
    }

    /**
     * Returns key: 'JitterbufferForced'.
     *
     * @return boolean
     */
    public function getJitterbufferForced()
    {
    	return $this->getBoolKey('JitterbufferForced');
    }

    /**
     * Returns key: 'JitterbufferMaxSize'.
     *
     * @return integer
     */
    public function getJitterbufferMaxSize()
    {
        return intval($this->getKey('JitterbufferMaxSize'));
    }

    /**
     * Returns key: 'JitterbufferResync'.
     *
     * @return integer
     */
    public function getJitterbufferResync()
    {
        return intval($this->getKey('JitterbufferResync'));
    }

    /**
     * Returns key: 'JitterbufferImpl'.
     *
     * @return string
     */
    public function getJitterbufferImpl()
    {
        return $this->getKey('JitterbufferImpl');
    }

    /**
     * Returns key: 'JitterbufferLog'.
     *
     * @return boolean
     */
    public function getJitterbufferLog()
    {
    	return $this->getBoolKey('JitterbufferLog');
    }

    /**
     * Returns key: 'TokenFallBack'.
     *
     * @return string
     */
    public function getTokenFallBack()
    {
        return $this->getKey('TokenFallBack');
    }

    /**
     * Returns key: 'TokenBackoffTime'.
     *
     * @return integer
     */
    public function getTokenBackoffTime()
    {
        return intval($this->getKey('TokenBackoffTime'));
    }

    /**
     * Returns key: 'HotlineEnabled'.
     *
     * @return boolean
     */
    public function getHotlineEnabled()
    {
    	return $this->getBoolKey('HotlineEnabled');
    }

    /**
     * Returns key: 'HotlineContext'.
     *
     * @return string
     */
    public function getHotlineContext()
    {
        return $this->getKey('HotlineContext');
    }

    /**
     * Returns key: 'HotlineExten'.
     *
     * @return string
     */
    public function getHotlineExten()
    {
        return $this->getKey('HotlineExten');
    }

    /**
     * Returns key: 'ThreadpoolSize'.
     *
     * @return string
     */
    public function getThreadpoolSize()
    {
        return $this->getKey('ThreadpoolSize');
    }

    
}