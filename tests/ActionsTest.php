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

namespace Tests;

use Mockery;
use PAMI\Stream\Stream;
use Psr\Log\LoggerInterface;
use PAMI\Client\Impl\ClientImpl;
use PAMI\Exception\PAMIException;
use PAMI\Message\Action\AGIAction;
use PAMI\Message\Action\PingAction;
use PAMI\Message\Action\ParkAction;
use PAMI\Message\Action\DBPutAction;
use PAMI\Message\Action\DBGetAction;
use PAMI\Message\Action\DBDelAction;
use PAMI\Message\Action\LoginAction;
use PAMI\Message\Action\LogoffAction;
use PAMI\Message\Action\QueuesAction;
use PAMI\Message\Action\ReloadAction;
use PAMI\Message\Action\SetVarAction;
use PAMI\Message\Action\StatusAction;
use PAMI\Message\Action\HangupAction;
use PAMI\Message\Action\GetVarAction;
use PAMI\Message\Action\EventsAction;
use PAMI\Message\Action\BridgeAction;
use PAMI\Message\Action\AgentsAction;
use PAMI\Message\Action\ActionMessage;
use PAMI\Message\Action\MonitorAction;
use PAMI\Message\Action\CommandAction;
use PAMI\Message\Action\PlayDTMFAction;
use PAMI\Message\Action\QueueAddAction;
use PAMI\Message\Action\QueueLogAction;
use PAMI\Message\Action\RedirectAction;
use PAMI\Message\Action\SIPPeersAction;
use PAMI\Message\Action\SendTextAction;
use PAMI\Message\Action\WaitEventAction;
use PAMI\Message\Action\UserEventAction;
use PAMI\Message\Action\OriginateAction;
use PAMI\Message\Action\QueueRuleAction;
use PAMI\Message\Action\VGSMSMSTxAction;
use PAMI\Message\Action\SIPNotifyAction;
use PAMI\Message\Action\GetConfigAction;
use PAMI\Message\Action\DBDelTreeAction;
use PAMI\Message\Action\ChallengeAction;
use PAMI\Message\Action\QueueResetAction;
use PAMI\Message\Action\QueuePauseAction;
use PAMI\Message\Action\ModuleLoadAction;
use PAMI\Message\Action\MixMonitorAction;
use PAMI\Message\Action\MeetmeMuteAction;
use PAMI\Message\Action\MeetmeListAction;
use PAMI\Message\Action\JabberSendAction;
use PAMI\Message\Action\DAHDIDNDOnAction;
use PAMI\Message\Action\CoreStatusAction;
use PAMI\Message\Action\DongleStopAction;
use PAMI\Message\Action\BridgeInfoAction;
use PAMI\Message\Action\QueueReloadAction;
use PAMI\Message\Action\QueueRemoveAction;
use PAMI\Message\Action\QueueStatusAction;
use PAMI\Message\Action\ParkedCallsAction;
use PAMI\Message\Action\SIPShowPeerAction;
use PAMI\Message\Action\StopMonitorAction;
use PAMI\Message\Action\ModuleCheckAction;
use PAMI\Message\Action\DAHDIHangupAction;
use PAMI\Message\Action\DAHDIDNDOffAction;
use PAMI\Message\Action\DongleStartAction;
use PAMI\Message\Action\DongleResetAction;
use PAMI\Message\Action\AgentLogoffAction;
use PAMI\Message\Action\UpdateConfigAction;
use PAMI\Message\Action\QueuePenaltyAction;
use PAMI\Message\Action\QueueSummaryAction;
use PAMI\Message\Action\QueueUnpauseAction;
use PAMI\Message\Action\ShowDialPlanAction;
use PAMI\Message\Action\PauseMonitorAction;
use PAMI\Message\Action\ModuleUnloadAction;
use PAMI\Message\Action\ModuleReloadAction;
use PAMI\Message\Action\MeetmeUnmuteAction;
use PAMI\Message\Action\MailboxCountAction;
use PAMI\Message\Action\ListCommandsAction;
use PAMI\Message\Action\DAHDIRestartAction;
use PAMI\Message\Action\CreateConfigAction;
use PAMI\Message\Action\DongleReloadAction;
use PAMI\Message\Action\CoreSettingsAction;
use PAMI\Message\Action\MailboxStatusAction;
use PAMI\Message\Action\GetConfigJSONAction;
use PAMI\Message\Action\DAHDITransferAction;
use PAMI\Message\Action\DongleSendSMSAction;
use PAMI\Message\Action\DongleSendPDUAction;
use PAMI\Message\Action\DongleRestartAction;
use PAMI\Message\Action\ChangeMonitorAction;
use PAMI\Message\Action\BlindTransferAction;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use PAMI\Message\Action\SIPQualifyPeerAction;
use PAMI\Message\Action\StopMixMonitorAction;
use PAMI\Message\Action\UnpauseMonitorAction;
use PAMI\Message\Action\ListCategoriesAction;
use PAMI\Message\Action\ExtensionStateAction;
use PAMI\Message\Action\DongleSendUSSDAction;
use PAMI\Message\Action\ConfbridgeMuteAction;
use PAMI\Message\Action\ConfbridgeListAction;
use PAMI\Message\Action\SIPShowRegistryAction;
use PAMI\Message\Action\AbsoluteTimeoutAction;
use PAMI\Message\Action\DAHDIDialOffHookAction;
use PAMI\Message\Action\ConfbridgeUnmuteAction;
use PAMI\Message\Action\AttendedTransferAction;
use PAMI\Message\Action\LocalOptimizeAwayAction;
use PAMI\Message\Action\DAHDIShowChannelsAction;
use PAMI\Message\Action\DongleShowDevicesAction;
use PAMI\Message\Action\VoicemailUsersListAction;

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
class ActionsTest extends MockeryTestCase
{
    protected string $microTime;

