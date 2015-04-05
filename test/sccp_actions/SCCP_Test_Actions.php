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

	private function _start(array $write, \PAMI\Message\Action\ActionMessage $action, $event = false)
	{
		global $mock_stream_socket_client;
		global $mock_stream_set_blocking;
		global $mockTime;
		global $standardAMIStart;
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
		$writeLogin = array(
			"action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n"
		);
		setFgetsMock($standardAMIStart, $writeLogin);
		$client = new \PAMI\Client\Impl\ClientImpl($options);
		$client->registerEventListener(new SomeListenerClass);
		$client->open();
		if ($event == false) {
			if ($action instanceof \PAMI\Message\Action\DBGetAction) {
				$event = array(
					'Response: Success',
					'EventList: start',
					'ActionID: 1432.123',
					'',
					'Event: DBGetResponse',
					'ActionID: 1432.123',
					''
				);
			} else if ($action instanceof \PAMI\Message\Action\SCCPConfigMetaDataAction) {
				$event = array(
					'Response: Success',
					'JSON: {"Name":"Chan-sccp-b","Branch":"RC2","Version":"4.2.0","Revision":"5995M","ConfigRevision":"5988","ConfigureEnabled": ["park","pickup","realtime","conferenence","dirtrfr","feature_monitor","functions","manager_events","devicestate","devstate_feature","dynamic_speeddial","dynamic_speeddial_cid","experimental","debug"],"Segments":["general","device","line","softkey"]}',
					'ActionID: 1432.123',
					'',
				);
			} else {
				$event = array(
					'Response: Success',
					'ActionID: 1432.123',
					''
				);
			}
		}
		setFgetsMock($event, $write);
		$result = $client->send($action);
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
		$event = array(
			'Response: Success',
			'JSON: {"Name":"Chan-sccp-b","Branch":"RC2","Version":"4.2.0","Revision":"5995M","ConfigRevision":"5988","ConfigureEnabled": ["park","pickup","realtime","conferenence","dirtrfr","feature_monitor","functions","manager_events","devicestate","devstate_feature","dynamic_speeddial","dynamic_speeddial_cid","experimental","debug"],"Segments":["general","device","line","softkey"]}',
			'ActionID: 1432.123',
			'',
		);
		$action = new \PAMI\Message\Action\SCCPConfigMetaDataAction('general');
		$result = $this->_start($write, $action, $event);
		$this->assertTrue($result instanceof \PAMI\Message\Response\ResponseMessage);
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
		$this->assertTrue(is_array($result->getJSON()));
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
		$action = new \PAMI\Message\Action\SCCPShowGlobalsAction();
		$result = $this->_start($write, $action);
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
		$action = new \PAMI\Message\Action\SCCPShowDevicesAction();
		$result = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPShowDevice()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowDevice',
			'actionid: 1432.123',
			'devicename: SEP0011223344',
			''
		)));
		$action = new \PAMI\Message\Action\SCCPShowDeviceAction('SEP0011223344');
		$result = $this->_start($write, $action);
	}

	/**
	 * @test
	 */
	public function can_get_SCCPShowDevice_Additional()
	{
		$write = array(implode("\r\n", array(
			'action: SCCPShowDevice',
			'actionid: 1432.123',
			'devicename: SEP0011223344',
			''
		)));
		/* does not work ?? */
/*
		$event = array(
			'Response: Success',
			'EventList: start',
			'ActionID: 1432.123',
			'Message: SCCPShowDevice list will follow',
			'',
			'Event: SCCPShowDevice',
			'ActionID: 1432.123',
			'MACAddress: SEP0023043403F9',
			'',
			'Event: SCCPShowDeviceComplete',
			'ActionID: 1432.123',
			'EventList: Complete',
			'ListItems: 304',
			'',
		);
*/
		/* works */
		$event = array(
			'Response: Success',
			'EventList: start',
			'ActionID: 1432.123',
			'',
			'Event: DBGetResponse',
			'ActionID: 1432.123',
			''
		);
		$action = new \PAMI\Message\Action\SCCPShowDeviceAction('SEP0011223344');
		$result = $this->_start($write, $action, $event);
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
	 * @test
	 */
	public function can_get_SCCPShowLine()
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


}
}