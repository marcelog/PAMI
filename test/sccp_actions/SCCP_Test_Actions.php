<?php
/**
 * This class will test some actions.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Action
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
 * This class will test some actions.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @link       http://marcelog.github.com/
 */
class SCCP_Test_Actions extends \PHPUnit_Framework_TestCase
{
	private $_properties = array();

	public function setUp()
	{
		global $mockTime;
		$this->_properties = array(
			'log4php.properties' => RESOURCES_DIR . DIRECTORY_SEPARATOR . 'log4php.properties'
		);
		$mockTime = true;
	}

	/** 
	 * Test Helper
	 */
	private function _start_action(array $write, \PAMI\Message\Action\ActionMessage $action, $response, $mocktime=true)
	{
		global $mock_stream_socket_client;
		global $mock_stream_set_blocking;
		global $mockTime;
		global $standardAMIStart;
		$mock_time = $mocktime;
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
			'read_timeout' => 100									/* readtimout still needs work, 100 needed for large responses */
		);
		$writeLogin = array(
			"action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n"
		);
		setFgetsMock($standardAMIStart, $writeLogin);
		$client = new \PAMI\Client\Impl\ClientImpl($options);
		$client->registerEventListener(new SomeListenerClass);
		$client->open();
		setFgetsMock($response, $write);
		$result = $client->send($action);
		return $result;
	}

	/** 
	 * Test Helper
	 */
	private function _start(array $write, \PAMI\Message\Action\ActionMessage $action)
	{
		if ($action instanceof \PAMI\Message\Action\DBGetAction) {
			$response = array(
				'Response: Success',
				'EventList: start',
				'ActionID: 1432.123',
				'',
				'Event: DBGetResponse',
				'ActionID: 1432.123',
				''
			);
		} else if ($action instanceof \PAMI\Message\Action\SCCPConfigMetaDataAction) {
			$response = array(
				'Response: Success',
				'JSON: {"Name":"Chan-sccp-b","Branch":"RC2","Version":"4.2.0","Revision":"5995M","ConfigRevision":"5988","ConfigureEnabled": ["park","pickup","realtime","conferenence","dirtrfr","feature_monitor","functions","manager_events","devicestate","devstate_feature","dynamic_speeddial","dynamic_speeddial_cid","experimental","debug"],"Segments":["general","device","line","softkey"]}',
				'ActionID: 1432.123',
				'',
			);
		} else {
			$response = array(
				'Response: Success',
				'ActionID: 1432.123',
				''
			);
		}
		$result = $this->_start_action($write, $action, $response, false);
		$this->assertTrue($result instanceof \PAMI\Message\Response\ResponseMessage);
		return $result;
	}

	/**
	 * @test
	 */
	public function can_get_SCCPConfigMetaData()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConfigMetaData',
			'actionid: 1432.123',
			''
		)));

		$action = new \PAMI\Message\Action\SCCPConfigMetaDataAction();
		$result = $this->_start($write, $action);
		$this->assertTrue($result instanceof \PAMI\Message\Response\ResponseMessage);
		$this->assertTrue($result instanceof \PAMI\Message\Response\SCCPGenericResponse);
		$this->assertTrue(is_array($result->getJSON()));
	}

	/**
	 * @test
	 */
	public function can_get_SCCPConfigMetaData_segment_general()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConfigMetaData',
			'actionid: 1432.123',
			'segment: general',
			''
		)));
		$response = array(
			'Response: Success',
			'JSON: {"Name":"Chan-sccp-b","Branch":"RC2","Version":"4.2.0","Revision":"5995M","ConfigRevision":"5988","ConfigureEnabled": ["park","pickup","realtime","conferenence","dirtrfr","feature_monitor","functions","manager_events","devicestate","devstate_feature","dynamic_speeddial","dynamic_speeddial_cid","experimental","debug"],"Segments":["general","device","line","softkey"]}',
			'ActionID: 1432.123',
			'',
		);
		$action = new \PAMI\Message\Action\SCCPConfigMetaDataAction('general');
		$result = $this->_start($write, $action, $response);
		$this->assertTrue($result instanceof \PAMI\Message\Response\ResponseMessage);
		$this->assertTrue($result instanceof \PAMI\Message\Response\SCCPGenericResponse);
		$this->assertTrue(is_array($result->getJSON()));
	}

	/**
	 * @test
	 */
	public function can_get_SCCPConfigMetaData_segment_device()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConfigMetaData',
			'actionid: 1432.123',
			'segment: device',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPConfigMetaDataAction('device');
		$result = $this->_start($write, $action);
		$this->assertTrue($result instanceof \PAMI\Message\Response\ResponseMessage);
		$this->assertTrue($result instanceof \PAMI\Message\Response\SCCPGenericResponse);
		$this->assertTrue(is_array($result->getJSON()));
	}

	/**
	 * @test
	 */
	public function can_get_SCCPConfigMetaData_segment_line()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConfigMetaData',
			'actionid: 1432.123',
			'segment: line',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPConfigMetaDataAction('line');
		$result = $this->_start($write, $action);
		$this->assertTrue($result instanceof \PAMI\Message\Response\ResponseMessage);
		$this->assertTrue($result instanceof \PAMI\Message\Response\SCCPGenericResponse);
		$this->assertTrue(is_array($result->getJSON()));
	}

	/**
	 * @test
	 */
	public function can_get_SCCPConfigMetaData_segment_softkey()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConfigMetaData',
			'actionid: 1432.123',
			'segment: softkey',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPConfigMetaDataAction('softkey');
		$result = $this->_start($write, $action);
		$this->assertTrue($result instanceof \PAMI\Message\Response\ResponseMessage);
		$this->assertTrue($result instanceof \PAMI\Message\Response\SCCPGenericResponse);
		$this->assertTrue(is_array($result->getJSON()));
	}

	/**
	 * @test
     * @expectedException \PAMI\Exception\PAMIException
	 */
	public function cannot_get_SCCPConfigMetaData_brokenjson()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConfigMetaData',
			'actionid: 1432.123',
			'segment: softkey',
			''
		)));
		$response = array(
			'Response: Success',
			'JSON: {{{[["Name":"Chan-sccp-b"' ,
			'ActionID: 1432.123',
			'',
		);
		$action = new \PAMI\Message\Action\SCCPConfigMetaDataAction('softkey');
		$result = $this->_start_action($write, $action, $response);
		$this->assertTrue($result instanceof \PAMI\Message\Response\SCCPGenericResponse);
		$this->assertTrue(is_array($result->getJSON()));
	}

    /**
     * @\\test
     */
    public function can_get_SCCPShowGlobals_Skipped()
    {
        $response = array(
            'Response: Success',
            'Message: SCCPShowGlobals',
            'ConfigFile: sccp.conf',
            ''
        );
        $action = new \PAMI\Message\Action\SCCPShowGlobalsAction();
        $result = $this->_start_action($write, $action, $response);
        $this->assertTrue($result instanceof \PAMI\Message\Response\SCCPShowGlobalsResponse);
        $this->assertTrue($result->isSuccess());
        $this->assertEquals($result->getConfigFile(), 'sccp.conf'); 
	}

    /**
     * @test
     */
    public function can_get_SCCPShowGlobals()
    {
        $write = array(implode("\r\n", array(
            'action: SCCPShowGlobals',
            'actionid: 1432.123',
            ''
        )));
        $responseValues = array(
        	'SCCPShowGlobals' => array(
				'ConfigFile' => 'sccp.conf',
				'PlatformByteOrder' => 'LITTLE ENDIAN',
				'ServerName' => 'moviebox',
				'BindAddress' => '[::]:2000',
				'ExternIP' => 'Not Set -> Using Incoming IP-addres.',
				'Localnet' => 'permit:127.0.0.0/255.0.0.0,permit:10.0.0.0/255.0.0.0,permit:172.0.0.0/255.224.0.0,permit:192.168.0.0/255.255.0.0,',
				'DenyPermit' => 'deny:0.0.0.0/0.0.0.0,permit:10.15.15.0/255.255.255.0,permit:127.0.0.0/255.255.255.0,',
				'DirectRTP' => 'off',
				'Nat' => 'Auto',
				'Keepalive' => '60',
				'Debug' => '(1153) none,core,channel,feature',
				'DateFormat' => 'M/D/YA',
				'FirstDigitTimeout' => '10',
				'DigitTimeout' => '4',
				'DigitTimeoutChar' => '#',
				'SCCPTosSignaling' => '104',
				'SCCPCosSignaling' => '4',
				'AUDIOTosRtp' => '184',
				'AUDIOCosRtp' => '6',
				'VIDEOTosVrtp' => '136',
				'VIDEOCosVrtp' => '5',
				'Context' => 'sccp (exists)',
				'Language' => 'en',
				'Accountcode' => 'skinny',
				'Musicclass' => 'default',
				'AMAFlags' => '3 (DOCUMENTATION)',
				'Callgroup' => '1,2',
				'Pickupgroup' => '1,3',
				'PickupModeAnswer' => 'on',
				'CodecsPreference' => '(g722/64k (6), g722/56k (7), g722/48k (8))',
				'CFWDALL' => 'on',
				'CFWDBUSY' => 'on',
				'CFWDNOANSWER' => 'on',
				'CallEvents' => 'on',
				'DNDFeatureEnabled' => 'on',
				'Park' => 'off',
				'PrivateSoftkey' => 'on',
				'EchoCancel' => 'on',
				'SilenceSuppression' => 'off',
				'EarlyRTP' => 'Ringout',
				'AutoAnswerRingtime' => '1',
				'AutoAnswerTone' => '0',
				'RemoteHangupTone' => '50',
				'TransferTone' => '0',
				'TransferOnHangup' => 'on',
				'CallwaitingTone' => '45',
				'CallwaitingInterval' => '5',
				'RegistrationContext' => 'sccpregistration',
				'JitterbufferEnabled' => 'on',
				'JitterbufferForced' => 'off',
				'JitterbufferMaxSize' => '200',
				'JitterbufferResync' => '1000',
				'JitterbufferImpl' => 'fixed',
				'JitterbufferLog' => 'off',
				'TokenFallBack' => '/usr/local/asterisk-11-branch/etc/asterisk/tokenack.sh',
				'TokenBackoffTime' => '0',
				'HotlineEnabled' => 'on',
				'HotlineContext' => 'default',
				'HotlineExten' => '500',
				'ThreadpoolSize' => '0/2',
			),
        );
        $responseTranslatedValues = array(
        	'SCCPShowGlobals' => array(
				'Keepalive' => 60,
				'FirstDigitTimeout' => 10,
				'DigitTimeout' => 4,
				'SCCPTosSignaling' => 104,
				'SCCPCosSignaling' => 4,
				'AUDIOTosRtp' => 184,
				'AUDIOCosRtp' => 6,
				'VIDEOTosVrtp' => 136,
				'VIDEOCosVrtp' => 5,
				'Callgroup' => array(1,2),
				'Pickupgroup' => array(1,3),
				'PickupModeAnswer' => true,
				'CodecsPreference' => array(array('name'=>'g722/64k','value'=>6), array('name'=>'g722/56k', 'value'=>7), array('name'=>'g722/48k', 'value'=>8)),
				'CFWDALL' => true,
				'CFWDBUSY' => true,
				'CFWDNOANSWER' => true,
				'CallEvents' => true,
				'DNDFeatureEnabled' => true,
				'Park' => false,
				'PrivateSoftkey' => true,
				'EchoCancel' => true,
				'SilenceSuppression' => false,
				'AutoAnswerRingtime' => 1,
				'AutoAnswerTone' => 0,
				'RemoteHangupTone' => 50,
				'TransferTone' => 0,
				'TransferOnHangup' => true,
				'CallwaitingTone' => 45,
				'CallwaitingInterval' => 5,
				'JitterbufferEnabled' => true,
				'JitterbufferForced' => false,
				'JitterbufferMaxSize' => 200,
				'JitterbufferResync' => 1000,
				'JitterbufferLog' => false,
				'TokenBackoffTime' => 0,
				'HotlineEnabled' => true,
			),
        );
        $responseGetters = array(
        );
        foreach (array_keys($responseValues) as $responseName) {
            $result = $this->_testActionResponse($responseName, $responseGetters, $responseValues[$responseName], $responseTranslatedValues);
        }
        $this->assertTrue($result instanceof \PAMI\Message\Response\SCCPShowGlobalsResponse);
        $this->assertTrue($result->isSuccess());
        $this->assertFalse($result->hasTable());
    }


	/**
	 * @test
	 */
	public function can_get_SCCPShowDevices()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowDevices',
			'actionid: 1432.123',
			''
		)));
        $response = array(implode("\r\n",  array(
			'Response: Success',
			'ActionID: 1432.123',
			'EventList: start',
			'Message: SCCPShowDevices list will follow',
			'',
			'Event: TableStart',
			'TableName: Devices',
			'ActionID: 1432.123',
			'',
			'Event: SCCPDeviceEntry',
			'ChannelType: SCCP',
			'ChannelObjectType: Device',
			'ActionID: 1432.123',
			'Descr: Phone Féour',
			'Address: [::ffff:10.11.11.111]:51887',
			'Mac: SEP001122334455',
			'RegState: OK',
			'Token: No Token',
			'RegTime: Tue Apr  7 21:17:28 2015',
			'Act: No',
			'Lines: 2',
			'Nat: (Auto)Off',
			'',
			'Event: SCCPDeviceEntry',
			'ChannelType: SCCP',
			'ChannelObjectType: Device',
			'ActionID: 1432.123',
			'Descr: Diederik de Groot',
			'Address: [::ffff:10.11.11.112]:50718',
			'Mac: SEP0024C4446974',
			'RegState: OK',
			'Token: No Token',
			'RegTime: Tue Apr  7 21:17:28 2015',
			'Act: No',
			'Lines: 2',
			'Nat: (Auto)Off',
			'',
			'Event: TableEnd',
			'TableName: Devices',
			'TableEntries: 2',
			'ActionID: 1432.123',
			'',
			'Event: SCCPShowDevicesComplete',
			'EventList: Complete',
			'ListItems: 15',
			'ListTableItems: 1',
			'ActionID: 1432.123',
            '',
        )));
		$action = new \PAMI\Message\Action\SCCPShowDevicesAction();
		$result = $this->_start_action($write, $action, $response);

		$this->assertTrue($result instanceof \PAMI\Message\Response\SCCPGenericResponse);
        $this->assertTrue($result->isSuccess());
        $this->assertTrue($result->hasTable());
        $this->assertTrue(is_array($result->getTableNames()));
        $this->assertTrue(is_array($result->getTable('Devices')));
        #$this->setExpectedException('PAMIException');
        #$this->assertFalse(is_array($result->getTable('NotATable')));
	}

	/**
	 * @test
	 * @expectedException \PAMI\Exception\PAMIException
	 */
	public function cannot_get_SCCPShowDevices_NonexistentTable()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowDevices',
			'actionid: 1432.123',
			''
		)));
        $response = array(implode("\r\n",  array(
			'Response: Success',
			'ActionID: 1432.123',
			'EventList: start',
			'Message: SCCPShowDevices list will follow',
			'',
			'Event: TableStart',
			'TableName: Devices',
			'ActionID: 1432.123',
			'',
			'Event: SCCPDeviceEntry',
			'ChannelType: SCCP',
			'ChannelObjectType: Device',
			'ActionID: 1432.123',
			'Descr: Phone Féour',
			'Address: [::ffff:10.11.11.111]:51887',
			'Mac: SEP001122334455',
			'RegState: OK',
			'Token: No Token',
			'RegTime: Tue Apr  7 21:17:28 2015',
			'Act: No',
			'Lines: 2',
			'Nat: (Auto)Off',
			'',
			'Event: SCCPDeviceEntry',
			'ChannelType: SCCP',
			'ChannelObjectType: Device',
			'ActionID: 1432.123',
			'Descr: Diederik de Groot',
			'Address: [::ffff:10.11.11.112]:50718',
			'Mac: SEP0024C4446974',
			'RegState: OK',
			'Token: No Token',
			'RegTime: Tue Apr  7 21:17:28 2015',
			'Act: No',
			'Lines: 2',
			'Nat: (Auto)Off',
			'',
			'Event: TableEnd',
			'TableName: Devices',
			'TableEntries: 2',
			'ActionID: 1432.123',
			'',
			'Event: SCCPShowDevicesComplete',
			'EventList: Complete',
			'ListItems: 15',
			'ListTableItems: 1',
			'ActionID: 1432.123',
            '',
        )));
		$action = new \PAMI\Message\Action\SCCPShowDevicesAction();
		$result = $this->_start_action($write, $action, $response);

		$this->assertTrue($result instanceof \PAMI\Message\Response\SCCPGenericResponse);
        $this->assertTrue($result->isSuccess());
        $this->assertTrue($result->hasTable());
        $this->assertTrue(is_array($result->getTable('NotATable')));		/* Table does not exist */
	}

	/**
	 * @test
	 */
	public function can_get_SCCPShowDevice()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowDevice',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			''
		)));
		$response = array(
			'Response: Success',
			'EventList: start',
			'ActionId: 1432.123',
			'Message: SCCPShowDevice list will follow',
			'',
			'Event: SCCPShowDevice',
			'ActionId: 1432.123',
			'MACAddress: SEP0023043403F9',
			'ProtocolVersion: Supported \'22\', In Use \'22\'',
			'ProtocolInUse: SCCP Version 22',
			'DeviceFeatures: 0x85720016,10000101011100100000000000010110',
			'Tokenstate: No Token',
			'Keepalive: 60',
			'RegistrationState: OK(5)',
			'State: On Hook(0)',
			'MWILight: On(2)',
			'MWIHandsetLight: off',
			'Description: Phone Féour',
			'ConfigPhoneType: bl7970',
			'SkinnyPhoneType: Cisco 7970(30006)',
			'SoftkeySupport: yes',
			'Softkeyset: my_softkeyset (0x7f2f08020af0)',
			'BTemplateSupport: yes',
			'linesRegistered: yes',
			'ImageVersion: term70.default',
			'TimezoneOffset: 0',
			'Capabilities: (slin16 (25), g722/64k (6), ulaw/64k (4), alaw/64k (2), g722/56k (7), g722/48k (8), g729b (15), g729ab (16), g729 (11), g729a (12), rfc2833 (257))',
			'CodecsPreference: (g722/64k (6), g722/56k (7), g722/48k (8), alaw/64k (2), alaw/56k (3), ulaw/64k (4), ulaw/56k (5), g729 (11), g729a (12), g729b (15), g729ab (16), g729/annex/b (85))',
			'AudioTOS: 184',
			'AudioCOS: 6',
			'VideoTOS: 136',
			'VideoCOS: 5',
			'DNDFeatureEnabled: yes',
			'DNDStatus: Disabled',
			'DNDAction: Reject',
			'CanTransfer: on',
			'CanPark: on',
			'CanCFWDALL: on',
			'CanCFWBUSY: off',
			'CanCFWNOANSWER: off',
			'AllowRinginNotification: no',
			'PrivateSoftkey: on',
			'DtmfMode: RFC2833',
			'Nat: (Auto)Off',
			'Videosupport: no',
			'DirectRTP: off',
			'TrustPhoneIpDeprecated: off',
			'BindAddress: [::ffff:10.15.15.205]:52899',
			'ServerAddress: [::ffff:10.15.15.195]:52781',
			'DenyPermit: deny:0.0.0.0/0.0.0.0,permit:10.15.15.0/255.255.255.0,permit:127.0.0.0/255.255.255.0,',
			'PermitHosts: ',
			'EarlyRTP: Ringout',
			'DeviceStateAcc: Off Hook',
			'LastUsedAccessory: Handset',
			'LastDialedNumber: ',
			'DefaultLineInstance: 1',
			'CustomBackgroundImage: http://10.15.15.195:8088/static/strand.png',
			'CustomRingTone: ---',
			'UsePlacedCalls: on',
			'PendingUpdate: off',
			'PendingDelete: off',
			'DirectedPickup: on',
			'PickupContext: sccp (exists)',
			'PickupModeAnswer: on',
			'allowConference: on',
			'confPlayGeneralAnnounce: on',
			'confPlayPartAnnounce: on',
			'confMuteOnEntry: on',
			'confMusicOnHoldClass: default',
			'confShowConflist: on',
			'conflistActive: off',
			'',
			'Event: TableStart',
			'ActionId: 1432.123',
			'TableName: Buttons',
			'',
			'Event: SCCPDeviceButtonEntry',
			'ActionId: 1432.123',
			'ChannelType: SCCP',
			'ChannelObjectType: DeviceButton',
			'Id: 1',
			'Inst: 1',
			'TypeStr: Line',
			'Type: 0',
			'pendUpdt: No',
			'pendDel: No',
			'Default: Yes',
			'',
			'Event: SCCPDeviceButtonEntry',
			'ActionId: 1432.123',
			'ChannelType: SCCP',
			'ChannelObjectType: DeviceButton',
			'Id: 2',
			'Inst: 2',
			'TypeStr: Line',
			'Type: 0',
			'pendUpdt: No',
			'pendDel: No',
			'Default: No',
			'',
			'Event: TableEnd',
			'ActionId: 1432.123',
			'TableName: Buttons',
			'TableEntries: 2',
			'',
			'Event: TableStart',
			'ActionId: 1432.123',
			'TableName: LineButtons',
			'',
			'Event: SCCPDeviceLineEntry',
			'ActionId: 1432.123',
			'ChannelType: SCCP',
			'ChannelObjectType: DeviceLine',
			'Id: 1',
			'Name: 98041',
			'Suffix: ',
			'Label: Phone 4 Line 1',
			'CfwdType: None',
			'CfwdNumber: ',
			'',
			'Event: SCCPDeviceLineEntry',
			'ActionId: 1432.123',
			'ChannelType: SCCP',
			'ChannelObjectType: DeviceLine',
			'Id: 2',
			'Name: 98099',
			'Suffix: 4',
			'Label: Shared',
			'CfwdType: None',
			'CfwdNumber: ',
			'',
			'Event: TableEnd',
			'ActionId: 1432.123',
			'TableName: LineButtons',
			'TableEntries: 2',
			'',
			'Event: TableStart',
			'ActionId: 1432.123',
			'TableName: SpeeddialButtons',
			'',
			'Event: SCCPDeviceSpeeddialEntry',
			'ActionId: 1432.123',
			'ChannelType: SCCP',
			'ChannelObjectType: DeviceSpeeddial',
			'Id: 3',
			'Name: 98011',
			'Number: 98011',
			'Hint: 98011@hints',
			'',
			'Event: SCCPDeviceSpeeddialEntry',
			'ActionId: 1432.123',
			'ChannelType: SCCP',
			'ChannelObjectType: DeviceSpeeddial',
			'Id: 4',
			'Name: 98031',
			'Number: 98031',
			'Hint: 98031@hints',
			'',
			'Event: TableEnd',
			'ActionId: 1432.123',
			'TableName: SpeeddialButtons',
			'TableEntries: 2',
			'',
			'Event: TableStart',
			'ActionId: 1432.123',
			'TableName: FeatureButtons',
			'',
			'Event: SCCPDeviceFeatureEntry',
			'ActionId: 1432.123',
			'ChannelType: SCCP',
			'ChannelObjectType: DeviceFeature',
			'Id: 8',
			'Name: call forwared',
			'Options: 500',
			'Status: 0',
			'',
			'Event: TableEnd',
			'ActionId: 1432.123',
			'TableName: FeatureButtons',
			'TableEntries: 1',
			'',
			'Event: TableStart',
			'ActionId: 1432.123',
			'TableName: ServiceURLButtons',
			'',
			'Event: TableEnd',
			'ActionId: 1432.123',
			'TableName: ServiceURLButtons',
			'TableEntries: 0',
			'',
			'Event: TableStart',
			'TableName: Variables',
			'ActionID: 1432.123',
			'',
			'Event: SCCPVariableEntry',
			'ChannelType: SCCP',
			'ChannelObjectType: Variable',
			'ActionID: 1432.123',
			'Name: testvariable1',
			'Value: myval1',
			'',
			'Event: SCCPVariableEntry',
			'ChannelType: SCCP',
			'ChannelObjectType: Variable',
			'ActionID: 1432.123',
			'Name: testvariable2',
			'Value: myval2',
			'',
			'Event: TableEnd',
			'TableName: Variables',
			'TableEntries: 2',
			'ActionID: 1432.123',
			'',
			'Event: TableStart',
			'ActionId: 1432.123',
			'TableName: CallStatistics',
			'',
			'Event: SCCPDeviceStatisticsEntry',
			'ActionId: 1432.123',
			'ChannelType: SCCP',
			'ChannelObjectType: DeviceStatistics',
			'Type: LAST',
			'Calls: 0',
			'PcktSnt: 0',
			'PcktRcvd: 0',
			'Lost: 0',
			'Jitter: 0',
			'Latency: 0',
			'Quality: 0.000000',
			'avgQual: 0.000000',
			'meanQual: 0.000000',
			'maxQual: 0.000000',
			'rConceal: 0.000000',
			'sConceal: 0',
			'',
			'Event: SCCPDeviceStatisticsEntry',
			'ActionId: 1432.123',
			'ChannelType: SCCP',
			'ChannelObjectType: DeviceStatistics',
			'Type: AVG',
			'Calls: 0',
			'PcktSnt: 0',
			'PcktRcvd: 0',
			'Lost: 0',
			'Jitter: 0',
			'Latency: 0',
			'Quality: 0.000000',
			'avgQual: 0.000000',
			'meanQual: 0.000000',
			'maxQual: 0.000000',
			'rConceal: 0.000000',
			'sConceal: 0',
			'',
			'Event: TableEnd',
			'ActionId: 1432.123',
			'TableName: CallStatistics',
			'TableEntries: 2',
			'',
			'Event: SCCPShowDeviceComplete',
			'ActionId: 1432.123',
			'EventList: Complete',
			'ListItems: 291',
			'ListTableItems: 6',
			''
		);
		$action = new \PAMI\Message\Action\SCCPShowDeviceAction('SEP001122334455');
		$result = $this->_start_action($write, $action, $response);
		$this->assertTrue($result instanceof \PAMI\Message\Response\SCCPShowDeviceResponse);
        $this->assertTrue($result->isSuccess());
        $this->assertTrue($result->isList());
		$events = $result->getEvents(); 
		$keyvalues = array(
			'MACAddress' => 'SEP0023043403F9',
			'ProtocolVersion' => 'Supported \'22\', In Use \'22\'',
			'ProtocolInUse' => 'SCCP Version 22',
			'DeviceFeatures' => '0x85720016,10000101011100100000000000010110',
			'Tokenstate' => 'No Token',
			'Keepalive' => 60,
			'RegistrationState' => 'OK(5)',
			'State' => 'On Hook(0)',
			'MWILight' => 'On(2)',
			'MWIHandsetLight' => false,
			'Description' => 'Phone Féour',
			'ConfigPhoneType' => 'bl7970',
			'SkinnyPhoneType' => 'Cisco 7970(30006)',
			'SoftkeySupport' => true,
			'Softkeyset' => 'my_softkeyset (0x7f2f08020af0)',
			'BTemplateSupport' => true,
			'linesRegistered' => true,
			'ImageVersion' => 'term70.default',
			'TimezoneOffset' => 0,
			//				'Capabilities' => '(slin16 (25), g722/64k (6), ulaw/64k (4), alaw/64k (2), g722/56k (7), g722/48k (8), g729b (15), g729ab (16), g729 (11), g729a (12), rfc2833 (257))',
			//				'CodecsPreference' => '(g722/64k (6), g722/56k (7), g722/48k (8), alaw/64k (2), alaw/56k (3), ulaw/64k (4), ulaw/56k (5), g729 (11), g729a (12), g729b (15), g729ab (16), g729/annex/b (85))',
			'AudioTOS' => 184,
			'AudioCOS' => 6,
			'VideoTOS' => 136,
			'VideoCOS' => 5,
			'DNDFeatureEnabled' => true,
			'DNDStatus' => 'Disabled',
			'DNDAction' => 'Reject',
			'CanTransfer' => true,
			'CanPark' => true,
			'CanCFWDALL' => true,
			'CanCFWBUSY' => false,
			'CanCFWNOANSWER' => false,
			'AllowRinginNotification' => false,
			'PrivateSoftkey' => true,
			'DtmfMode' => 'RFC2833',
			'Nat' => '(Auto)Off',
			'Videosupport' => false,
			'DirectRTP' => false,
			'BindAddress' => '[::ffff:10.15.15.205]:52899',
			'ServerAddress' => '[::ffff:10.15.15.195]:52781',
			//				'DenyPermit' => 'deny:0.0.0.0/0.0.0.0,permit:10.15.15.0/255.255.255.0,permit:127.0.0.0/255.255.255.0,',
			'PermitHosts' => '',
			'EarlyRTP' => 'Ringout',
			'DeviceStateAcc' => 'Off Hook',
			'LastUsedAccessory' => 'Handset',
			'LastDialedNumber' => '',
			'DefaultLineInstance' => 1,
			'CustomBackgroundImage' => 'http://10.15.15.195:8088/static/strand.png',
			'CustomRingTone' => '---',
			'UsePlacedCalls' => true,
			'PendingUpdate' => false,
			'PendingDelete' => false,
			'DirectedPickup' => true,
			'PickupContext' => 'sccp (exists)',
			'PickupModeAnswer' => true,
			'allowConference' => true,
			'confPlayGeneralAnnounce' => true,
			'confPlayPartAnnounce' => true,
			'confMuteOnEntry' => true,
			'confMusicOnHoldClass' => 'default',
			'confShowConflist' => true,
			'conflistActive' => false
		);
		$this->assertEquals($result->getDeviceName(), "SEP0023043403F9"); 
		foreach ($keyvalues as $key => $value) {
			$method='get' . $key;
			$this->assertEquals($result->$method(), $value, 'value[' . $result->$method() . '] of key: "' . $key . '" does not match expected ['. $value . "]\n");
		} 
		$this->assertTrue(is_array($result->getDenyPermit()));
		$this->assertTrue(is_array($result->getCapabilities()));
		$this->assertTrue(is_array($result->getCodecsPreference()));

		$this->assertTrue($result->hasTable());
		$this->assertEquals(array('Buttons','LineButtons','SpeeddialButtons','FeatureButtons','ServiceURLButtons','Variables','CallStatistics'), $result->getTableNames());
		$this->assertTrue(is_array($result->getTableNames()));
		$subtablenamess=array('Buttons','LineButtons','SpeeddialButtons','FeatureButtons','ServiceURLButtons','Variables','CallStatistics'); 
		foreach ($subtablenamess as $subtablename) {
			$getmethod = 'get' . $subtablename;
			$this->assertTrue(is_array($result->$getmethod()));
		}
		$this->assertEquals('Buttons', $result->getButtons()['Name']);
	}


	/**
	 * @test
	 */
	public function can_get_SCCPShowLines()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowLines',
			'actionid: 1432.123',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowLinesAction();
		$result = $this->_start($write, $action);
	}

	/**
	 * @\\test
	 */
	public function can_get_SCCPShowLine_bak()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowLine',
			'actionid: 1432.123',
			'linename: MyLine',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowLineAction('MyLine');
		$result = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPShowLine()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowLine',
			'actionid: 1432.123',
			'linename: 98011',
			''
		)));
		$response = array(
			'Response: Success',
			'ActionID: 1432.123',
			'EventList: start',
			'Message: SCCPShowLine list will follow',
			'',
			'Event: SCCPShowLine',
			'ActionID: 1432.123',
			'Name: 98011',
			'Description: chan-sccp.net',
			'Label: Diederik de Groot (98011)',
			'ID: 0005',
			'Pin: 9944',
			'VoiceMailNumber: *998011',
			'TransferToVoicemail: 699',
			'MeetMeEnabled: on',
			'MeetMeNumber: ',
			'MeetMeOptions: qxd',
			'Context: sccp (exists)',
			'Language: nl',
			'AccountCode: 98011',
			'Musicclass: default',
			'AmaFlags: 0',
			'CallGroup: 1',
			'PickupGroup: 1',
			'NamedCallGroup: engineering,sales,netgroup,protgroup',
			'NamedPickupGroup: sales',
			'ParkingLot: default',
			'CallerIDName: Diederik de Groot (98011)',
			'CallerIDNumber: 98011',
			'IncomingCallsLimit: 3',
			'ActiveChannelCount: 0',
			'SecDialtoneDigits: 9',
			'SecDialtone: 0x22',
			'EchoCancellation: on',
			'SilenceSuppression: off',
			'CanTransfer: on',
			'DNDAction: Reject',
			'IsRealtimeLine: on',
			'PendingDelete: off',
			'PendingUpdate: off',
			'RegistrationExtension: ',
			'RegistrationContext: ',
			'AdhocNumberAssigned: on',
			'MessageWaitingNew: 0',
			'MessageWaitingOld: 0',
			'',
			'Event: TableStart',
			'TableName: AttachedDevices',
			'ActionID: 1432.123',
			'',
			'Event: SCCPAttachedDeviceEntry',
			'ChannelType: SCCP',
			'ChannelObjectType: AttachedDevice',
			'ActionID: 1432.123',
			'DeviceName: SEP001B54CA499B',
			'CfwdType: ',
			'CfwdNumber: ',
			'',
			'Event: TableEnd',
			'TableName: AttachedDevices',
			'TableEntries: 1',
			'ActionID: 1432.123',
			'',
			'Event: TableStart',
			'TableName: Mailboxes',
			'ActionID: 1432.123',
			'',
			'Event: SCCPMailboxEntry',
			'ChannelType: SCCP',
			'ChannelObjectType: Mailbox',
			'ActionID: 1432.123',
			'mailbox: 98011',
			'context: default',
			'',
			'Event: TableEnd',
			'TableName: Mailboxes',
			'TableEntries: 1',
			'ActionID: 1432.123',
			'',
			'Event: TableStart',
			'TableName: Variables',
			'ActionID: 1432.123',
			'',
			'Event: SCCPVariableEntry',
			'ChannelType: SCCP',
			'ChannelObjectType: Variable',
			'ActionID: 1432.123',
			'Name: testvariable1',
			'Value: myval1',
			'',
			'Event: SCCPVariableEntry',
			'ChannelType: SCCP',
			'ChannelObjectType: Variable',
			'ActionID: 1432.123',
			'Name: testvariable2',
			'Value: myval2',
			'',
			'Event: TableEnd',
			'TableName: Variables',
			'TableEntries: 2',
			'ActionID: 1432.123',
			'',
			'Event: SCCPShowLineComplete',
			'EventList: Complete',
			'ListItems: 68',
			'ListTableItems: 2',
			'ActionID: 1432.123',
			''
		);
		$action = new \PAMI\Message\Action\SCCPShowLineAction('98011');
		$result = $this->_start_action($write, $action, $response);
		$this->assertTrue($result instanceof \PAMI\Message\Response\SCCPShowLineResponse);
        $this->assertTrue($result->isSuccess());
		$this->assertTrue($result->isList());
		$events = $result->getEvents(); 
		$keyvalues = array(
			'Name' => '98011',
			'Description' => 'chan-sccp.net',
			'Label' => 'Diederik de Groot (98011)',
			'ID' => '0005',
			'Pin' => '9944',
			'VoiceMailNumber' => '*998011',
			'TransferToVoicemail' => '699',
			'MeetMeEnabled' => true,
			'MeetMeNumber' => '',
			'MeetMeOptions' => 'qxd',
			'Context' => 'sccp (exists)',
			'Language' => 'nl',
			'AccountCode' => '98011',
			'Musicclass' => 'default',
			'AmaFlags' => 0,
			//'CallGroup' => 1,
			//'PickupGroup' => 1,
			//'NamedCallGroup' => 'engineering,sales,netgroup,protgroup',
			//'NamedPickupGroup' => 'sales',
			'ParkingLot' => 'default',
			'CallerIDName' => 'Diederik de Groot (98011)',
			'CallerIDNumber' => '98011',
			'IncomingCallsLimit' => 3,
			'ActiveChannelCount' => 0,
			'SecDialtoneDigits' => 9,
			'SecDialtone' => '0x22',
			'EchoCancellation' => true,
			'SilenceSuppression' => false,
			'CanTransfer' => true,
			'DNDAction' => 'Reject',
			'IsRealtimeLine' => true,
			'PendingDelete' => false,
			'PendingUpdate' => false,
			'RegistrationExtension' => '',
			'RegistrationContext' => '',
			'AdhocNumberAssigned' => true,
			'MessageWaitingNew' => 0,
			'MessageWaitingOld' => 0,
		);
		$this->assertEquals($result->getName(), "98011"); 
		foreach ($keyvalues as $key => $value) {
			$method='get' . $key;
			$this->assertEquals($result->$method(), $value, 'value[' . $result->$method() . '] of key: "' . $key . '" does not match expected ['. $value . "]\n");
		} 
		$this->assertTrue(is_array($result->getCallGroup()));
		$this->assertTrue(is_array($result->getPickupGroup()));
		$this->assertTrue(is_array($result->getNamedCallGroup()));
		$this->assertTrue(is_array($result->getNamedPickupGroup()));

		$this->assertTrue($result->hasTable());
		$this->assertEquals(array('AttachedDevices','Mailboxes','Variables'), $result->getTableNames());
		$this->assertTrue(is_array($result->getTableNames()));
		$this->assertTrue(is_array($result->getAttachedDevices()));
		$this->assertTrue(is_array($result->getMailboxes()));
		$this->assertTrue(is_array($result->getVariables()));
	}


	/**
	 * @test
	 */
	public function can_get_SCCPShowChannels()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowChannels',
			'actionid: 1432.123',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowChannelsAction();
		$result = $this->_start($write, $action);
	}

	/**
	 * @//test
	 * @expectedException \PAMI\Exception\PAMIException
	 */
	public function cannot_get_SCCPShowChannels()
	{
		$write = array(implode("\r\n", array(
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowChannelsAction('xxx');
		$result = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPShowSessions()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowSessions',
			'actionid: 1432.123',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowSessionsAction();
		$result = $this->_start($write, $action);
	}

	/**
	 * Test SCCPShowMWISubscriptions  action message.
	 * @test
	 */
	public function can_get_SCCPShowMWISubscriptions()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowMWISubscriptions',
			'actionid: 1432.123',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowMWISubscriptionsAction();
		$result = $this->_start($write, $action);
	}

	/**
	 * Test SCCPShowSoftkeySets  action message.
	 * @test
	 */
	public function can_get_SCCPShowSoftkeySets()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowSoftkeySets',
			'actionid: 1432.123',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowSoftkeySetsAction();
		$result = $this->_start($write, $action);
	}

	/**
	 * Test SCCPShowConferences  action message.
	 * @test
	 */
	public function can_get_SCCPShowConferences()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowConferences',
			'actionid: 1432.123',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowConferencesAction();
		$result = $this->_start($write, $action);
	}

	/**
	 * Test SCCPShowHintLineStates  action message.
	 * @test
	 */
	public function can_get_SCCPShowHintLineStates()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowHintLineStates',
			'actionid: 1432.123',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowHintLineStatesAction();
		$result = $this->_start($write, $action);
	}

	/**
	 * Test SCCPShowHintSubscriptions  action message.
	 * @test
	 */
	public function can_get_SCCPShowHintSubscriptions()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowHintSubscriptions',
			'actionid: 1432.123',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowHintSubscriptionsAction();
		$result = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_SCCPAnswerCall()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPAnswerCall1',
			'actionid: 1432.123',
			'channelid: 98011',
			'deviceid: SEP001122334455',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPAnswerCallAction('98011', 'SEP001122334455');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_SCCPConference_Endconf()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConference',
			'actionid: 1432.123',
			'conferenceid: 100',
			'participantid: 1',
			'command: endconf',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPConferenceAction('100', '1', 'endconf');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_SCCPConference_Kick()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConference',
			'actionid: 1432.123',
			'conferenceid: 100',
			'participantid: 1',
			'command: kick',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPConferenceAction('100', '1', 'Kick');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_SCCPConference_Mute()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConference',
			'actionid: 1432.123',
			'conferenceid: 100',
			'participantid: 1',
			'command: mute',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPConferenceAction('100', '1', 'Mute');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_SCCPConference_Invite()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConference',
			'actionid: 1432.123',
			'conferenceid: 100',
			'participantid: 1',
			'command: invite',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPConferenceAction('100', '1', 'Invite');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_SCCPConference_Moderate()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConference',
			'actionid: 1432.123',
			'conferenceid: 100',
			'participantid: 1',
			'command: moderate',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPConferenceAction('100', '1', 'moderate');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 * @expectedException \PAMI\Exception\PAMIException
	 */
	public function cannot_SCCPConference_with_wrong_comand()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConference',
			'actionid: 1432.123',
			'conferenceid: 100',
			'participantid: 1',
			'command: hangup',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPConferenceAction('100', '1', 'hangup');
		$result = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function cannot_SCCPConference_with_wrong_conferenceid_handle_error_returned()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPConference',
			'actionid: 1432.123',
			'conferenceid: 100',
			'participantid: 1',
			'command: kick',
			''
		)));
		$response = array(
			'Response: Error',
			'ActionID: 1432.123',
			'Message: Conference 100 not found',
			'',
		);
		$action = new \PAMI\Message\Action\SCCPConferenceAction('100', '1', 'kick');
		$result = $this->_start_action($write, $action, $response);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDeviceAddLine()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceAddLine',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'linename: 12345',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceAddLineAction('SEP001122334455', '12345');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDeviceRestart_restart()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceRestart',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'type: restart',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceRestartAction('SEP001122334455','restart');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDeviceRestart_full()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceRestart',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'type: full',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceRestartAction('SEP001122334455','full');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDeviceRestart_reset()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceRestart',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'type: reset',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceRestartAction('SEP001122334455','reset');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 * @expectedException \PAMI\Exception\PAMIException
	 */
	public function cannot_SCCPDeviceRestart_with_wrong_Type()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceRestart',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'type: boo',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceRestartAction('SEP001122334455','boo');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDeviceSetDND_on()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceSetDND',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'dndstate: on',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceSetDNDAction('SEP001122334455', 'on');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDeviceSetDND_reject()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceSetDND',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'dndstate: reject',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceSetDNDAction('SEP001122334455', 'reject');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDeviceSetDND_silent()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceSetDND',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'dndstate: silent',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceSetDNDAction('SEP001122334455', 'silent');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDeviceSetDND_off()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceSetDND',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'dndstate: off',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceSetDNDAction('SEP001122334455', 'off');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 * @expectedException \PAMI\Exception\PAMIException
	 */
	public function cannot_SCCPDeviceSetDND_with_wrong_dndstate()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceSetDND',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'dndstate: boo',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceSetDNDAction('SEP001122334455', 'boo');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDeviceUpdate()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDeviceUpdate',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDeviceUpdateAction('SEP001122334455');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDndDevice_off()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDndDevice',
			'actionid: 1432.123',
			'deviceid: SEP001122334455',
			'state: off',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDndDeviceAction('SEP001122334455', 'off');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDndDevice_reject()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDndDevice',
			'actionid: 1432.123',
			'deviceid: SEP001122334455',
			'state: reject',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDndDeviceAction('SEP001122334455', 'reject');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPDndDevice_silent()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDndDevice',
			'actionid: 1432.123',
			'deviceid: SEP001122334455',
			'state: silent',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDndDeviceAction('SEP001122334455', 'silent');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 * @expectedException \PAMI\Exception\PAMIException
	 */
	public function cannot_SCCPDndDevice_with_wrong_state()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPDndDevice',
			'actionid: 1432.123',
			'deviceid: SEP001122334455',
			'state: boo',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPDndDeviceAction('SEP001122334455', 'boo');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPHangupCall()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPHangupCall',
			'actionid: 1432.123',
			'channelid: SCCP/003423-432',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPHangupCallAction('SCCP/003423-432');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPHoldCall_hold()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPHoldCall',
			'actionid: 1432.123',
			'channelid: SCCP/003423-432',
			'devicename: SEP001122334455',
			'hold: on',
			'swapchannels: off',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPHoldCallAction('SCCP/003423-432', 'SEP001122334455', true);
		$client = $this->_start($write, $action);
	}


	/**
	 * @test
	 */
	public function can_get_SCCPHoldCall_resume()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPHoldCall',
			'actionid: 1432.123',
			'channelid: SCCP/003423-432',
			'devicename: SEP001122334455',
			'hold: off',
			'swapchannels: on',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPHoldCallAction('SCCP/003423-432', 'SEP001122334455', false, true);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 * @expectedException \PAMI\Exception\PAMIException
	 */
	public function cannot_SCCPHoldCall_hold_and_swapchannels()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPHoldCall',
			'actionid: 1432.123',
			'channelid: SCCP/003423-432',
			'devicename: SEP001122334455',
			'hold: on',
			'swapchannels: on',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPHoldCallAction('SCCP/003423-432', 'SEP001122334455', true, true);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPLineForwardUpdate_ForwardAll()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPLineForwardUpdate',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'linename: 12345',
			'forwardtype: all',
			'number: 666',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPLineForwardUpdateAction('SEP001122334455','12345','all',false, '666');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPLineForwardUpdate_ForwardBusy()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPLineForwardUpdate',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'linename: 12345',
			'forwardtype: busy',
			'number: 666',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPLineForwardUpdateAction('SEP001122334455','12345','busy',false,'666');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 * @expectedException \PAMI\Exception\PAMIException
	 */
	public function cannot_SCCPLineForwardUpdate_forward_with_wrong_type()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPLineForwardUpdate',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'linename: 12345',
			'forwardtype: boo',
			'number: 666',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPLineForwardUpdateAction('SEP001122334455','12345','boo',false,'666');
		$client = $this->_start($write, $action);
	}



	/**
	 * @test
	 */
	public function can_get_SCCPLineForwardUpdate_Disable()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPLineForwardUpdate',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'linename: 12345',
			'forwardtype: all',
			'disable: on',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPLineForwardUpdateAction('SEP001122334455','12345','all',true);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 * @expectedException \PAMI\Exception\PAMIException
	 */
	public function cannot_SCCPLineForwardUpdate_FailOnNumber()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPLineForwardUpdate',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'linename: 12345',
			'forwardtype: all',
			'disable: on',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPLineForwardUpdateAction('SEP001122334455','12345','all',true,'666');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPMessageDevices()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPMessageDevices',
			'actionid: 1432.123',
			'messagetext: Text to send to all devices',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPMessageDevicesAction('Text to send to all devices', false, false);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPMessageDevices_beep()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPMessageDevices',
			'actionid: 1432.123',
			'messagetext: Text to send to all devices',
			'beep: beep',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPMessageDevicesAction('Text to send to all devices', true, false);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPMessageDevices_beep_timeout()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPMessageDevices',
			'actionid: 1432.123',
			'messagetext: Text to send to all devices',
			'beep: beep',
			'timeout: 10',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPMessageDevicesAction('Text to send to all devices', true, 10);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPMessageDevice()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPMessageDevice',
			'actionid: 1432.123',
			'deviceid: SEP001122334455',
			'messagetext: Text to send to all devices',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPMessageDeviceAction('SEP001122334455', 'Text to send to all devices', false, false);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPMessageDevice_beep()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPMessageDevice',
			'actionid: 1432.123',
			'deviceid: SEP001122334455',
			'messagetext: Text to send to all devices',
			'beep: beep',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPMessageDeviceAction('SEP001122334455', 'Text to send to all devices', true, false);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPMessageDevice_beep_timeout()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPMessageDevice',
			'actionid: 1432.123',
			'deviceid: SEP001122334455',
			'messagetext: Text to send to all devices',
			'beep: beep',
			'timeout: 10',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPMessageDeviceAction('SEP001122334455', 'Text to send to all devices', true, 10);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPSystemMessage()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPSystemMessage',
			'actionid: 1432.123',
			'messagetext: Text to send to all devices',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPSystemMessageAction('Text to send to all devices', false, false);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPSystemMessage_beep()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPSystemMessage',
			'actionid: 1432.123',
			'messagetext: Text to send to all devices',
			'beep: beep',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPSystemMessageAction('Text to send to all devices', true, false);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPSystemMessage_timeout()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPSystemMessage',
			'actionid: 1432.123',
			'messagetext: Text to send to all devices',
			'beep: beep',
			'timeout: 10',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPSystemMessageAction('Text to send to all devices', true, 10);
		$client = $this->_start($write, $action);
	}


	/**
	 * @test
	 */
	public function can_get_SCCPShowConference()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowConference',
			'actionid: 1432.123',
			'conferenceid: 100',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowConferenceAction(100);
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPStartCall()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPStartCall',
			'actionid: 1432.123',
			'devicename: SEP001122334455',
			'linename: 98011',
			'number: 666',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPStartCallAction('SEP001122334455','98011','666');
		$client = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPTokenAck()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPTokenAck',
			'actionid: 1432.123',
			'deviceid: SEP001122334455',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPTokenAckAction('SEP001122334455');
		$client = $this->_start($write, $action);
	}

    private function _testActionResponse($actionName, array $getters, array $values, array $translatedValues)
    {
        $actionClass = "\\PAMI\\Message\\Action\\" . $actionName . 'Action';
        $resultClass = "\\PAMI\\Message\\Response\\" . $actionName . 'Response';

        $write = array(implode("\r\n", array(
            'action: ' . $actionName,
            'actionid: 1432.123',
            ''
        )));

	    $response = array();
	    $response[] = 'Response: ' . $actionName;
	    foreach ($values as $key => $value) {
	        $response[] = $key . ': ' . $value;
	    }
	    $response[] = '';

		$action = new $actionClass();
		$result = $this->_start_action($write, $action, $response, true);

		// cheating on timeout ?...
	    /*
	    for($i = 0; $i < count($response); $i++) {
	        $result->process();
	    }
	    */
		$this->assertTrue($result instanceof $resultClass, "Class '" . get_class($result) . "' is not an instance of '$resultClass'");
		$this->assertTrue($result->isSuccess());

        foreach ($values as $key => $value) {
            if (isset($getters[$actionName][$key])) {
                $methodName = 'get' . $getters[$actionName][$key];
            } else {
                $methodName = 'get' . $key;
            }
            if (isset($translatedValues[$actionName][$key])) {
                $value = $translatedValues[$actionName][$key];
            }
            $this->assertEquals($result->$methodName(), $value, "Action: '$actionName'->'$methodName' to retrieve Key: '$key', returned Value: '". var_dump($result->$methodName()) ."' instead of expected: '" . var_dump($value) . "'");
		}
		return $result;
    }

}
}