    protected function setUp(): void
    {
        parent::setUp();

        $this->microTime = (string)microtime(true);
        setMockedMicroTime($this->microTime);
    }

    /**
     * @param array<int,string>                  $expectedWrite
     * @param \PAMI\Message\Action\ActionMessage $action
     *
     * @return void
     * @throws \PAMI\Client\Exception\ClientException
     */
    protected function testSendAction(array $expectedWrite, ActionMessage $action): void
    {
        $options = [
            'host'            => '2.3.4.5',
            'scheme'          => 'tcp://',
            'port'            => 9999,
            'username'        => 'asd',
            'secret'          => 'asd',
            'connect_timeout' => 10,
            'read_timeout'    => 10,
        ];
        $stream  = Mockery::mock(Stream::class);

        $logger = Mockery::mock(LoggerInterface::class);

        $client = Mockery::mock(ClientImpl::class, [$options]);
        $client->makePartial();
        $client->shouldAllowMockingProtectedMethods();

        $writeLogin = "action: Login\r\n" .
            "actionid: " . $this->microTime . "\r\n" .
            "username: asd\r\n" .
            "secret: asd\r\n\r\n";

        $client->setLogger($logger);

        $client->shouldReceive('makeStream')->andReturn($stream);

        $stream->shouldReceive('getLine')
            ->once()
            ->andReturn('Asterisk 1234');

        $logger->shouldReceive('debug')
            ->zeroOrMoreTimes()
            ->withArgs(function (string $message) {

                return str_starts_with($message, '------ Sending: ------');
            });

        $stream->shouldReceive('write')
            ->once()
            ->with($writeLogin)
            ->andReturn(strlen($writeLogin));

        $logger->shouldReceive('debug')
            ->zeroOrMoreTimes()
            ->withArgs(function (string $message) {

                return str_starts_with($message, '------ Received: ------') || $message == '----------------';
            });

        $stream->shouldReceive('read')
            ->times(5)
            ->andReturn(
                "Asterisk Call Manager/1.1\r\n",
                "Response: Success\r\n",
                "ActionID: " . $this->microTime . "\r\n",
                "Message: Authentication accepted\r\n",
                "\r\n\r\n"
            );

        $stream->shouldReceive('endOfFile')
            ->andReturnFalse();

        $stream->shouldReceive('setBlocking')
            ->once()
            ->with(false);

        $stream->shouldReceive('isConnected')
            ->andReturnTrue();

        $logger->shouldReceive('debug')
            ->once()
            ->withArgs(function (string $message) {
                return 'Logged in successfully to ami.' == $message;
            });

        $client->open();

        // End of login/open sequence.

        if ($action instanceof DBGetAction) {
            $responses = [
                "Response: Success\r\n",
                "EventList: start\r\n",
                "ActionID: " . $this->microTime . "\r\n",
                "\r\n",
                "Event: DBGetResponse\r\n",
                "ActionID: " . $this->microTime . "\r\n",
                "\r\n",
            ];
        } else {
            $responses = [
                "Response: Success\r\n",
                "ActionID: " . $this->microTime . "\r\n",
                "\r\n",
            ];
        }

        foreach ($expectedWrite as $write) {
            $write .= "\r\n";
            $this->assertEquals($write, $action->serialize());

            $stream->shouldReceive('write')
                ->with($write)
                ->andReturn(strlen($write));
        }

        $responses[] = "\r\n\r\n";

        $stream->shouldReceive('read')
            ->andReturn(...$responses);

        $client->send($action);
    }

    public function testCanAbsoluteTimeout(): void
    {
        $write  = [
            "action: AbsoluteTimeout\r\n" .
            "actionid: " . $this->microTime . "\r\n" .
            "channel: SIP/asd\r\n" .
            "timeout: 10\r\n",
        ];
        $action = new AbsoluteTimeoutAction('SIP/asd', 10);
        $this->testSendAction($write, $action);
    }

