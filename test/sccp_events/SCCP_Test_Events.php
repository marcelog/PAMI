<?php
/**
 * This class will test some events.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/
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
namespace PAMI\Client\Impl {
/**
 * This class will test some events.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @link       http://marcelog.github.com/
 */
class SCCP_Test_Events extends \PHPUnit_Framework_TestCase
{
    private $_properties = array();

    public function setUp()
    {
        $this->_properties = array(
            'log4php.properties' => RESOURCES_DIR . DIRECTORY_SEPARATOR . 'log4php.properties'
        );
    }

	/**
     * @test
     */
    public function can_get_table_events()
    {
        $eventValues = array(
        	'TableStart' => array(
        		'TableName' => 'Start'
			),
        	'TableEnd' => array(
        		'TableName' => 'End'
			),
        );
        $eventTranslatedValues = array(
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
    }

    /**
     * @test
     */
    public function can_get_showdevices_events()
    {
        $eventValues = array(
        	'SCCPDeviceEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'Device',
				'Descr' => 'Phone Féour',
				'Address' => '[::ffff:10.15.15.205]:53108',
				'Mac' => 'SEP0023043403F9',
				'RegState' => 'OK',
				'Token' => 'No Token',
				'RegTime' => 'Sat Apr  4 23:36:53 2015',
				'Act' => 'No',
				'Lines' => '2',
				'Nat' => '(Auto)Off'
        	),
            'SCCPShowDevicesComplete' => array(
            	'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
        	'SCCPDeviceEntry' => array(
        		'Act' => false,
				'Lines' => 2,
        	),
            'SCCPShowDevicesComplete' => array(
            	'ListItems' => 1,
            ),
        );
        $eventGetters = array(
        	'SCCPDeviceEntry' => array(
        		'Act' => 'Active',
        		'Descr' => 'Description',
			),
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
    }

    /**
     * @test
     */
    public function can_get_showdevice_events()
    {
        $eventValues = array(
            'SCCPShowDevice' => array(
				'MACAddress' => 'SEP0023043403F9',
				'ProtocolVersion' => 'Supported \'22\', In Use \'22\'',
				'ProtocolInUse' => 'SCCP Version 22',
				'DeviceFeatures' => '0x85720016,10000101011100100000000000010110',
				'Tokenstate' => 'No Token',
				'Keepalive' => '60',
				'RegistrationState' => 'OK(5)',
				'State' => 'On Hook(0)',
				'MWILight' => 'On(2)',
				'MWIHandsetLight' => 'off',
				'Description' => 'Phone Féour',
				'ConfigPhoneType' => 'bl7970',
				'SkinnyPhoneType' => 'Cisco 7970(30006)',
				'SoftkeySupport' => 'yes',
				'Softkeyset' => 'my_softkeyset (0x7fa9d40f1ba0)',
				'BTemplateSupport' => 'yes',
				'LinesRegistered' => 'yes',
				'ImageVersion' => 'term70.default',
				'TimezoneOffset' => '0',
				'Capabilities' => '(slin16 (25), g722/64k (6), ulaw/64k (4))',
				'CodecsPreference' => '(g722/64k (6), g722/56k (7), g722/48k (8))',
				'AudioTOS' => '184',
				'AudioCOS' => '6',
				'VideoTOS' => '136',
				'VideoCOS' => '5',
				'DNDFeatureEnabled' => 'yes',
				'DNDStatus' => 'Disabled',
				'DNDAction' => 'Reject',
				'CanTransfer' => 'on',
				'CanPark' => 'on',
				'CanCFWDALL' => 'on',
				'CanCFWBUSY' => 'off',
				'CanCFWNOANSWER' => 'off',
				'AllowRinginNotification' => 'no',
				'PrivateSoftkey' => 'on',
				'DtmfMode' => 'RFC2833',
				'Nat' => '(Auto)Off',
				'Videosupport' => 'no',
				'DirectRTP' => 'off',
				'BindAddress' => '[::ffff:10.15.15.205]:52869',
				'ServerAddress' => '[::ffff:10.15.15.195]:60675',
				'DenyPermit' => 'deny:0.0.0.0/0.0.0.0,permit:10.15.15.0/255.255.255.0,permit:127.0.0.0/255.255.255.0,',
				'PermitHosts' => '',
				'EarlyRTP' => 'Ringout',
				'DeviceStateAcc' => 'Off Hook',
				'LastUsedAccessory' => 'Handset',
				'LastDialedNumber' => '',
				'DefaultLineInstance' => '1',
				'CustomBackgroundImage' => 'http://10.15.15.195:8088/static/strand.png',
				'CustomRingTone' => '---',
				'UsePlacedCalls' => 'on',
				'PendingUpdate' => 'off',
				'PendingDelete' => 'off',
				'DirectedPickup' => 'on',
				'PickupContext' => 'sccp (exists)',
				'PickupModeAnswer' => 'on',
				'allowConference' => 'on',
				'confPlayGeneralAnnounce' => 'on',
				'confPlayPartAnnounce' => 'on',
				'confMuteOnEntry' => 'on',
				'confMusicOnHoldClass' => 'default',
				'confShowConflist' => 'on',
				'conflistActive' => 'off',
            ),
            'SCCPDeviceButtonEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'DeviceButton',
				'Id' => '1',
				'Inst' => '1',
				'TypeStr' => 'Line',
				'Type' => '0',
				'pendUpdt' => 'No',
				'pendDel' => 'No',
				'Default' => 'Yes',
            ),
            'SCCPDeviceLineEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'DeviceLine',
				'Id' => '1',
				'Name' => '98041',
				'Suffix' => '',
				'Label' => 'Phone 4 Line 1',
				'CfwdType' => 'None',
				'CfwdNumber' => '',
            ),
            'SCCPDeviceSpeeddialEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'DeviceSpeeddial',
				'Id' => '3',
				'Name' => '98011',
				'Number' => '98011',
				'Hint' => '98011@hints',
			),
			'SCCPDeviceFeatureEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'DeviceFeature',
				'Id' => '8',
				'Name' => 'call forwared',
				'Options' => '500',
				'Status' => '0',
			),
			'SCCPDeviceServiceURLEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'DeviceFeature',
				'Id' => '8',
				'Name' => 'Services',
				'URL' => 'http://www.example.com/',
			),
			'SCCPDeviceStatisticsEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'DeviceStatistics',
				'Type' => 'LAST',
				'Calls' => '0',
				'PcktSnt' => '0',
				'PcktRcvd' => '0',
				'Lost' => '0',
				'Jitter' => '0',
				'Latency' => '0',
				'Quality' => '0.000000',
				'avgQual' => '0.000000',
				'meanQual' => '0.000000',
				'maxQual' => '0.000000',
				'rConceal' => '0.000000',
				'sConceal' => '0',
            ),
            'SCCPVariablesEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'Variable',
            	'Name' => 'Test',
            	'Value' => 'Something',
            ),
            'SCCPShowDeviceComplete' => array(
            	'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPShowDevice' => array(
				'Keepalive' => 60,
				'MWIHandsetLight' => false,
				'SoftkeySupport' => true,
				'BTemplateSupport' => true,
				'LinesRegistered' => true,
				'TimezoneOffset' => 0,
				'Capabilities' => array(array('name'=>'slin16', 'value'=>25), array('name'=>'g722/64k','value'=>6), array('name'=>'ulaw/64k','value'=>4)),
				'CodecsPreference' => array(array('name'=>'g722/64k', 'value'=>6), array('name'=>'g722/56k', 'value'=>7), array('name'=>'g722/48k', 'value'=>8)),
				'AudioTOS' => 184,
				'AudioCOS' => 6,
				'VideoTOS' => 136,
				'VideoCOS' => 5,
				'DNDFeatureEnabled' => true,
				'CanTransfer' => true,
				'CanPark' => true,
				'CanCFWDALL' => true,
				'CanCFWBUSY' => false,
				'CanCFWNOANSWER' => false,
				'AllowRinginNotification' => false,
				'PrivateSoftkey' => true,
				'Videosupport' => false,
				'DirectRTP' => false,
				'DenyPermit' => array('deny'=>array('0.0.0.0/0.0.0.0'),'permit'=>array('10.15.15.0/255.255.255.0','127.0.0.0/255.255.255.0')),
				'DefaultLineInstance' => 1,
				'UsePlacedCalls' => true,
				'PendingUpdate' => false,
				'PendingDelete' => false,
				'DirectedPickup' => true,
				'PickupModeAnswer' => true,
				'allowConference' => true,
				'confPlayGeneralAnnounce' => true,
				'confPlayPartAnnounce' => true,
				'confMuteOnEntry' => true,
				'confShowConflist' => true,
				'conflistActive' => false,
            ),
            'SCCPDeviceButtonEntry' => array(
            	'Id' => 1,
            	'Inst' => 1,
            	'Type' => 0,
            	'pendUpdt' => false,
            	'pendDel' => false,
            	'Default' => true,
            ),
            'SCCPDeviceLineEntry' => array(
				'Id' => 1,
				'Suffix' => 0,
            ),
            'SCCPDeviceSpeeddialEntry' => array(
				'Id' => 3,
			),
			'SCCPDeviceFeatureEntry' => array(
				'Id' => 8,
				'Status' => 0,
			),
			'SCCPDeviceServiceURLEntry' => array(
				'Id' => 8,
			),
			'SCCPDeviceStatisticsEntry' => array(
				'Calls' => 0,
				'PcktSnd' => 0,
				'PcktRcvd' => 0,
				'Lost' => 0,
				'Jitter' => 0,
				'Latency' => 0,
				'Quality' => 0.000000,
				'avgQual' => 0.000000,
				'meanQual' => 0.000000,
				'maxQual' => 0.000000,
				'rConceal' => 0.000000,
				'sConceal' => 0,
            ),
            'SCCPShowDeviceComplete' => array(
            	'ListItems' => 1,
            ),
        );
        $eventGetters = array(
            'SCCPShowDevice' => array(
            	'MACAddress' => 'DeviceName',
            ),
			'SCCPDeviceButtonEntry' => array(
				'pendUpdt' => 'PendingUpdate',
				'pendDel' => 'PendingDelete',
			),
			'SCCPDeviceStatisticsEntry' => array(
				'PcktSnt' => 'PacketsSent',
				'PcktRcvd' => 'PacketsReceived',
				'Lost' => 'PacketsLost',
				'avgQual' => 'AverageQuality',
				'meanQual' => 'MeanQuality',
				'maxQual' => 'MaxQuality',
				'rConceal' => 'ReceivedConcealed',
				'sConceal' => 'SentConcealed',
            ),
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
    }

    /**
     * @test
     * @expectedException \PAMI\Exception\PAMIException
     */
    public function cannot_showdevice_events_with_broken_denypermit()
    {
        $eventValues = array(
            'SCCPShowDevice' => array(
				'DenyPermit' => 'denny:0.0.0.0/0.0.0.0,permit:10.|ermit:127.0.0.0/255.255.255.0,',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPShowDevice' => array(
				'DenyPermit' => array('deny'=>array('0.0.0.0/0.0.0.0'),'permit'=>array('10.15.15.0/255.255.255.0','127.0.0.0/255.255.255.0')),
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
    }

    /**
     * @test
     */
    public function can_get_showlines_events()
    {
        $eventValues = array(
        	'SCCPLineEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'Line',
				'Exten' => '98011',
				'SubscriptionNumber' => '',
				'Label' => 'Diederik de Groot (98011)',
				'Device' => 'SEP001B54CA499B',
				'MWI' => 'OFF',
				'ActiveChannels' => '1',
				'ChannelState' => '--',
				'CallType' => '',
				'PartyName' => '',
				'Capabilities' => '',
        	),
            'SCCPShowLinesComplete' => array(
            	'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
        	'SCCPLineEntry' => array(
				'ActiveChannels' => 1,
        	),
            'SCCPShowLinesComplete' => array(
            	'ListItems' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
    }

    /**
     * @test
     */
    public function can_get_showline_events()
    {
        $eventValues = array(
            'SCCPShowLine' => array(
				'Name' => '98011',
				'Description' => 'chan-sccp.net',
				'Label' => 'Diederik de Groot (98011)',
				'ID' => '0005',
				'Pin' => '9944',
				'VoiceMailNumber' => '*998011',
				'TransferToVoicemail' => '699',
				'MeetMeEnabled' => 'on',
				'MeetMeNumber' => '',
				'MeetMeOptions' => 'qxd',
				'Context' => 'sccp (exists)',
				'Language' => 'nl',
				'AccountCode' => '98011',
				'Musicclass' => 'default',
				'AmaFlags' => '0',
				'CallGroup' => '1, 2',
				'PickupGroup' => '1, 3',
				'NamedCallGroup' => 'engineering,sales,netgroup,protgroup',
				'NamedPickupGroup' => 'sales',
				'ParkingLot' => 'default',
				'CallerIDName' => 'Diederik de Groot (98011)',
				'CallerIDNumber' => '98011',
				'IncomingCallsLimit' => '3',
				'ActiveChannelCount' => '0',
				'SecDialtoneDigits' => '9',
				'SecDialtone' => '0x22',
				'EchoCancellation' => 'on',
				'SilenceSuppression' => 'off',
				'CanTransfer' => 'on',
				'DNDAction' => 'Reject',
				'IsRealtimeLine' => 'on',
				'PendingDelete' => 'off',
				'PendingUpdate' => 'off',
				'RegistrationExtension' => '',
				'RegistrationContext' => '',
				'AdhocNumberAssigned' => 'on',
				'MessageWaitingNew' => '0',
				'MessageWaitingOld' => '0',
			),
            'SCCPAttachedDeviceEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'AttachedDevice',
				'DeviceName' => 'SEP001B54CA499B',
				'CfwdType' => 'Busy',
				'CfwdNumber' => '1234',
            ),
            'SCCPMailboxEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'Mailbox',
				'mailbox' => '98011',
				'context' => 'default',
            ),
            'SCCPVariablesEntry' => array(
            	'Name' => 'Test',
            	'Value' => 'Something',
            ),
            'SCCPShowLineComplete' => array(
            	'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPShowLine' => array(
				'ID' => 5,
				'Pin' => 9944,
				'MeetMeEnabled' => true,
				'AmaFlags' => 0,
				'CallGroup' => array(1, 2),
				'PickupGroup' => array(1, 3),
				'NamedCallGroup' => array('engineering','sales','netgroup','protgroup'),
				'NamedPickupGroup' => array('sales'),
				'IncomingCallsLimit' => 3,
				'ActiveChannelCount' => 0,
				'SecDialtoneDigits' => 9,
				'SecDialtone' => 34,
				'EchoCancellation' => true,
				'SilenceSuppression' => false,
				'CanTransfer' => true,
				'IsRealtimeLine' => true,
				'PendingDelete' => false,
				'PendingUpdate' => false,
				'AdhocNumberAssigned' => true,
				'MessageWaitingNew' => 0,
				'MessageWaitingOld' => 0,
			),
            'SCCPShowLineComplete' => array(
            	'ListItems' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
    }

    /**
     * @test
     */
    public function can_get_showchannels_events()
    {
        $eventValues = array(
        	'SCCPChannelEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'Channel',
				'ID' => '1',
				'Name' => 'SCCP/98011-00000001',
				'LineName' => '98011',
				'DeviceName' => 'SEP001B54CA499B',
				'NumCalled' => '98031',
				'PBXState' => 'Ring',
				'SCCPState' => 'RINGOUT',
				'ReadCodec' => 'alaw/64k',
				'WriteCodec' => 'alaw/64k',
				'RTPPeer' => '10.15.15.139:29312',
				'Direct' => 'no',
				'DTMFmode' => 'RFC2833',
        	),
            'SCCPVariablesEntry' => array(
            	'Name' => 'Test',
            	'Value' => 'Something',
            ),
            'SCCPShowChannelsComplete' => array(
            	'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
        	'SCCPChannelEntry' => array(
				'ID' => 1,
				'Direct' => false,
        	),
            'SCCPShowChannelsComplete' => array(
            	'ListItems' => 1,
            ),
        );
        $eventGetters = array(
        	'SCCPChannelEntry' => array(
        		'Direct' => 'DirectMedia',
        	),
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
    }

    /**
     * @test
     */
    public function can_get_session_events()
    {
        $eventValues = array(
            'SCCPSessionEntry' => array(
				'ChannelType' => 'SCCP',
				'ChannelObjectType' => 'Session',
				'ActionID' => '1428150989.9115',
				'Socket' => '18',
				'IP' => '::ffff:10.15.15.114',
				'Port' => '51139',
				'KA' => '55',
				'KAI' => '58',
				'DeviceName' => 'SEP0024C4446974',
				'State' => 'On Hook',
				'Type' => 'Cisco 7962',
				'RegState' => 'OK',
				'Token' => 'No Token',
            ),
            'SCCPShowSessionsComplete' => array(
            	'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPSessionEntry' => array (
            	'Socket' => 18,
            	'KA' => 55,
            	'KAI' => 58,
            ),
            'SCCPShowSessionsComplete' => array(
            	'ListItems' => 1,
            ),
        );
        $eventGetters = array(
        	'SCCPSessionEntry' => array (
				'KA' => 'KeepAlive',
				'KAI' => 'KeepAliveInterval'
			),
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
    }

    /**
     * @test
     */
   public function can_get_SCCPConference_events()
    {
        $eventValues = array(
            'SCCPConferenceEntry' => array(
                'ChannelType' => 'SCCP',
                'ChannelObjectType' => 'Conference',
                'Id' => '100',
                'Participants' => '1',
                'Moderators' => '1',
                'Announce' => 'Yes',
                'MuteOnEntry' => 'Yes',
            ),
            'SCCPShowConferencesComplete' => array(
                'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConferenceEntry' => array(
                'Id' => 100,
                'Participants' => 1,
                'Moderators' => 1,
                'Announce' => true,
                'MuteOnEntry' => true,
            ),
            'SCCPShowConferencesComplete' => array(
                'ListItems' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPHintLineState_events()
    {
        $eventValues = array(
            'SCCPHintLineStateEntry' => array(
                'ChannelType' => 'SCCP',
                'ChannelObjectType' => 'HintLineState',
                'LineName' => '98099',
                'State' => 'ONHOOK',
                'CallInfoNumber' => '',
                'CallInfoName' => '',
                'Direction' => 'INACTIVE',
            ),
            'SCCPShowHintLineStatesComplete' => array(
                'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPShowHintLineStatesComplete' => array(
                'ListItems' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPHintSubscription_events()
    {
        $eventValues = array(
            'SCCPHintSubscriptionEntry' => array(
                'ChannelType' => 'SCCP',
                'ChannelObjectType' => 'HintSubscription',
                'Exten' => '1234',
                'Context' => 'hints',
                'Hint' => 'SIP/1234',
                'State' => 'CONGESTION',
                'CallInfoNumber' => '',
                'CallInfoName' => '',
                'Direction' => '',
                'Subs' => '1',
            ),
            'SCCPShowHintSubscriptionsComplete' => array(
                'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPHintSubscriptionEntry' => array(
                'Subs' => 1,
            ),
            'SCCPShowHintSubscriptionsComplete' => array(
                'ListItems' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPMailboxSubscriber_events()
    {
        $eventValues = array(
            'SCCPMailboxSubscriberEntry' => array(
                'ChannelType' => 'SCCP',
                'ChannelObjectType' => 'MailboxSubscriber',
                'Mailbox' => '98041',
                'LineName' => '98041',
                'Context' => 'default',
                'New' => '0',
                'Old' => '0',
                'Sub' => 'YES',
            ),
            'SCCPShowMWISubscriptionsComplete' => array(
                'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPMailboxSubscriberEntry' => array(
                'New' => 0,
                'Old' => 0,
                'Sub' => true,
            ),
            'SCCPShowMWISubscriptionsComplete' => array(
                'ListItems' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPSoftKeySet_events()
    {
        $eventValues = array(
            'SCCPSoftKeySetEntry' => array(
                'ChannelType' => 'SCCP',
                'ChannelObjectType' => 'SoftKeySet',
                'Set' => 'default',
                'Mode' => 'ONHOOK',
                'Description' => 'On Hook',
                'LblID' => '0',
                'Label' => 'Redial',
            ),
            'SCCPShowSoftKeySetsComplete' => array(
                'ListItems' => '1',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPSoftKeySetEntry' => array(
                'LblID' => 0,
            ),
            'SCCPShowSoftKeySetsComplete' => array(
                'ListItems' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_CallAnswered_events()
    {
        $eventValues = array(
            'CallAnswered' => array(
                'Channel' => 'SCCP/00112244-100',
                'SCCPLine' => '98011',
                'SCCPDevice' => 'SEP0011223344',
                'Uniqueid' => '12345678',
                'CallingPartyNumber' => '666',
                'CallingPartyName' => 'His Majesty',
                'originalCallingParty' => 'The One',
                'lastRedirectingParty' => 'Someone',
            ),
        );
        $eventTranslatedValues = array(
            'CallAnswered' => array(
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_DeviceStatus_events()
    {
        $eventValues = array(
            'DeviceStatus' => array(
                'ChannelType' => 'SCCP',
                'ChannelObjectType' => 'DeviceStatus',
                'DeviceStatus' => 'REGISTERED',
                'SCCPDevice' => 'SEP0011223344',
            ),
        );
        $eventTranslatedValues = array(
            'DeviceStatus' => array(
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_DND_events()
    {
        $eventValues = array(
            'DND' => array(
                'ChannelType' => 'SCCP',
                'ChannelObjectType' => 'Device',
                'Feature' => 'Do not disturb',
                'Status' => 'On',
                'SCCPDevice' => 'SEP0011223344',
            ),
        );
        $eventTranslatedValues = array(
            'DND' => array(
            	'Status' => true,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_CallForward_events()
    {
        $eventValues = array(
            'CallForward' => array(
                'ChannelType' => 'SCCP',
                'ChannelObjectType' => 'Device',
                'Feature' => 'Cfwd',
                'Status' => 'On',
                'Extension' => '1234',
                'SCCPLine' => '98011',
                'SCCPDevice' => 'SEP0011223344',
            ),
        );
        $eventTranslatedValues = array(
            'CallForward' => array(
            	'Status' => true,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPConfEnd_events()
    {
        $eventValues = array(
            'SCCPConfEnd' => array(
                'ConfId' => '100',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConfEnd' => array(
                'ConfId' => 100,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPConfLeave_events()
    {
        $eventValues = array(
            'SCCPConfLeave' => array(
                'ConfId' => '111',
                'PartId' => '1',
                'Channel' => 'SCCP/00112244-100',
                'Uniqueid' => '12345678',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConfLeave' => array(
                'ConfId' => 111,
                'PartId' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPConfStart_events()
    {
        $eventValues = array(
            'SCCPConfStart' => array(
                'ConfId' => '100',
                'SCCPDevice' => 'SEP0011223344',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConfStart' => array(
                'ConfId' => 100,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPConfEntered_events()
    {
        $eventValues = array(
            'SCCPConfEntered' => array(
                'ConfId' => '100',
                'PartId' => '1',
                'Channel' => 'SCCP/00112244-100',
                'Uniqueid' => '12345678',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConfEntered' => array(
                'ConfId' => 100,
                'PartId' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPConfLeft_events()
    {
        $eventValues = array(
            'SCCPConfLeft' => array(
                'ConfId' => '100',
                'PartId' => '1',
                'Channel' => 'SCCP/00112244-100',
                'Uniqueid' => '12345678',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConfLeft' => array(
                'ConfId' => 100,
                'PartId' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPConfStarted_events()
    {
        $eventValues = array(
            'SCCPConfStarted' => array(
                'ConfId' => '100',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConfStarted' => array(
                'ConfId' => 100,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPConfParticipantKicked_events()
    {
        $eventValues = array(
            'SCCPConfParticipantKicked' => array(
                'ConfId' => '100',
                'PartId' => '1',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConfParticipantKicked' => array(
                'ConfId' => 100,
                'PartId' => 1,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPConfLock_events()
    {
        $eventValues = array(
            'SCCPConfLock' => array(
                'ConfId' => '100',
                'Enabled' => 'Yes',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConfLock' => array(
                'ConfId' => 100,
                'Enabled' => true,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPConfParticipantMute_events()
    {
        $eventValues = array(
            'SCCPConfParticipantMute' => array(
                'ConfId' => '100',
                'PartId' => '1',
                'Mute' => 'Yes',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConfParticipantMute' => array(
                'ConfId' => 100,
                'PartId' => 1,
                'Mute' => true,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    /**
     * @test
     */
    public function can_get_SCCPConfParticipantPromotion_events()
    {
        $eventValues = array(
            'SCCPConfParticipantPromotion' => array(
                'ConfId' => '100',
                'PartId' => '1',
                'Moderator' => 'Yes',
            ),
        );
        $eventTranslatedValues = array(
            'SCCPConfParticipantPromotion' => array(
                'ConfId' => 100,
                'PartId' => 1,
                'Moderator' => true,
            ),
        );
        $eventGetters = array(
        );
        foreach (array_keys($eventValues) as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName], $eventTranslatedValues);
        }
	}

    private function _testEvent($eventName, array $getters, array $values, array $translatedValues)
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
        $eventClass = "\\PAMI\\Message\\Event\\" . $eventName . 'Event';
        $mockTime = true;
        $mock_stream_socket_client = true;
        $mock_stream_set_blocking = true;
        $options = array(
            'log4php.properties' => RESOURCES_DIR . DIRECTORY_SEPARATOR . 'log4php.properties',
        	'host' => '2.3.4.5',
            'scheme' => 'tcp://',
        	'port' => 9999,
        	'username' => 'asd',
        	'secret' => 'asd',
            'connect_timeout' => 10,
        	'read_timeout' => 10
        );
        $write = array(
        	"action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n"
        );
        setFgetsMock($standardAMIStart, $write);
        $client = new \PAMI\Client\Impl\ClientImpl($options);
        $client->registerEventListener(new SomeListenerClass);
	    $client->open();
	    $message = array();
	    $message[] = 'Event: ' . $eventName;
	    foreach ($values as $key => $value) {
	        $message[] = $key . ': ' . $value;
	    }
	    $message[] = '';
	    setFgetsMock($message, $message);
	    for($i = 0; $i < count($message); $i++) {
	        $client->process();
	    }
	    $event = SomeListenerClass::$event;
        $this->assertTrue($event instanceof $eventClass, "Class '" . get_class($event) . "' is not an instance of '$eventClass'");
        foreach ($values as $key => $value) {
            if (isset($getters[$eventName][$key])) {
                $methodName = 'get' . $getters[$eventName][$key];
            } else {
                $methodName = 'get' . $key;
            }
            if (isset($translatedValues[$eventName][$key])) {
                $value = $translatedValues[$eventName][$key];
            }
            $this->assertEquals($event->$methodName(), $value, "Event: '$eventName'->'$methodName' to retrieve Key: '$key', returned Value: '". var_dump($event->$methodName()) ."' instead of expected: '" . var_dump($value) . "'");
        }
    }
}
}
