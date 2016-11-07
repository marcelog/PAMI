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
        $this->_properties = array();
    }
    /**
     * @test
     */
    public function can_report_events()
    {
        $eventNames = array(
            'AsyncAGI', 'AGIExec', 'VarSet', 'Unlink', 'vgsm_sms_rx', 'vgsm_net_state',
            'vgsm_me_state', 'DTMF', 'Bridge', 'VoicemailUserEntryComplete',
            'StatusComplete', 'ParkedCallsComplete', 'DBGetResponse',
            'VoicemailUserEntry', 'Transfer', 'Status', 'ShowDialPlanComplete',
            'Rename', 'RegistrationsComplete', 'RTPSenderStat', 'RTPReceiverStat',
            'RTCPSent', 'RTCPReceiverStat', 'RTCPReceived', 'QueueSummaryComplete',
            'QueueStatusComplete', 'DAHDIShowChannelsComplete', 'QueueSummary',
            'QueueParams', 'QueueMemberStatus', 'QueueMemberRemoved',
            'QueueMemberPaused', 'QueueMember', 'QueueMemberAdded', 'PeerlistComplete',
            'PeerStatus', 'PeerEntry', 'OriginateResponse', 'Newstate', 'Newexten',
            'Newchannel', 'NewCallerid', 'NewAccountCode', 'MusicOnHold',
            'MessageWaiting', 'Masquerade', 'ListDialplan', 'Leave', 'Join',
            'Hold', 'Hangup', 'ExtensionStatus', 'Dial', 'DAHDIShowChannels',
            'CoreShowChannelsComplete', 'CoreShowChannel', 'ChannelUpdate',
            'Agents', 'AgentsComplete', 'Agentlogoff', 'Agentlogin', 'AgentConnect',
            'DongleSMSStatus', 'FullyBooted', 'DongleShowDevicesComplete', 'DongleDeviceEntry',
            'DongleNewUSSDBase64', 'DongleNewUSSD', 'DongleUSSDStatus', 'DongleNewCUSD',
            'DongleStatus', 'CEL', 'JabberEvent', 'Registry', 'UserEvent',
            'ParkedCall', 'UnParkedCall', 'Link',
            'AGIExecStart',
            'AGIExecEnd',
            'AsyncAGIStart',
            'AsyncAGIExec',
            'AsyncAGIEnd',
            'QueueCallerJoin',
            'QueueCallerLeave',
            'AttendedTransfer',
            'BlindTransfer',
            'DialBegin',
            'DialEnd',
            'DTMFBegin',
            'DTMFEnd',
            'BridgeCreate',
            'BridgeDestroy',
            'BridgeEnter',
            'BridgeLeave',
            'MusicOnHoldStart',
            'MusicOnHoldStop',
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
            'UserEvent' => array(
                'Privilege' => 'Privilege',
                'UniqueID' => 'UniqueID',
                'UserEvent' => 'UserEvent'
            ),
            'Registry' => array(
                'Channel' => 'Channel',
                'Domain' => 'Domain',
                'Status' => 'Status'
            ),
            'JabberEvent' => array(
                'Privilege' => 'Privilege',
                'Account' => 'Account',
                'Packet' => 'Packet'
            ),
            'AsyncAGI' => array(
                'Env' => 'Env',
                'Channel' => 'Channel',
                'CommandId' => 'CommandId',
                'Privilege' => 'Privilege',
                'SubEvent' => 'SubEvent',
                'Result' => 'Result'
            ),
            'FullyBooted' => array(),
            'DongleUSSDStatus' => array(
                'Privilege' => 'Privilege',
        		'Id' => 'Id',
        		'Device' => 'Device',
                'Status' => 'Status'
             ),
        	'DongleNewUSSDBase64' => array(
                'Device' => 'Device',
                'Message' => 'Message',
                'Privilege' => 'Privilege'
            ),
        	'DongleNewCUSD' => array(
                'Device' => 'Device',
                'Message' => 'Message',
                'Privilege' => 'Privilege'
            ),
            'DongleNewUSSD' => array(
                'Device' => 'Device',
                'LineCount' => 'LineCount',
                'Privilege' => 'Privilege'
            ),
            'DongleDeviceEntry' => array(
                'Device' => 'Device',
                'AudioSetting' => 'AudioSetting',
                'DataSetting' => 'DataSetting',
                'IMEISetting' => 'IMEISetting',
                'IMSISetting' => 'IMSISetting',
                'ChannelLanguage' => 'ChannelLanguage',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Group' => 'Group',
                'RXGain' => 'RXGain',
                'TXGain' => 'TXGain',
                'U2DIAG' => 'U2DIAG',
                'UseCallingPres' => 'UseCallingPres',
                'DefaultCallingPres' => 'DefaultCallingPres',
                'AutoDeleteSMS' => 'AutoDeleteSMS',
                'DisableSMS' => 'DisableSMS',
                'ResetDongle' => 'ResetDongle',
                'SMSPDU' => 'SMSPDU',
                'CallWaitingSetting' => 'CallWaitingSetting',
                'DTMF' => 'DTMF',
                'MinimalDTMFGap' => 'MinimalDTMFGap',
                'MinimalDTMFDuration' => 'MinimalDTMFDuration',
                'MinimalDTMFInterval' => 'MinimalDTMFInterval',
                'State' => 'State',
                'AudioState' => 'AudioState',
                'DataState' => 'DataState',
                'Voice' => 'Voice',
                'SMS' => 'SMS',
                'Manufacturer' => 'Manufacturer',
                'Model' => 'Model',
                'Firmware' => 'Firmware',
                'IMEIState' => 'IMEIState',
                'IMSIState' => 'IMSIState',
                'GSMRegistrationStatus' => 'GSMRegistrationStatus',
                'RSSI' => 'RSSI',
                'Mode' => 'Mode',
                'Submode' => 'Submode',
                'ProviderName' => 'ProviderName',
                'LocationAreaCode' => 'LocationAreaCode',
                'CellID' => 'CellID',
                'SubscriberNumber' => 'SubscriberNumber',
                'SMSServiceCenter' => 'SMSServiceCenter',
                'UseUCS2Encoding' => 'UseUCS2Encoding',
                'USSDUse7BitEncoding' => 'USSDUse7BitEncoding',
                'USSDUseUCS2Decoding' => 'USSDUseUCS2Decoding',
                'TasksInQueue' => 'TasksInQueue',
                'CommandsInQueue' => 'CommandsInQueue',
                'CallWaitingState' => 'CallWaitingState',
                'CurrentDeviceState' => 'CurrentDeviceState',
                'DesiredDeviceState' => 'DesiredDeviceState',
                'CallsChannels' => 'CallsChannels',
                'Active' => 'Active',
                'Held' => 'Held',
                'Dialing' => 'Dialing',
                'Alerting' => 'Alerting',
                'Incoming' => 'Incoming',
                'Waiting' => 'Waiting',
                'Releasing' => 'Releasing',
                'Initializing' => 'Initializing'
        	),
        	'DongleShowDevicesComplete' => array('ListItems' => 'items'),
            'DongleSMSStatus' => array(
                'Privilege' => 'Privilege',
        		'Id' => 'Id',
        		'Device' => 'Device',
                'Status' => 'Status'
            ),
            'DongleStatus' => array(
                'Privilege' => 'Privilege',
        		'Device' => 'Device',
                'Status' => 'Status'
            ),
            'AgentConnect' => array(
                'HoldTime' => 'HoldTime',
                'Privilege' => 'Privilege',
                'BridgedChannel' => 'BridgedChannel',
                'RingTime' => 'RingTime',
                'Member' => 'Member',
                'MemberName' => 'MemberName',
                'UniqueID' => 'UniqueID',
                'Channel' => 'Channel',
                'Queue' => 'Queue'
            ),
            'Agentlogoff' => array(
                'Logintime' => 'Logintime',
                'UniqueID' => 'UniqueID',
                'Agent' => 'Agent',
                'Privilege' => 'Privilege',
            ),
            'Agentlogin' => array(
                'UniqueID' => 'UniqueID',
                'Agent' => 'Agent',
                'Privilege' => 'Privilege',
                'Channel' => 'Channel',
            ),
            'AgentsComplete' => array(),
            'Agents' => array(
                'TalkingToChannel' => 'TalkingToChannel',
                'TalkingTo' => 'TalkingTo',
                'LoggedInTime' => 'LoggedInTime',
                'LoggedInChan' => 'LoggedInChan',
                'Name' => 'Name',
                'Status' => 'Status',
                'Agent' => 'Agent'
            ),
            'ChannelUpdate' => array(
                'Privilege' => 'Privilege',
                'Channel' => 'Channel',
                'ChannelType' => 'ChannelType',
        		'UniqueID' => 'UniqueID',
                'SIPfullcontact' => 'SIPfullcontact',
                'SIPcallid' => 'SIPcallid'
            ),
            'CoreShowChannel' => array(
        		'UniqueID' => 'UniqueID',
                'Privilege' => 'Privilege',
                'Channel' => 'Channel',
                'AccountCode' => 'AccountCode',
                'Priority' => 'Priority',
                'Extension' => 'Extension',
                'Context' => 'Context',
                'CallerIDNum' => 'CallerIDNum',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'ChannelState' => 'ChannelState',
                'ApplicationData' => 'ApplicationData',
                'Application' => 'Application',
                'BridgedUniqueID' => 'BridgedUniqueID',
                'BridgedChannel' => 'BridgedChannel',
                'Duration' => 'Duration',
            ),
            'DAHDIShowChannels' => array(
                'Channel' => 'Channel',
                'Context' => 'Context',
                'Alarm' => 'Alarm',
                'DND' => 'DND',
                'SignallingCode' => 'SignallingCode',
                'Signalling' => 'Signalling'
            ),
            'Dial' => array(
                'Privilege' => 'Privilege',
                'Destination' => 'Destination',
                'SubEvent' => 'SubEvent',
        		'CallerIdName' => 'CallerIdName',
                'CallerIdNum' => 'CallerIdNum',
                'Channel' => 'Channel',
        		'DialStatus' => 'DialStatus',
                'DialString' => 'DialString',
        		'UniqueID' => 'UniqueID',
        		'DestUniqueID' => 'DestUniqueID',
            ),
            'ExtensionStatus' => array(
                'Privilege' => 'Privilege',
                'Status' => 'Status',
                'Exten' => 'Extension',
                'Hint' => 'Hint',
        		'Context' => 'Context',
            ),
            'Hangup' => array(
                'CallerIdName' => 'CallerIdName',
                'CallerIdNum' => 'CallerIdNum',
                'Channel' => 'Channel',
                'Privilege' => 'Privilege',
        		'UniqueID' => 'UniqueID',
                'Cause' => 'Cause',
                'cause-txt' => 'cause-txt'
            ),
            'Hold' => array(
                'Privilege' => 'Privilege',
        		'UniqueID' => 'UniqueID',
                'Status' => 'Status',
                'Channel' => 'Channel',
            ),
        	'Join' => array(
                'CallerIdName' => 'CallerIdName',
                'CallerIdNum' => 'CallerIdNum',
        		'UniqueID' => 'UniqueID',
                'Position' => 'Position',
                'Queue' => 'Queue',
                'Channel' => 'Channel',
                'Privilege' => 'Privilege',
                'Count' => 'Count',
            ),
            'Leave' => array(
                'Channel' => 'Channel',
                'Privilege' => 'Privilege',
        		'UniqueID' => 'UniqueID',
                'Count' => 'Count',
                'Queue' => 'Queue'
            ),
        	'ListDialplan' => array(
                'AppData' => 'AppData',
                'Application' => 'Application',
                'Priority' => 'Priority',
                'Extension' => 'Extension',
                'Context' => 'Context',
                'Registrar' => 'Registrar',
                'IncludeContext' => 'IncludeContext'
            ),
            'Masquerade' => array(
                'OriginalState' => 'OriginalState',
                'Original' => 'Original',
                'CloneState' => 'CloneState',
                'Clone' => 'Clone',
                'Privilege' => 'Privilege',
            ),
            'MessageWaiting' => array(
        		'Privilege' => 'Privilege',
        		'Waiting' => 'Waiting',
        		'Mailbox' => 'Mailbox',
            ),
            'MusicOnHold' => array(
                'Channel' => 'Channel',
                'Privilege' => 'Privilege',
        		'UniqueID' => 'UniqueID',
        		'State' => 'State',
            ),
            'NewAccountCode' => array(
                'Channel' => 'Channel',
                'Privilege' => 'Privilege',
        		'UniqueID' => 'UniqueID',
                'AccountCode' => 'AccountCode',
                'OldAccountCode' => 'OldAccountCode',
            ),
            'NewCallerid' => array(
        		'UniqueID' => 'UniqueID',
                'CallerIdName' => 'CallerIdName',
                'CallerIdNum' => 'CallerIdNum',
                'Channel' => 'Channel',
                'Privilege' => 'Privilege',
                'CID-CallingPres' => 'CID-CallingPres'
            ),
            'Newchannel' => array(
        		'UniqueID' => 'UniqueID',
                'CallerIdName' => 'CallerIdName',
                'CallerIdNum' => 'CallerIdNum',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'ChannelState' => 'ChannelState',
                'AccountCode' => 'AccountCode',
                'Channel' => 'Channel',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Privilege' => 'Privilege'
            ),
        	'Newexten' => array(
                'Channel' => 'Channel',
                'Privilege' => 'Privilege',
                'AppData' => 'AppData',
                'Application' => 'Application',
                'Priority' => 'Priority',
                'Extension' => 'Extension',
                'Exten' => 'Exten',
                'Context' => 'Context',
        		'UniqueID' => 'UniqueID',
            ),
        	'Newstate' => array(
                'CallerIdName' => 'CallerIdName',
                'CallerIdNum' => 'CallerIdNum',
                'UniqueID' => 'UniqueID',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'ChannelState' => 'ChannelState',
                'Channel' => 'Channel',
                'Privilege' => 'Privilege',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName'
            ),
            'OriginateResponse' => array(
                'CallerIdName' => 'CallerIdName',
                'CallerIdNum' => 'CallerIdNum',
                'Response' => 'Response',
                'ActionID' => 'ActionID',
                'UniqueID' => 'UniqueID',
                'Reason' => 'Reason',
                'Channel' => 'Channel',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Privilege' => 'Privilege'
            ),
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
            'CoreShowChannelsComplete' => array('ListItems' => 'ListItems'),
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
                'Oldname' => 'Oldname',
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
            'CEL' => array(
                'AMAFlags' => 'AMAFlags',
                'AccountCode' => 'AccountCode',
                'AppData' => 'AppData',
                'Application' => 'Application',
                'CallerIDani' => 'CallerIDani',
                'CallerIDdnid' => 'CallerIDdnid',
                'CallerIDname' => 'CallerIDname',
                'CallerIDnum' => 'CallerIDnum',
                'CallerIDrdnis' => 'CallerIDrdnis',
                'Channel' => 'Channel',
                'Context' => 'Context',
                'Event' => 'Event',
                'EventName' => 'EventName',
                'EventTime' => 'EventTime',
                'Exten' => 'Exten',
                'Extra' => 'Extra',
                'LinkedID' => 'LinkedID',
                'Peer' => 'Peer',
                'PeerAccount' => 'PeerAccount',
                'Privilege' => 'Privilege',
                'Timestamp' => 'Timestamp',
                'UniqueID' => 'UniqueID',
                'Userfield' => 'Userfield',
            ),
            'ParkedCall' => array(
                'Privilege' => 'Privilege',
                'Parkinglot' => 'Parkinglot',
                'From' => 'From',
                'Timeout' => 'ParkingTimeout',
                'ConnectedLineNum' => 'ParkeeConnectedLineNum',
                'ConnectedLineName' => 'ParkeeConnectedLineName',
                'Channel' => 'ParkeeChannel',
                'CallerIDNum' => 'ParkeeCallerIDNum',
                'CallerIDName' => 'ParkeeCallerIDName',
                'UniqueID' => 'ParkeeUniqueid',
                'Exten' => 'ParkingSpace',
                'ParkeeChannel' => 'ParkeeChannel',
                'ParkeeChannelState' => 'ParkeeChannelState',
                'ParkeeChannelStateDesc' => 'ParkeeChannelStateDesc',
                'ParkeeCallerIDNum' => 'ParkeeCallerIDNum',
                'ParkeeCallerIDName' => 'ParkeeCallerIDName',
                'ParkeeConnectedLineNum' => 'ParkeeConnectedLineNum',
                'ParkeeConnectedLineName' => 'ParkeeConnectedLineName',
                'ParkeeAccountCode' => 'ParkeeAccountCode',
                'ParkeeContext' => 'ParkeeContext',
                'ParkeeExten' => 'ParkeeExten',
                'ParkeePriority' => 'ParkeePriority',
                'ParkeeUniqueid' => 'ParkeeUniqueid',
                'ParkerDialString' => 'ParkerDialString',
                'ParkingSpace' => 'ParkingSpace',
                'ParkingTimeout' => 'ParkingTimeout',
                'ParkingDuration' => 'ParkingDuration',
            ),
            'UnParkedCall' => array(
                'Privilege' => 'Privilege',
                'Parkinglot' => 'Parkinglot',
                'From' => 'RetrieverChannel',
                'ConnectedLineNum' => 'ParkeeConnectedLineNum',
                'ConnectedLineName' => 'ParkeeConnectedLineName',
                'Channel' => 'ParkeeChannel',
                'CallerIDNum' => 'ParkeeCallerIDNum',
                'CallerIDName' => 'ParkeeCallerIDName',
                'UniqueID' => 'ParkeeUniqueid',
                'Exten' => 'ParkingSpace',
                'ParkeeChannel' => 'ParkeeChannel',
                'ParkeeChannelState' => 'ParkeeChannelState',
                'ParkeeChannelStateDesc' => 'ParkeeChannelStateDesc',
                'ParkeeCallerIDNum' => 'ParkeeCallerIDNum',
                'ParkeeCallerIDName' => 'ParkeeCallerIDName',
                'ParkeeConnectedLineNum' => 'ParkeeConnectedLineNum',
                'ParkeeConnectedLineName' => 'ParkeeConnectedLineName',
                'ParkeeAccountCode' => 'ParkeeAccountCode',
                'ParkeeContext' => 'ParkeeContext',
                'ParkeeExten' => 'ParkeeExten',
                'ParkeePriority' => 'ParkeePriority',
                'ParkeeUniqueid' => 'ParkeeUniqueid',
                'ParkerDialString' => 'ParkerDialString',
                'ParkingSpace' => 'ParkingSpace',
                'ParkingTimeout' => 'ParkingTimeout',
                'ParkingDuration' => 'ParkingDuration',
                'ParkerChannel' => 'ParkerChannel',
                'ParkerChannelState' => 'ParkerChannelState',
                'ParkerChannelStateDesc' => 'ParkerChannelStateDesc',
                'ParkerCallerIDNum' => 'ParkerCallerIDNum',
                'ParkerCallerIDName' => 'ParkerCallerIDName',
                'ParkerConnectedLineNum' => 'ParkerConnectedLineNum',
                'ParkerConnectedLineName' => 'ParkerConnectedLineName',
                'ParkerAccountCode' => 'ParkerAccountCode',
                'ParkerContext' => 'ParkerContext',
                'ParkerExten' => 'ParkerExten',
                'ParkerPriority' => 'ParkerPriority',
                'ParkerUniqueid' => 'ParkerUniqueid',
                'RetrieverChannel' => 'RetrieverChannel',
                'RetrieverChannelState' => 'RetrieverChannelState',
                'RetrieverChannelStateDesc' => 'RetrieverChannelStateDesc',
                'RetrieverCallerIDNum' => 'RetrieverCallerIDNum',
                'RetrieverCallerIDName' => 'RetrieverCallerIDName',
                'RetrieverConnectedLineNum' => 'RetrieverConnectedLineNum',
                'RetrieverConnectedLineName' => 'RetrieverConnectedLineName',
                'RetrieverAccountCode' => 'RetrieverAccountCode',
                'RetrieverContext' => 'RetrieverContext',
                'RetrieverExten' => 'RetrieverExten',
                'RetrieverPriority' => 'RetrieverPriority',
                'RetrieverUniqueid' => 'RetrieverUniqueid',
            ),
            'Link' => array(
                'Privilege' => 'Privilege',
                'CallerID1' => 'CallerID1',
                'CallerID2' => 'CallerID2',
                'UniqueID1' => 'UniqueID1',
                'UniqueID2' => 'UniqueID2',
                'Channel1' => 'Channel1',
                'Channel2' => 'Channel2'
            ),
            'AGIExecStart' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'Command' => 'Command',
                'CommandId' => 'CommandId',
            ),
            'AGIExecEnd' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'Command' => 'Command',
                'CommandId' => 'CommandId',
                'ResultCode' => 'ResultCode',
                'Result' => 'Result',
            ),
            'AsyncAGIStart' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'Env' => 'Env',
            ),
            'AsyncAGIExec' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'CommandID' => 'CommandID',
                'Result' => 'Result',
            ),
            'AsyncAGIEnd' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
            ),
            'QueueCallerJoin' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'Queue' => 'Queue',
                'Position' => 'Position',
                'Count' => 'Count',
            ),
            'QueueCallerLeave' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'Queue' => 'Queue',
                'Count' => 'Count',
                'Position' => 'Position',
            ),
            'AttendedTransfer' => array(
                'Result' => 'Result',
                'OrigTransfererChannel' => 'OrigTransfererChannel',
                'OrigTransfererChannelState' => 'OrigTransfererChannelState',
                'OrigTransfererChannelStateDesc' => 'OrigTransfererChannelStateDesc',
                'OrigTransfererCallerIDNum' => 'OrigTransfererCallerIDNum',
                'OrigTransfererCallerIDName' => 'OrigTransfererCallerIDName',
                'OrigTransfererConnectedLineNum' => 'OrigTransfererConnectedLineNum',
                'OrigTransfererConnectedLineName' => 'OrigTransfererConnectedLineName',
                'OrigTransfererAccountCode' => 'OrigTransfererAccountCode',
                'OrigTransfererContext' => 'OrigTransfererContext',
                'OrigTransfererExten' => 'OrigTransfererExten',
                'OrigTransfererPriority' => 'OrigTransfererPriority',
                'OrigTransfererUniqueid' => 'OrigTransfererUniqueid',
                'OrigBridgeUniqueid' => 'OrigBridgeUniqueid',
                'OrigBridgeType' => 'OrigBridgeType',
                'OrigBridgeTechnology' => 'OrigBridgeTechnology',
                'OrigBridgeCreator' => 'OrigBridgeCreator',
                'OrigBridgeName' => 'OrigBridgeName',
                'OrigBridgeNumChannels' => 'OrigBridgeNumChannels',
                'SecondTransfererChannel' => 'SecondTransfererChannel',
                'SecondTransfererChannelState' => 'SecondTransfererChannelState',
                'SecondTransfererChannelStateDesc' => 'SecondTransfererChannelStateDesc',
                'SecondTransfererCallerIDNum' => 'SecondTransfererCallerIDNum',
                'SecondTransfererCallerIDName' => 'SecondTransfererCallerIDName',
                'SecondTransfererConnectedLineNum' => 'SecondTransfererConnectedLineNum',
                'SecondTransfererConnectedLineName' => 'SecondTransfererConnectedLineName',
                'SecondTransfererAccountCode' => 'SecondTransfererAccountCode',
                'SecondTransfererContext' => 'SecondTransfererContext',
                'SecondTransfererExten' => 'SecondTransfererExten',
                'SecondTransfererPriority' => 'SecondTransfererPriority',
                'SecondTransfererUniqueid' => 'SecondTransfererUniqueid',
                'SecondBridgeUniqueid' => 'SecondBridgeUniqueid',
                'SecondBridgeType' => 'SecondBridgeType',
                'SecondBridgeTechnology' => 'SecondBridgeTechnology',
                'SecondBridgeCreator' => 'SecondBridgeCreator',
                'SecondBridgeName' => 'SecondBridgeName',
                'SecondBridgeNumChannels' => 'SecondBridgeNumChannels',
                'DestType' => 'DestType',
                'DestBridgeUniqueid' => 'DestBridgeUniqueid',
                'DestApp' => 'DestApp',
                'LocalOneChannel' => 'LocalOneChannel',
                'LocalOneChannelState' => 'LocalOneChannelState',
                'LocalOneChannelStateDesc' => 'LocalOneChannelStateDesc',
                'LocalOneCallerIDNum' => 'LocalOneCallerIDNum',
                'LocalOneCallerIDName' => 'LocalOneCallerIDName',
                'LocalOneConnectedLineNum' => 'LocalOneConnectedLineNum',
                'LocalOneConnectedLineName' => 'LocalOneConnectedLineName',
                'LocalOneAccountCode' => 'LocalOneAccountCode',
                'LocalOneContext' => 'LocalOneContext',
                'LocalOneExten' => 'LocalOneExten',
                'LocalOnePriority' => 'LocalOnePriority',
                'LocalOneUniqueid' => 'LocalOneUniqueid',
                'LocalTwoChannel' => 'LocalTwoChannel',
                'LocalTwoChannelState' => 'LocalTwoChannelState',
                'LocalTwoChannelStateDesc' => 'LocalTwoChannelStateDesc',
                'LocalTwoCallerIDNum' => 'LocalTwoCallerIDNum',
                'LocalTwoCallerIDName' => 'LocalTwoCallerIDName',
                'LocalTwoConnectedLineNum' => 'LocalTwoConnectedLineNum',
                'LocalTwoConnectedLineName' => 'LocalTwoConnectedLineName',
                'LocalTwoAccountCode' => 'LocalTwoAccountCode',
                'LocalTwoContext' => 'LocalTwoContext',
                'LocalTwoExten' => 'LocalTwoExten',
                'LocalTwoPriority' => 'LocalTwoPriority',
                'LocalTwoUniqueid' => 'LocalTwoUniqueid',
                'DestTransfererChannel' => 'DestTransfererChannel',
                'TransfereeChannel' => 'TransfereeChannel',
                'TransfereeChannelState' => 'TransfereeChannelState',
                'TransfereeChannelStateDesc' => 'TransfereeChannelStateDesc',
                'TransfereeCallerIDNum' => 'TransfereeCallerIDNum',
                'TransfereeCallerIDName' => 'TransfereeCallerIDName',
                'TransfereeConnectedLineNum' => 'TransfereeConnectedLineNum',
                'TransfereeConnectedLineName' => 'TransfereeConnectedLineName',
                'TransfereeAccountCode' => 'TransfereeAccountCode',
                'TransfereeContext' => 'TransfereeContext',
                'TransfereeExten' => 'TransfereeExten',
                'TransfereePriority' => 'TransfereePriority',
                'TransfereeUniqueid' => 'TransfereeUniqueid',
            ),
            'BlindTransfer' => array(
                'Result' => 'Result',
                'TransfererChannel' => 'TransfererChannel',
                'TransfererChannelState' => 'TransfererChannelState',
                'TransfererChannelStateDesc' => 'TransfererChannelStateDesc',
                'TransfererCallerIDNum' => 'TransfererCallerIDNum',
                'TransfererCallerIDName' => 'TransfererCallerIDName',
                'TransfererConnectedLineNum' => 'TransfererConnectedLineNum',
                'TransfererConnectedLineName' => 'TransfererConnectedLineName',
                'TransfererAccountCode' => 'TransfererAccountCode',
                'TransfererContext' => 'TransfererContext',
                'TransfererExten' => 'TransfererExten',
                'TransfererPriority' => 'TransfererPriority',
                'TransfererUniqueid' => 'TransfererUniqueid',
                'TransfereeChannel' => 'TransfereeChannel',
                'TransfereeChannelState' => 'TransfereeChannelState',
                'TransfereeChannelStateDesc' => 'TransfereeChannelStateDesc',
                'TransfereeCallerIDNum' => 'TransfereeCallerIDNum',
                'TransfereeCallerIDName' => 'TransfereeCallerIDName',
                'TransfereeConnectedLineNum' => 'TransfereeConnectedLineNum',
                'TransfereeConnectedLineName' => 'TransfereeConnectedLineName',
                'TransfereeAccountCode' => 'TransfereeAccountCode',
                'TransfereeContext' => 'TransfereeContext',
                'TransfereeExten' => 'TransfereeExten',
                'TransfereePriority' => 'TransfereePriority',
                'TransfereeUniqueid' => 'TransfereeUniqueid',
                'BridgeUniqueid' => 'BridgeUniqueid',
                'BridgeType' => 'BridgeType',
                'BridgeTechnology' => 'BridgeTechnology',
                'BridgeCreator' => 'BridgeCreator',
                'BridgeName' => 'BridgeName',
                'BridgeNumChannels' => 'BridgeNumChannels',
                'IsExternal' => 'IsExternal',
                'Context' => 'Context',
                'Extension' => 'Extension',
            ),
            'DialBegin' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'DestChannel' => 'DestChannel',
                'DestChannelState' => 'DestChannelState',
                'DestChannelStateDesc' => 'DestChannelStateDesc',
                'DestCallerIDNum' => 'DestCallerIDNum',
                'DestCallerIDName' => 'DestCallerIDName',
                'DestConnectedLineNum' => 'DestConnectedLineNum',
                'DestConnectedLineName' => 'DestConnectedLineName',
                'DestAccountCode' => 'DestAccountCode',
                'DestContext' => 'DestContext',
                'DestExten' => 'DestExten',
                'DestPriority' => 'DestPriority',
                'DestUniqueid' => 'DestUniqueid',
                'DialString' => 'DialString',
            ),
            'DialEnd' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'DestChannel' => 'DestChannel',
                'DestChannelState' => 'DestChannelState',
                'DestChannelStateDesc' => 'DestChannelStateDesc',
                'DestCallerIDNum' => 'DestCallerIDNum',
                'DestCallerIDName' => 'DestCallerIDName',
                'DestConnectedLineNum' => 'DestConnectedLineNum',
                'DestConnectedLineName' => 'DestConnectedLineName',
                'DestAccountCode' => 'DestAccountCode',
                'DestContext' => 'DestContext',
                'DestExten' => 'DestExten',
                'DestPriority' => 'DestPriority',
                'DestUniqueid' => 'DestUniqueid',
                'DialStatus' => 'DialStatus',
            ),
            'DTMFBegin' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'Digit' => 'Digit',
                'Direction' => 'Direction',
            ),
            'DTMFEnd' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'Digit' => 'Digit',
                'DurationMs' => 'DurationMs',
                'Direction' => 'Direction',
            ),
            'BridgeCreate' => array(
                'BridgeUniqueid' => 'BridgeUniqueid',
                'BridgeType' => 'BridgeType',
                'BridgeTechnology' => 'BridgeTechnology',
                'BridgeCreator' => 'BridgeCreator',
                'BridgeName' => 'BridgeName',
                'BridgeNumChannels' => 'BridgeNumChannels',
            ),
            'BridgeDestroy' => array(
                'BridgeUniqueid' => 'BridgeUniqueid',
                'BridgeType' => 'BridgeType',
                'BridgeTechnology' => 'BridgeTechnology',
                'BridgeCreator' => 'BridgeCreator',
                'BridgeName' => 'BridgeName',
                'BridgeNumChannels' => 'BridgeNumChannels',
            ),
            'BridgeEnter' => array(
                'BridgeUniqueid' => 'BridgeUniqueid',
                'BridgeType' => 'BridgeType',
                'BridgeTechnology' => 'BridgeTechnology',
                'BridgeCreator' => 'BridgeCreator',
                'BridgeName' => 'BridgeName',
                'BridgeNumChannels' => 'BridgeNumChannels',
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'SwapUniqueid' => 'SwapUniqueid',
            ),
            'BridgeLeave' => array(
                'BridgeUniqueid' => 'BridgeUniqueid',
                'BridgeType' => 'BridgeType',
                'BridgeTechnology' => 'BridgeTechnology',
                'BridgeCreator' => 'BridgeCreator',
                'BridgeName' => 'BridgeName',
                'BridgeNumChannels' => 'BridgeNumChannels',
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
            ),
            'MusicOnHoldStart' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
                'Class' => 'Class',
            ),
            'MusicOnHoldStop' => array(
                'Channel' => 'Channel',
                'ChannelState' => 'ChannelState',
                'ChannelStateDesc' => 'ChannelStateDesc',
                'CallerIDNum' => 'CallerIDNum',
                'CallerIDName' => 'CallerIDName',
                'ConnectedLineNum' => 'ConnectedLineNum',
                'ConnectedLineName' => 'ConnectedLineName',
                'AccountCode' => 'AccountCode',
                'Context' => 'Context',
                'Exten' => 'Exten',
                'Priority' => 'Priority',
                'Uniqueid' => 'Uniqueid',
            ),
        );
        $eventGetters = array(
            'UserEvent' => array(
                'UserEvent' => 'UserEventName'
            ),
            'AsyncAGI' => array(
                'Env' => 'Environment'
            ),
            'Agents' => array(
                'LoggedInChan' => 'Channel'
            ),
        	'ExtensionStatus' => array(
                'Exten' => 'Extension'
            ),
            'Hangup' => array(
                'cause-txt' => 'CauseText'
             ),
        	'ListDialplan' => array(
                'AppData' => 'ApplicationData',
            ),
            'NewCallerid' => array(
                'CID-CallingPres' => 'CallerIdPres'
            ),
            'Newchannel' => array('Exten' => 'Extension'),
        	'Newexten' => array(
                'AppData' => 'ApplicationData',
            ),
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
        	),
            'ParkedCall' => array('Exten' => 'Extension'),
            'UnParkedCall' => array('Exten' => 'Extension'),
            'AGIExecStart' => array(

            ),
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
        foreach ($values as $key => $value) {
            if (isset($getters[$eventName][$key])) {
                $methodName = 'get' . $getters[$eventName][$key];
            } else {
                $methodName = 'get' . $key;
            }
            if (isset($translatedValues[$eventName][$key])) {
                $value = $translatedValues[$eventName][$key];
            }

            $this->assertTrue(
                method_exists($event, $methodName),
                sprintf('Method %s doesn\'t exixt in event %s', $methodName, get_class($event))
            );

            $this->assertEquals($event->$methodName(), $value, $eventName);
        }
    }
}
}