    public function testCanLogin(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Login',
                'actionid: ' . $this->microTime,
                'username: foo',
                'secret: bar',
                '',
            ]),
        ];
        $action = new LoginAction('foo', 'bar');
        $this->testSendAction($write, $action);
    }

    public function testCanLoginWithEvents(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Login',
                'actionid: ' . $this->microTime,
                'username: foo',
                'secret: bar',
                'events: all',
                '',
            ]),
        ];
        $action = new LoginAction('foo', 'bar', 'all');
        $this->testSendAction($write, $action);
    }

    public function testCanAgentLogoff(): void
    {
        $write  = [
            implode("\r\n", [
                'action: AgentLogoff',
                'actionid: ' . $this->microTime,
                'agent: asd',
                'soft: true',
                '',
            ]),
        ];
        $action = new AgentLogoffAction('asd', true);
        $this->testSendAction($write, $action);
    }

    public function testCanAgents(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Agents',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new AgentsAction;
        $this->testSendAction($write, $action);
    }

    public function testCanAtxfer(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Atxfer',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'exten: exten',
                'context: context',
                'priority: priority',
                '',
            ]),
        ];
        $action = new AttendedTransferAction('channel', 'exten', 'context', 'priority');
        $this->testSendAction($write, $action);
    }

    public function testCanBlindTransfer(): void
    {
        $write  = [
            implode("\r\n", [
                'action: BlindTransfer',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'exten: exten',
                'context: context',
                '',
            ]),
        ];
        $action = new BlindTransferAction('channel', 'exten', 'context');
        $this->testSendAction($write, $action);
    }

    public function testCanBridge(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Bridge',
                'actionid: ' . $this->microTime,
                'channel1: channel1',
                'channel2: channel2',
                'tone: true',
                '',
            ]),
        ];
        $action = new BridgeAction('channel1', 'channel2', true);
        $this->testSendAction($write, $action);
    }

    public function testCanBridgeInfo(): void
    {
        $bridge_uniqueid = '57cb3a7e-0fa3-4e28-924f-d7728b0d7a9a';

        $write  = [
            implode("\r\n", [
                'action: BridgeInfo',
                'actionid: ' . $this->microTime,
                'bridgeuniqueid: ' . $bridge_uniqueid,
                '',
            ]),
        ];
        $action = new BridgeInfoAction($bridge_uniqueid);
        $this->testSendAction($write, $action);
    }

    public function testCanChallenge(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Challenge',
                'actionid: ' . $this->microTime,
                'authtype: test',
                '',
            ]),
        ];
        $action = new ChallengeAction('test');
        $this->testSendAction($write, $action);
    }

    public function testCanChangeMonitor(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ChangeMonitor',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'file: file',
                '',
            ]),
        ];
        $action = new ChangeMonitorAction('channel', 'file');
        $this->testSendAction($write, $action);
    }

    public function testCanCommand(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Command',
                'actionid: ' . $this->microTime,
                'command: command',
                '',
            ]),
        ];
        $action = new CommandAction('command');
        $this->testSendAction($write, $action);
    }

    public function testCanConfbridgeList(): void
    {
        $conference = 'conf-59dba3997444e5';
        $write      = [
            implode("\r\n", [
                'action: ConfbridgeList',
                'actionid: ' . $this->microTime,
                'conference: ' . $conference,
                '',
            ]),
        ];

        $action = new ConfbridgeListAction($conference);
        $this->testSendAction($write, $action);
    }

    public function testCanConfbridgeMute(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ConfbridgeMute',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'conference: conference',
                '',
            ]),
        ];
        $action = new ConfbridgeMuteAction('channel', 'conference');
        $this->testSendAction($write, $action);
    }

    public function testCanConfbridgeUnmute(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ConfbridgeUnmute',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'conference: conference',
                '',
            ]),
        ];
        $action = new ConfbridgeUnmuteAction('channel', 'conference');
        $this->testSendAction($write, $action);
    }

    public function testCanCoreSettings(): void
    {
        $write  = [
            implode("\r\n", [
                'action: CoreSettings',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new CoreSettingsAction;
        $this->testSendAction($write, $action);
    }

    public function testCanDongleShowDevices(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DongleShowDevices',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new DongleShowDevicesAction;
        $this->testSendAction($write, $action);
    }

    public function testCanDongleReload(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DongleReload',
                'actionid: ' . $this->microTime,
                'when: when',
                '',
            ]),
        ];
        $action = new DongleReloadAction('when');
        $this->testSendAction($write, $action);
    }

    public function testCanDongleRestart(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DongleRestart',
                'actionid: ' . $this->microTime,
                'when: when',
                'device: device',
                '',
            ]),
        ];
        $action = new DongleRestartAction('when', 'device');
        $this->testSendAction($write, $action);
    }

    public function testCanDongleReset(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DongleReset',
                'actionid: ' . $this->microTime,
                'device: device',
                '',
            ]),
        ];
        $action = new DongleResetAction('device');
        $this->testSendAction($write, $action);
    }

    public function testCanDongleSendPdu(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DongleSendPDU',
                'actionid: ' . $this->microTime,
                'device: device',
                'pdu: pdu',
                '',
            ]),
        ];
        $action = new DongleSendPDUAction('device', 'pdu');
        $this->testSendAction($write, $action);
    }

    public function testCanDongleSendUssd(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DongleSendUSSD',
                'actionid: ' . $this->microTime,
                'device: device',
                'ussd: ussd',
                '',
            ]),
        ];
        $action = new DongleSendUSSDAction('device', 'ussd');
        $this->testSendAction($write, $action);
    }

    public function testCanDongleStop(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DongleStop',
                'actionid: ' . $this->microTime,
                'when: when',
                'device: device',
                '',
            ]),
        ];
        $action = new DongleStopAction('when', 'device');
        $this->testSendAction($write, $action);
    }

    public function testCanDongleStart(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DongleStart',
                'actionid: ' . $this->microTime,
                'device: device',
                '',
            ]),
        ];
        $action = new DongleStartAction('device');
        $this->testSendAction($write, $action);
    }

    public function testCanDongleSmsSend(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DongleSendSMS',
                'actionid: ' . $this->microTime,
                'device: device',
                'number: number',
                'message: message',
                '',
            ]),
        ];
        $action = new DongleSendSMSAction('device', 'number', 'message');
        $this->testSendAction($write, $action);
    }

    public function testCanCoreStatus(): void
    {
        $write  = [
            implode("\r\n", [
                'action: CoreStatus',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new CoreStatusAction;
        $this->testSendAction($write, $action);
    }

    public function testCanCreateConfig(): void
    {
        $write  = [
            implode("\r\n", [
                'action: CreateConfig',
                'actionid: ' . $this->microTime,
                'filename: file.conf',
                '',
            ]),
        ];
        $action = new CreateConfigAction('file.conf');
        $this->testSendAction($write, $action);
    }

    public function testCanDahdiDndoff(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DAHDIDNDOff',
                'actionid: ' . $this->microTime,
                'dahdichannel: channel',
                '',
            ]),
        ];
        $action = new DAHDIDNDOffAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanDahdiDndon(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DAHDIDNDOn',
                'actionid: ' . $this->microTime,
                'dahdichannel: channel',
                '',
            ]),
        ];
        $action = new DAHDIDNDOnAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanDahdiDialoffhook(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DAHDIDialOffhook',
                'actionid: ' . $this->microTime,
                'dahdichannel: channel',
                'number: number',
                '',
            ]),
        ];
        $action = new DAHDIDialOffHookAction('channel', 'number');
        $this->testSendAction($write, $action);
    }

    public function testCanDahdiHangup(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DAHDIHangup',
                'actionid: ' . $this->microTime,
                'dahdichannel: channel',
                '',
            ]),
        ];
        $action = new DAHDIHangupAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanDahdiRestart(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DAHDIRestart',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new DAHDIRestartAction;
        $this->testSendAction($write, $action);
    }

    public function testCanDahdiShowChannels(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DAHDIShowChannels',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new DAHDIShowChannelsAction;
        $this->testSendAction($write, $action);
    }

    public function testCanDahdiTransfer(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DAHDITransfer',
                'actionid: ' . $this->microTime,
                'dahdichannel: channel',
                '',
            ]),
        ];
        $action = new DAHDITransferAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanDbdel(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DBDel',
                'actionid: ' . $this->microTime,
                'family: family',
                'key: key',
                '',
            ]),
        ];
        $action = new DBDelAction('family', 'key');
        $this->testSendAction($write, $action);
    }

    public function testCanDbdeltree(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DBDelTree',
                'actionid: ' . $this->microTime,
                'family: family',
                'key: key',
                '',
            ]),
        ];
        $action = new DBDelTreeAction('family', 'key');
        $this->testSendAction($write, $action);
    }

    public function testCanDbget(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DBGet',
                'actionid: ' . $this->microTime,
                'family: family',
                'key: key',
                '',
            ]),
        ];
        $action = new DBGetAction('family', 'key');
        $this->testSendAction($write, $action);
    }

    public function testCanDbput(): void
    {
        $write  = [
            implode("\r\n", [
                'action: DBPut',
                'actionid: ' . $this->microTime,
                'family: family',
                'key: key',
                'val: val',
                '',
            ]),
        ];
        $action = new DBPutAction('family', 'key', 'val');
        $this->testSendAction($write, $action);
    }

    public function testCanEventsOff(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Events',
                'actionid: ' . $this->microTime,
                'eventmask: off',
                '',
            ]),
        ];
        $action = new EventsAction;
        $this->testSendAction($write, $action);
    }

    public function testCanEvents(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Events',
                'actionid: ' . $this->microTime,
                'eventmask: a,b,c',
                '',
            ]),
        ];
        $action = new EventsAction(['a', 'b', 'c']);
        $this->testSendAction($write, $action);
    }

    public function testCanExtensionState(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ExtensionState',
                'actionid: ' . $this->microTime,
                'exten: exten',
                'context: context',
                '',
            ]),
        ];
        $action = new ExtensionStateAction('exten', 'context');
        $this->testSendAction($write, $action);
    }

    public function testCanGetConfig(): void
    {
        $write  = [
            implode("\r\n", [
                'action: GetConfig',
                'actionid: ' . $this->microTime,
                'filename: file.conf',
                'category: category',
                '',
            ]),
        ];
        $action = new GetConfigAction('file.conf', 'category');
        $this->testSendAction($write, $action);
    }

    public function testCanGetConfigjson(): void
    {
        $write  = [
            implode("\r\n", [
                'action: GetConfigJSON',
                'actionid: ' . $this->microTime,
                'filename: file.conf',
                '',
            ]),
        ];
        $action = new GetConfigJSONAction('file.conf');
        $this->testSendAction($write, $action);
    }

    public function testCanGetVar(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Getvar',
                'actionid: ' . $this->microTime,
                'variable: var',
                'channel: channel',
                '',
            ]),
        ];
        $action = new GetVarAction('var', 'channel');
        $this->testSendAction($write, $action);
    }

    public function testCanHangup(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Hangup',
                'actionid: ' . $this->microTime,
                'channel: channel',
                '',
            ]),
        ];
        $action = new HangupAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanHangupWithCause(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Hangup',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'cause: 5',
                '',
            ]),
        ];
        $action = new HangupAction('channel', 5);
        $this->testSendAction($write, $action);
    }

    public function testCanJabbersend(): void
    {
        $write  = [
            implode("\r\n", [
                'action: JabberSend',
                'actionid: ' . $this->microTime,
                'jabber: jabber',
                'jid: jid',
                'screenname: jid',
                'message: message',
                '',
            ]),
        ];
        $action = new JabberSendAction('jabber', 'jid', 'message');
        $this->testSendAction($write, $action);
    }

    public function testCanListCategories(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ListCategories',
                'actionid: ' . $this->microTime,
                'filename: file.conf',
                '',
            ]),
        ];
        $action = new ListCategoriesAction('file.conf');
        $this->testSendAction($write, $action);
    }

    public function testCanListCommands(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ListCommands',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new ListCommandsAction;
        $this->testSendAction($write, $action);
    }

    public function testCanLocalOptimizeAway(): void
    {
        $write  = [
            implode("\r\n", [
                'action: LocalOptimizeAway',
                'actionid: ' . $this->microTime,
                'channel: channel',
                '',
            ]),
        ];
        $action = new LocalOptimizeAwayAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanMailbox_count(): void
    {
        $write  = [
            implode("\r\n", [
                'action: MailboxCount',
                'actionid: ' . $this->microTime,
                'mailbox: mailbox',
                '',
            ]),
        ];
        $action = new MailboxCountAction('mailbox');
        $this->testSendAction($write, $action);
    }

    public function testCanMailboxStatus(): void
    {
        $write  = [
            implode("\r\n", [
                'action: MailboxStatus',
                'actionid: ' . $this->microTime,
                'mailbox: mailbox',
                '',
            ]),
        ];
        $action = new MailboxStatusAction('mailbox');
        $this->testSendAction($write, $action);
    }

    public function testCanMeetmeList(): void
    {
        $write  = [
            implode("\r\n", [
                'action: MeetmeList',
                'actionid: ' . $this->microTime,
                'conference: conference',
                '',
            ]),
        ];
        $action = new MeetmeListAction('conference');
        $this->testSendAction($write, $action);
    }

    public function testCanMeetmeMute(): void
    {
        $write  = [
            implode("\r\n", [
                'action: MeetmeMute',
                'actionid: ' . $this->microTime,
                'meetme: meetme',
                'usernum: usernum',
                '',
            ]),
        ];
        $action = new MeetmeMuteAction('meetme', 'usernum');
        $this->testSendAction($write, $action);
    }

    public function testCanMeetmeUnmute(): void
    {
        $write  = [
            implode("\r\n", [
                'action: MeetmeUnmute',
                'actionid: ' . $this->microTime,
                'meetme: meetme',
                'usernum: usernum',
                '',
            ]),
        ];
        $action = new MeetmeUnmuteAction('meetme', 'usernum');
        $this->testSendAction($write, $action);
    }

    public function testCanMixMonitor(): void
    {
        $write  = [
            implode("\r\n", [
                'action: MixMonitor',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'file: file',
                'options: options',
                '',
            ]),
        ];
        $action = new MixMonitorAction('channel');
        $action->setFile('file');
        $action->setOptions(['o', 'p', 't', 'i', 'o', 'n', 's']);
        $this->testSendAction($write, $action);
    }

    public function testCanModuleCheck(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ModuleCheck',
                'actionid: ' . $this->microTime,
                'module: module',
                '',
            ]),
        ];
        $action = new ModuleCheckAction('module');
        $this->testSendAction($write, $action);
    }

    public function testCanModuleLoad(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ModuleLoad',
                'actionid: ' . $this->microTime,
                'module: module',
                'loadtype: load',
                '',
            ]),
        ];
        $action = new ModuleLoadAction('module');
        $this->testSendAction($write, $action);
    }

    public function testCanModuleReload(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ModuleLoad',
                'actionid: ' . $this->microTime,
                'module: module',
                'loadtype: reload',
                '',
            ]),
        ];
        $action = new ModuleReloadAction('module');
        $this->testSendAction($write, $action);
    }

    public function testCanModuleUnload(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ModuleLoad',
                'actionid: ' . $this->microTime,
                'module: module',
                'loadtype: unload',
                '',
            ]),
        ];
        $action = new ModuleUnloadAction('module');
        $this->testSendAction($write, $action);
    }

    public function testCanMonitor(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Monitor',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'mix: true',
                'format: wav',
                'file: file',
                '',
            ]),
        ];
        $action = new MonitorAction('channel', 'file');
        $this->testSendAction($write, $action);
    }

    public function testCanVoicemailUsersList(): void
    {
        $write  = [
            implode("\r\n", [
                'action: VoicemailUsersList',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new VoicemailUsersListAction;
        $this->testSendAction($write, $action);
    }

    public function testCanPause_monitor(): void
    {
        $write  = [
            implode("\r\n", [
                'action: PauseMonitor',
                'actionid: ' . $this->microTime,
                'channel: channel',
                '',
            ]),
        ];
        $action = new PauseMonitorAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanUnpauseMonitor(): void
    {
        $write  = [
            implode("\r\n", [
                'action: UnpauseMonitor',
                'actionid: ' . $this->microTime,
                'channel: channel',
                '',
            ]),
        ];
        $action = new UnpauseMonitorAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanStopMonitor(): void
    {
        $write  = [
            implode("\r\n", [
                'action: StopMonitor',
                'actionid: ' . $this->microTime,
                'channel: channel',
                '',
            ]),
        ];
        $action = new StopMonitorAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanStopMixMonitor(): void
    {
        $write  = [
            implode("\r\n", [
                'action: StopMixMonitor',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'mixmonitorid: mix_monitor',
                '',
            ]),
        ];
        $action = new StopMixMonitorAction('channel');
        $action->setMixMonitorId('mix_monitor');
        $this->testSendAction($write, $action);
    }

    public function testCanStatus(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Status',
                'actionid: ' . $this->microTime,
                'channel: channel',
                '',
            ]),
        ];
        $action = new StatusAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanShowDialplan(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ShowDialPlan',
                'actionid: ' . $this->microTime,
                'context: context',
                'extension: extension',
                '',
            ]),
        ];
        $action = new ShowDialPlanAction('context', 'extension');
        $this->testSendAction($write, $action);
    }

    public function testCanSetVar(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Setvar',
                'actionid: ' . $this->microTime,
                'variable: variable',
                'value: value',
                'channel: channel',
                '',
            ]),
        ];
        $action = new SetVarAction('variable', 'value', 'channel');
        $this->testSendAction($write, $action);
    }

    public function testCanReload(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Reload',
                'actionid: ' . $this->microTime,
                'module: module',
                '',
            ]),
        ];
        $action = new ReloadAction('module');
        $this->testSendAction($write, $action);
    }

    public function testCanPing(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Ping',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new PingAction;
        $this->testSendAction($write, $action);
    }

    public function testCanSendText(): void
    {
        $write  = [
            implode("\r\n", [
                'action: SendText',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'message: message',
                '',
            ]),
        ];
        $action = new SendTextAction('channel', 'message');
        $this->testSendAction($write, $action);
    }

    public function testCanSipShowRegistry(): void
    {
        $write  = [
            implode("\r\n", [
                'action: SIPshowregistry',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new SIPShowRegistryAction;
        $this->testSendAction($write, $action);
    }

    public function testCanSipPeers(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Sippeers',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new SIPPeersAction;
        $this->testSendAction($write, $action);
    }

    public function testCanSipNotify(): void
    {
        $write  = [
            implode("\r\n", [
                'action: SIPnotify',
                'actionid: ' . $this->microTime,
                'channel: channel',
                '',
            ]),
        ];
        $action = new SIPNotifyAction('channel');
        $this->testSendAction($write, $action);
    }

    public function testCanSipShowPeer(): void
    {
        $write  = [
            implode("\r\n", [
                'action: SIPshowpeer',
                'actionid: ' . $this->microTime,
                'peer: peer',
                '',
            ]),
        ];
        $action = new SIPShowPeerAction('peer');
        $this->testSendAction($write, $action);
    }

    public function testCanSipQualifyPeer(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Sipqualifypeer',
                'actionid: ' . $this->microTime,
                'peer: peer',
                '',
            ]),
        ];
        $action = new SIPQualifyPeerAction('peer');
        $this->testSendAction($write, $action);
    }

    public function testCanVgsmSmsTx(): void
    {
        $write  = [
            implode("\r\n", [
                'action: vgsm_sms_tx',
                'actionid: ' . $this->microTime,
                'account: account',
                'x-sms-concatenate-total-messages: totalmsg',
                'x-sms-concatenate-sequence-number: seqnum',
                'x-sms-concatenate-refid: refid',
                'x-sms-class: class',
                'content: content',
                'x-sms-me: me',
                'content-transfer-encoding: encoding',
                'content-type: type',
                'to: to',
                '',
            ]),
        ];
        $action = new VGSMSMSTxAction;
        $action->setAccount('account');
        $action->setConcatTotalMsg('totalmsg');
        $action->setConcatSeqNum('seqnum');
        $action->setConcatRefId('refid');
        $action->setSmsClass('class');
        $action->setContent('content');
        $action->setMe('me');
        $action->setContentEncoding('encoding');
        $action->setContentType('type');
        $action->setTo('to');
        $this->testSendAction($write, $action);
    }

    public function testCanParkedCalls(): void
    {
        $write  = [
            implode("\r\n", [
                'action: ParkedCalls',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new ParkedCallsAction;
        $this->testSendAction($write, $action);
    }

    public function testCanQueues(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Queues',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new QueuesAction;
        $this->testSendAction($write, $action);
    }

    public function testCanRedirect(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Redirect',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'exten: extension',
                'context: context',
                'priority: priority',
                'extrapriority: extrapriority',
                'extracontext: extracontext',
                'extraexten: extraextension',
                'extrachannel: extrachannel',
                '',
            ]),
        ];
        $action = new RedirectAction('channel', 'extension', 'context', 'priority');
        $action->setExtraPriority('extrapriority');
        $action->setExtraContext('extracontext');
        $action->setExtraExtension('extraextension');
        $action->setExtraChannel('extrachannel');
        $this->testSendAction($write, $action);
    }

    public function testCanQueueUnpause(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueuePause',
                'actionid: ' . $this->microTime,
                'queue: queue',
                'reason: reason',
                'interface: interface',
                'paused: false',
                '',
            ]),
        ];
        $action = new QueueUnpauseAction('interface', 'queue', 'reason');
        $this->testSendAction($write, $action);
    }

    public function testCanQueuePause(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueuePause',
                'actionid: ' . $this->microTime,
                'queue: queue',
                'reason: reason',
                'interface: interface',
                'paused: true',
                '',
            ]),
        ];
        $action = new QueuePauseAction('interface', 'queue', 'reason');
        $this->testSendAction($write, $action);
    }

    public function testCanQueueSummary(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueueSummary',
                'actionid: ' . $this->microTime,
                'queue: queue',
                '',
            ]),
        ];
        $action = new QueueSummaryAction('queue');
        $this->testSendAction($write, $action);
    }

    public function testCanQueueStatus(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueueStatus',
                'actionid: ' . $this->microTime,
                'queue: queue',
                'member: member',
                '',
            ]),
        ];
        $action = new QueueStatusAction('queue', 'member');
        $this->testSendAction($write, $action);
    }

    public function testCanQueueReset(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueueReset',
                'actionid: ' . $this->microTime,
                'queue: queue',
                '',
            ]),
        ];
        $action = new QueueResetAction('queue');
        $this->testSendAction($write, $action);
    }

    public function testCanQueueRule(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueueRule',
                'actionid: ' . $this->microTime,
                'rule: rule',
                '',
            ]),
        ];
        $action = new QueueRuleAction('rule');
        $this->testSendAction($write, $action);
    }

    public function testCanQueueRemove(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueueRemove',
                'actionid: ' . $this->microTime,
                'queue: queue',
                'interface: interface',
                '',
            ]),
        ];
        $action = new QueueRemoveAction('queue', 'interface');
        $this->testSendAction($write, $action);
    }

    public function testCanQueueReload(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueueReload',
                'actionid: ' . $this->microTime,
                'queue: queue',
                'members: yes',
                'rules: yes',
                'parameters: yes',
                '',
            ]),
        ];
        $action = new QueueReloadAction('queue', true, true, true);
        $this->testSendAction($write, $action);
    }

    public function testCanQueuePenalty(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueuePenalty',
                'actionid: ' . $this->microTime,
                'interface: interface',
                'penalty: penalty',
                'queue: queue',
                '',
            ]),
        ];
        $action = new QueuePenaltyAction('interface', 'penalty', 'queue');
        $this->testSendAction($write, $action);
    }

    public function testCanQueueLog(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueueLog',
                'actionid: ' . $this->microTime,
                'event: event',
                'queue: queue',
                'message: message',
                'interface: member',
                'uniqueid: uniqueid',
                '',
            ]),
        ];
        $action = new QueueLogAction('queue', 'event');
        $action->setMessage('message');
        $action->setMemberName('member');
        $action->setUniqueId('uniqueid');
        $this->testSendAction($write, $action);
    }

    public function testCanQueueAdd(): void
    {
        $write  = [
            implode("\r\n", [
                'action: QueueAdd',
                'actionid: ' . $this->microTime,
                'interface: interface',
                'queue: queue',
                'paused: true',
                'membername: member',
                'penalty: penalty',
                'stateinterface: state',
                '',
            ]),
        ];
        $action = new QueueAddAction('queue', 'interface');
        $action->setPaused('true');
        $action->setMemberName('member');
        $action->setPenalty('penalty');
        $action->setStateInterface('state');
        $this->testSendAction($write, $action);
    }

    public function testCanPlayDtmf(): void
    {
        $write  = [
            implode("\r\n", [
                'action: PlayDTMF',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'digit: 1',
                '',
            ]),
        ];
        $action = new PlayDTMFAction('channel', '1');
        $this->testSendAction($write, $action);
    }

    public function testCanPark(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Park',
                'actionid: ' . $this->microTime,
                'channel: channel1',
                'channel2: channel2',
                'timeout: 12',
                'parkinglot: lot',
                '',
            ]),
        ];
        $action = new ParkAction('channel1', 'channel2', 12, 'lot');
        $this->testSendAction($write, $action);
    }

    public function testCanAgi(): void
    {
        $write  = [
            implode("\r\n", [
                'action: AGI',
                'actionid: ' . $this->microTime,
                'channel: channel1',
                'command: an agi command',
                'commandid: blah',
                '',
            ]),
        ];
        $action = new AGIAction('channel1', 'an agi command', 'blah');
        $this->testSendAction($write, $action);
    }

    public function testCanOriginate(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Originate',
                'actionid: ' . $this->microTime,
                'channel: channel',
                'codecs: a,b',
                'async: true',
                'account: account',
                'callerid: clid',
                'timeout: timeout',
                'data: data',
                'application: app',
                'priority: priority',
                'context: context',
                'exten: extension',
                'Variable: a=b',
                '',
            ]),
        ];
        $action = new OriginateAction('channel');
        $action->setCodecs(['a', 'b']);
        $action->setAsync(true);
        $action->setAccount('account');
        $action->setCallerId('clid');
        $action->setTimeout('timeout');
        $action->setData('data');
        $action->setApplication('app');
        $action->setPriority('priority');
        $action->setContext('context');
        $action->setExtension('extension');
        $action->setVariable('a', 'b');
        $this->testSendAction($write, $action);
    }

    public function testCanLogoff(): void
    {
        $write  = [
            implode("\r\n", [
                'action: Logoff',
                'actionid: ' . $this->microTime,
                '',
            ]),
        ];
        $action = new LogoffAction();
        $this->testSendAction($write, $action);
    }

    public function testCanUserEvent(): void
    {
        $write  = [
            implode("\r\n", [
                'action: UserEvent',
                'actionid: ' . $this->microTime,
                'userevent: FooEvent',
                'foo: Bar',
                'bar: Foo',
                '',
            ]),
        ];
        $action = new UserEventAction('FooEvent', ['Foo' => 'Bar', 'Bar' => 'Foo']);
        $this->testSendAction($write, $action);
    }

    public function testCanWaitEvent(): void
    {
        $write  = [
            implode("\r\n", [
                'action: WaitEvent',
                'actionid: ' . $this->microTime,
                'timeout: 20',
                '',
            ]),
        ];
        $action = new WaitEventAction(20);
        $this->testSendAction($write, $action);
    }

    public function testCanSetActionid(): void
    {
        $action = new PingAction();
        // ActionID is between 0 and 69 characters long.
        $actionID = '121234567890123456789012345678901234567890';
        $action->setActionID($actionID);
        $this->assertSame($actionID, $action->getActionID());
    }

    public function testCannotSetActionidLongerThan69Characters(): void
    {
        $this->expectException(PAMIException::class);
        $action = new PingAction();
        // A 70-character long ActionID
        $action->setActionID('1234567890123456789012345678901234567890123456789012345678901234567890');
    }

    public function testCannotSetEmptyActionid(): void
    {
        $this->expectException(PAMIException::class);
        $action = new PingAction();
        // An empty ActionID
        $action->setActionID('');
    }

    public function testCanUpdateConfig(): void
    {
        $number      = 9876;
        $writeCreate = [
            implode("\r\n", [
                'action: UpdateConfig',
                'actionid: ' . $this->microTime,
                'srcfilename: sip.conf',
                'dstfilename: sip.conf',
                'action-000000: NewCat',
                'cat-000000: ' . $number,
                'action-000001: Append',
                'cat-000001: ' . $number,
                'var-000001: username',
                'value-000001: test',
                'action-000002: Append',
                'cat-000002: ' . $number,
                'var-000002: secret',
                'value-000002: secret',
                '',
            ]),
        ];

        $actionCreate = new UpdateConfigAction();

        $actionCreate->setSrcFilename('sip.conf');
        $actionCreate->setDstFilename('sip.conf');

        $actionCreate->setAction('NewCat');
        $actionCreate->setCat($number);

        $actionCreate->setAction('Append');
        $actionCreate->setCat($number);
        $actionCreate->setVar('username');
        $actionCreate->setValue('test');

        $actionCreate->setAction('Append');
        $actionCreate->setCat($number);
        $actionCreate->setVar('secret');
        $actionCreate->setValue('secret');

        $this->testSendAction($writeCreate, $actionCreate);

        $writeDelete = [
            implode("\r\n", [
                'action: UpdateConfig',
                'actionid: ' . $this->microTime,
                'srcfilename: sip.conf',
                'dstfilename: sip.conf',
                'reload: yes',
                'action-000000: DelCat',
                'cat-000000: ' . $number,
                '',
            ]),
        ];

        $actionDelete = new UpdateConfigAction();

        $actionDelete->setSrcFilename('sip.conf');
        $actionDelete->setDstFilename('sip.conf');
        $actionDelete->setReload(true);
        $actionDelete->setAction('DelCat');
        $actionDelete->setCat($number);

        $this->testSendAction($writeDelete, $actionDelete);
    }
}

