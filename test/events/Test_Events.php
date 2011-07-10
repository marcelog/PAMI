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
class Test_Events extends \PHPUnit_Framework_TestCase
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
    public function can_report_events()
    {
        $eventNames = array(
            'AGIExec', 'VarSet', 'Unlink', 'vgsm_sms_rx', 'vgsm_net_state',
            'vgsm_me_state', 'DTMF', 'Bridge', 'VoicemailUserEntryComplete',
            'StatusComplete'
        );
        $eventValues = array(
            'VoicemailUserEntryComplete' => array(),
        	'StatusComplete' => array('Items' => 'Items'),
            'DTMF' => array(
            	'Privilege' => 'Privilege',
        		'UniqueID' => 'UniqueID',
                'Channel' => 'Channel',
                'Direction' => 'Direction',
                'End' => 'End',
                'Begin' => 'Begin',
                'Digit' => 'Digit'
        	),
            'AGIExec' => array(
            	'Privilege' => 'Privilege',
            	'CommandId' => 'CommandId',
                'SubEvent' => 'SubEvent',
                'Channel' => 'Channel',
                'Command' => 'Command',
                'Result' => 'Result',
                'ResultCode' => 'ResultCode'
        	),
            'VarSet' => array(
            	'Privilege' => 'Privilege',
                'Channel' => 'Channel',
                'Variable' => 'Variable',
                'Value' => 'Value',
        	    'UniqueID' => 'UniqueID'
        	),
        	'Unlink' => array(
        		'Privilege' => 'Privilege',
        	    'CallerID1' => 'CallerID1',
        	    'CallerID2' => 'CallerID2',
        	    'UniqueID1' => 'UniqueID1',
        		'UniqueID2' => 'UniqueID2',
        	    'Channel1' => 'Channel1',
        		'Channel2' => 'Channel2',
        	),
        	'Bridge' => array(
        		'Privilege' => 'Privilege',
        	    'CallerID1' => 'CallerID1',
        	    'CallerID2' => 'CallerID2',
        	    'UniqueID1' => 'UniqueID1',
        		'UniqueID2' => 'UniqueID2',
        	    'Channel1' => 'Channel1',
        		'Channel2' => 'Channel2',
        	    'BridgeState' => 'BridgeStart',
        	    'BridgeType' => 'BridgeType'
        	),
        	'vgsm_sms_rx' => array(
        		'Privilege' => 'Privilege',
        		'X-SMS-Status-Report-Indication' => 'X-SMS-Status-Report-Indication',
        	    'X-SMS-User-Data-Header-Indicator' => 'X-SMS-User-Data-Header-Indicator',
        	    'X-SMS-Reply-Path' => 'X-SMS-Reply-Path',
        	    'X-SMS-More-Messages-To-Send' => 'X-SMS-More-Messages-To-Send',
        	    'X-SMS-SMCC-Number' => 'X-SMS-SMCC-Number',
        	    'X-SMS-SMCC-TON' => 'X-SMS-SMCC-TON',
        	    'X-SMS-SMCC-NP' => 'X-SMS-SMCC-NP',
        	    'X-SMS-Sender-Number' => 'X-SMS-Sender-Number',
        	    'X-SMS-Sender-TON' => 'X-SMS-Sender-TON',
        	    'X-SMS-Sender-NP' => 'X-SMS-Sender-NP',
        	    'X-SMS-Message-Type' => 'X-SMS-Message-Type',
        	    'Content' => 'Content',
        	    'Date' => 'Date',
        	    'Content-Transfer-Encoding' => 'ContentEncoding',
        		'Content-Type' => 'ContentType',
        	    'MIME-Version' => 'MIME-Version',
        	    'Subject' => 'Subject',
        	    'From' => 'From',
        	    'Received' => 'Received'
        	),
        	'vgsm_net_state' => array(
        		'Privilege' => 'Privilege',
        		'X-vGSM-GSM-Registration' => 'X-vGSM-GSM-Registration',
        	),
        	'vgsm_me_state' => array(
        		'Privilege' => 'Privilege',
        	    'X-vGSM-ME-State-Change-Reason' => 'X-vGSM-ME-State-Change-Reason',
        	    'X-vGSM-ME-Old-State' => 'X-vGSM-ME-Old-State',
        	    'X-vGSM-ME-State' => 'X-vGSM-ME-State',
        	)
        );
        $eventGetters = array(
            'AGIExec' => array(),
            'VarSet' => array('Variable' => 'VariableName'),
        	'StatusComplete' => array('Items' => 'ListItems'),
        	'vgsm_sms_rx' => array(
        	    'X-SMS-Status-Report-Indication' => 'StatusReportIndication',
        	    'X-SMS-User-Data-Header-Indicator' => 'DataHeaderIndicator',
        	    'X-SMS-Reply-Path' => 'ReplyPath',
        	    'X-SMS-More-Messages-To-Send' => 'MoreMessagesToSend',
                'X-SMS-SMCC-Number' => 'SMCCNumber',
        	    'X-SMS-SMCC-TON' => 'SMCCTON',
        	    'X-SMS-SMCC-NP' => 'SMCCNP',
        	    'X-SMS-Sender-Number' => 'SenderNumber',
        	    'X-SMS-Sender-TON' => 'SenderTON',
        	    'X-SMS-Sender-NP' => 'SenderNP',
        	    'X-SMS-Message-Type' => 'MessageType',
                'Content-Transfer-Encoding' => 'ContentEncoding',
                'Content-Type' => 'ContentType',
                'MIME-Version' => 'MIMEVersion'
        	),
        	'vgsm_net_state' => array('X-vGSM-GSM-Registration' => 'State'),
        	'vgsm_me_state' => array(
        		'X-vGSM-ME-State-Change-Reason' => 'Reason',
        	    'X-vGSM-ME-Old-State' => 'OldState',
        	    'X-vGSM-ME-State' => 'State',
        	)
        );
        foreach ($eventNames as $eventName) {
            $this->_testEvent($eventName, $eventGetters, $eventValues[$eventName]);
        }
    }

    private function _testEvent($eventName, array $getters, array $values)
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
        $this->assertTrue($event instanceof $eventClass);
        foreach ($values as $key => $value) {
            if (isset($getters[$eventName][$key])) {
                $methodName = 'get' . $getters[$eventName][$key];
            } else {
                $methodName = 'get' . $key;
            }
            $this->assertEquals($event->$methodName(), $value);
        }
    }
}
}