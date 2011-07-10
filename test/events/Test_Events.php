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
            'StatusComplete', 'ParkedCallsComplete', 'DBGetResponse',
            'VoicemailUserEntry', 'Transfer', 'Status', 'ShowDialPlanComplete',
            'Rename', 'RegistrationsComplete', 'RTPSenderStat', 'RTPReceiverStat',
            'RTCPSent', 'RTCPReceiverStat', 'RTCPReceived', 'QueueSummaryComplete',
            'QueueStatusComplete', 'DAHDIShowChannelsComplete', 'QueueSummary',
            'QueueParams', 'QueueMemberStatus', 'QueueMemberRemoved',
            'QueueMemberPaused', 'QueueMember', 'QueueMemberAdded', 'PeerlistComplete',
            'PeerStatus', 'PeerEntry'
        );
        $eventTranslatedValues = array(
            'QueueMemberStatus' => array(
                'Paused' => true
            ),
            'QueueMemberPaused' => array(
                'Paused' => true
            ),
            'QueueMember' => array(
                'Paused' => true
            ),
            'QueueMemberAdded' => array(
                'Paused' => true
            ),
        );
        $eventValues = array(
            'PeerEntry' => array(
                'RealtimeDevice' => 'RealtimeDevice',
                'Status' => 'Status',
                'ACL' => 'ACL',
                'TextSupport' => 'TextSupport',
                'VideoSupport' => 'VideoSupport',
                'NatSupport' => 'NatSupport',
                'Dynamic' => 'Dynamic',
                'IPPort' => 'IPPort',
                'IPAddress' => 'IPAddress',
                'ChanObjectType' => 'ChanObjectType',
                'ObjectName' => 'ObjectName',
                'ChannelType' => 'ChannelType',
            ),
        	'PeerStatus' => array(
                'Privilege' => 'Privilege',
                'ChannelType' => 'ChannelType',
                'Peer' => 'Peer',
                'PeerStatus' => 'PeerStatus'
            ),
            'QueueMemberRemoved' => array(
                'MemberName' => 'MemberName',
                'Location' => 'Location',
                'Queue' => 'Queue',
                'Privilege' => 'Privilege'
            ),
            'QueueMemberPaused' => array(
                'MemberName' => 'MemberName',
                'Location' => 'Location',
                'Queue' => 'Queue',
                'Privilege' => 'Privilege',
            	'Paused' => 1,
            ),
            'QueueMember' => array(
                'Name' => 'Name',
                'Location' => 'Location',
                'Queue' => 'Queue',
            	'Paused' => 1,
                'Status' => 'Status',
                'CallsTaken' => 'CallsTaken',
                'Penalty' => 'Penalty',
            	'Membership' => 'Membership',
            ),
            'QueueMemberAdded' => array(
                'MemberName' => 'MemberName',
                'LastCall' => 'LastCall',
                'Location' => 'Location',
                'Queue' => 'Queue',
            	'Paused' => 1,
                'Status' => 'Status',
                'CallsTaken' => 'CallsTaken',
                'Penalty' => 'Penalty',
            	'Membership' => 'Membership',
                'Privilege' => 'Privilege'
            ),
            'QueueMemberStatus' => array(
                'Paused' => 1,
                'Status' => 'Status',
                'CallsTaken' => 'CallsTaken',
                'Penalty' => 'Penalty',
                'Membership' => 'Membership',
                'MemberName' => 'MemberName',
                'Location' => 'Location',
                'Queue' => 'Queue',
                'Privilege' => 'Privilege'
            ),
        	'QueueParams' => array(
                'Completed' => '4',
        		'HoldTime' => '5',
                'Calls' => '6',
                'Strategy' => 'Strategy',
                'Max' => '6',
                'Queue' => 'Queue',
                'Weight' => '2',
                'ServiceLevelPerf' => 'ServiceLevelPerf',
                'ServiceLevel' => '1',
                'Abandoned' => '3'
            ),
            'QueueSummaryComplete' => array(),
        	'QueueSummary' => array(
                'LongestHoldTime' => 'LongestHoldTime',
                'HoldTime' => 'HoldTime',
                'Callers' => 'Callers',
                'Available' => 'Available',
                'LoggedIn' => 'LoggedIn',
                'Queue' => 'Queue',
            ),
            'QueueStatusComplete' => array(),
        	'DAHDIShowChannelsComplete' => array('items' => 'ListItems'),
        	'PeerlistComplete' => array('ListItems' => 'ListItems'),
            'RTCPReceived' => array(
                'DLSR' => 'DLSR',
                'RTT' => 'RTT',
                'LastSR' => 'LastSR',
                'IAJitter' => 'IAJitter',
                'SequenceNumberCycles' => 'SequenceNumberCycles',
                'HighestSequence' => 'HighestSequence',
                'PacketsLost' => 'PacketsLost',
                'FractionLost' => 'FractionLost',
                'SenderSSRC' => 'SenderSSRC',
                'ReceptionReports' => 'ReceptionReports',
                'PT' => 'PT',
                'Privilege' => 'Privilege',
                'From' => 'From',
            ),
            'RTCPReceiverStat' => array(
                'RRCount' => 'RRCount',
                'Jitter' => 'Jitter',
                'LostPackets' => 'LostPackets',
                'ReceivedPackets' => 'ReceivedPackets',
                'SSRC' => 'SSRC',
                'Privilege' => 'Privilege',
                'Transit' => 'Transit'
            ),
            'RTCPSent' => array(
                'DLSR' => 'DLSR',
                'TheirLastSR' => 'TheirLastSR',
                'IAJitter' => 'IAJitter',
                'CumulativeLoss' => 'CumulativeLoss',
                'FractionLost' => 'FractionLost',
                'ReportBlock' => 'ReportBlock',
                'SentOctets' => 'SentOctets',
                'SentPackets' => 'SentPackets',
                'SentRTP' => 'SentRTP',
                'SentNTP' => 'SentNTP',
                'OurSSRC' => 'OurSSRC',
                'To' => 'To',
                'Privilege' => 'Privilege'
            ),
            'RTPSenderStat' => array(
                'SRCount' => 'SRCount',
                'RTT' => 'RTT',
                'Jitter' => 'Jitter',
                'LostPackets' => 'LostPackets',
                'SentPackets' => 'SentPackets',
                'SSRC' => 'SSRC',
                'Privilege' => 'Privilege'
            ),
            'RTPReceiverStat' => array(
                'RRCount' => 'RRCount',
                'Jitter' => 'Jitter',
                'LostPackets' => 'LostPackets',
                'ReceivedPackets' => 'ReceivedPackets',
                'SSRC' => 'SSRC',
                'Privilege' => 'Privilege',
                'Transit' => 'Transit'
            ),
            'Rename' => array(
                'UniqueID' => 'UniqueID',
                'Newname' => 'Newname',
                'Channel' => 'Channel',
                'Privilege' => 'Privilege'
            ),
            'ShowDialPlanComplete' => array(
                'listcontexts' => 'listcontexts',
                'listpriorities' => 'listpriorities',
                'listextensions' => 'listextensions',
                'listitems' => 'listitems',
                'privilege' => 'privilege'
            ),
            'Status' => array(
                'BridgedUniqueID' => 'BridgedUniqueID',
                'BridgedChannel' => 'BridgedChannel',
                'Seconds' => 'Seconds',
                'AccountCode' => 'AccountCode',
                'Duration' => 'Duration',
                'CallerIDNum' => 'CallerIDNum',
                'ApplicationData' => 'ApplicationData',
                'Application' => 'Application',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'ChannelState' => 'ChannelState',
                'Priority' => 'Priority',
                'Extension' => 'Extension',
                'Context' => 'Context',
                'UniqueID' => 'UniqueID',
        		'Privilege' => 'Privilege',
                'Channel' => 'Channel'
            ),
            'Transfer' => array(
                'TransferContext' => 'TransferContext',
                'TransferExten' => 'TransferExten',
                'TargetUniqueid' => 'TargetUniqueid',
                'UniqueID' => 'UniqueID',
                'SIP-Callid' => 'SIP-Callid',
                'TargetChannel' => 'TargetChannel',
                'Channel' => 'Channel',
                'TransferType' => 'TransferType',
                'TransferMethod' => 'TransferMethod',
                'Privilege' => 'Privilege'
            ),
            'VoicemailUserEntryComplete' => array(),
            'VoicemailUserEntry' => array(
                'VmContext' => 'VmContext',
                'VoicemailBox' => 'VoicemailBox',
                'Fullname' => 'Fullname',
                'Email' => 'Email',
                'Pager' => 'Pager',
                'ServerEmail' => 'ServerEmail',
                'MailCommand' => 'MailCommand',
                'Language' => 'Language',
                'Timezone' => 'Timezone',
                'Callback' => 'Callback',
                'DialOut' => 'DialOut',
                'UniqueID' => 'UniqueID',
                'ExitContext' => 'ExitContext',
                'SayDurationMin' => 'SayDurationMin',
                'SayEnvelope' => 'SayEnvelope',
                'SayCID' => 'SayCID',
                'AttachMessage' => 'AttachMessage',
                'AttachmentFormat' => 'AttachmentFormat',
                'DeleteMessage' => 'DeleteMessage',
                'VolumeGain' => 'VolumeGain',
                'CanReview' => 'CanReview',
                'CallOperator' => 'CallOperator',
                'MaxMessageCount' => 'MaxMessageCount',
                'MaxMessageLength' => 'MaxMessageLength',
                'NewMessageCount' => 'NewMessageCount'
            ),
            'DBGetResponse' => array(
                'Family' => 'Family',
                'Key' => 'Key',
                'Val' => 'Val'
            ),
        	'ParkedCallsComplete' => array(),
        	'StatusComplete' => array('Items' => 'Items'),
            'RegistrationsComplete' => array('ListItems' => 'ListItems'),
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
        	),
        );
        $eventGetters = array(
            'QueueMemberStatus' => array(
                'Paused' => 'Pause'
            ),
            'QueueMember' => array(
                'Name' => 'MemberName'
            ),
        	'AGIExec' => array(),
            'Transfer' => array(
                'SIP-Callid' => 'SipCallID',
            ),
            'VoicemailUserEntry' => array(
                'VmContext' => 'VoicemailContext',
            ),
            'PeerEntry' => array('ChanObjectType' => 'ChannelObjectType'),
            'VarSet' => array('Variable' => 'VariableName'),
        	'StatusComplete' => array('Items' => 'ListItems'),
            'DBGetResponse' => array('Key' => 'KeyName', 'Val' => 'Value'),
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
        	'DAHDIShowChannelsComplete' => array('items' => 'ListItems'),
        	'vgsm_net_state' => array('X-vGSM-GSM-Registration' => 'State'),
        	'vgsm_me_state' => array(
        		'X-vGSM-ME-State-Change-Reason' => 'Reason',
        	    'X-vGSM-ME-Old-State' => 'OldState',
        	    'X-vGSM-ME-State' => 'State',
        	)
        );
        foreach ($eventNames as $eventName) {
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
        $this->assertTrue($event instanceof $eventClass);
        foreach ($values as $key => $value) {
            if (isset($getters[$eventName][$key])) {
                $methodName = 'get' . $getters[$eventName][$key];
            } else {
                $methodName = 'get' . $key;
            }
            if (isset($translatedValues[$eventName][$key])) {
                $value = $translatedValues[$eventName][$key];
            }
            $this->assertEquals($event->$methodName(), $value);
        }
    }
}
}