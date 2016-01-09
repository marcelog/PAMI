<?php
//declare(ticks=1);
/**
 * PAMI basic use example.
 *
 * PHP Version 5
 *
 * @category Pami
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://www.noneyet.ar/
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
if ($argc != 7) {
    echo "Use: $argv[0] <host> <port> <user> <pass> <connect timeout> <read timeout>";
    exit (254);
}

////////////////////////////////////////////////////////////////////////////////
// Mandatory stuff to bootstrap.
////////////////////////////////////////////////////////////////////////////////
require(implode(DIRECTORY_SEPARATOR, array(
    __DIR__,
    '..',
    '..',
    '..',
    'vendor',
    'autoload.php'
)));

use PAMI\Client\Impl\ClientImpl;
use PAMI\Listener\IEventListener;
use PAMI\Message\Event\EventMessage;
use PAMI\Message\Action\ListCommandsAction;
use PAMI\Message\Action\ListCategoriesAction;
use PAMI\Message\Action\CoreShowChannelsAction;
use PAMI\Message\Action\CoreSettingsAction;
use PAMI\Message\Action\CoreStatusAction;
use PAMI\Message\Action\StatusAction;
use PAMI\Message\Action\ReloadAction;
use PAMI\Message\Action\CommandAction;
use PAMI\Message\Action\HangupAction;
use PAMI\Message\Action\LogoffAction;
use PAMI\Message\Action\AbsoluteTimeoutAction;
use PAMI\Message\Action\OriginateAction;
use PAMI\Message\Action\BridgeAction;
use PAMI\Message\Action\CreateConfigAction;
use PAMI\Message\Action\GetConfigAction;
use PAMI\Message\Action\GetConfigJSONAction;
use PAMI\Message\Action\AttendedTransferAction;
use PAMI\Message\Action\RedirectAction;
use PAMI\Message\Action\DAHDIShowChannelsAction;
use PAMI\Message\Action\DAHDIHangupAction;
use PAMI\Message\Action\DAHDIRestartAction;
use PAMI\Message\Action\DAHDIDialOffHookAction;
use PAMI\Message\Action\DAHDIDNDOnAction;
use PAMI\Message\Action\DAHDIDNDOffAction;
use PAMI\Message\Action\AgentsAction;
use PAMI\Message\Action\AgentLogoffAction;
use PAMI\Message\Action\MailboxStatusAction;
use PAMI\Message\Action\MailboxCountAction;
use PAMI\Message\Action\VoicemailUsersListAction;
use PAMI\Message\Action\PlayDTMFAction;
use PAMI\Message\Action\DBGetAction;
use PAMI\Message\Action\DBPutAction;
use PAMI\Message\Action\DBDelAction;
use PAMI\Message\Action\DBDelTreeAction;
use PAMI\Message\Action\GetVarAction;
use PAMI\Message\Action\SetVarAction;
use PAMI\Message\Action\PingAction;
use PAMI\Message\Action\ParkedCallsAction;
use PAMI\Message\Action\SIPQualifyPeerAction;
use PAMI\Message\Action\SIPShowPeerAction;
use PAMI\Message\Action\SIPPeersAction;
use PAMI\Message\Action\SIPShowRegistryAction;
use PAMI\Message\Action\SIPNotifyAction;
use PAMI\Message\Action\QueuesAction;
use PAMI\Message\Action\QueueStatusAction;
use PAMI\Message\Action\QueueSummaryAction;
use PAMI\Message\Action\QueuePauseAction;
use PAMI\Message\Action\QueueRemoveAction;
use PAMI\Message\Action\QueueUnpauseAction;
use PAMI\Message\Action\QueueLogAction;
use PAMI\Message\Action\QueuePenaltyAction;
use PAMI\Message\Action\QueueReloadAction;
use PAMI\Message\Action\QueueResetAction;
use PAMI\Message\Action\QueueRuleAction;
use PAMI\Message\Action\MonitorAction;
use PAMI\Message\Action\PauseMonitorAction;
use PAMI\Message\Action\UnpauseMonitorAction;
use PAMI\Message\Action\StopMonitorAction;
use PAMI\Message\Action\ExtensionStateAction;
use PAMI\Message\Action\JabberSendAction;
use PAMI\Message\Action\LocalOptimizeAwayAction;
use PAMI\Message\Action\ModuleCheckAction;
use PAMI\Message\Action\ModuleLoadAction;
use PAMI\Message\Action\ModuleUnloadAction;
use PAMI\Message\Action\ModuleReloadAction;
use PAMI\Message\Action\ShowDialPlanAction;
use PAMI\Message\Action\ParkAction;
use PAMI\Message\Action\MeetmeListAction;
use PAMI\Message\Action\MeetmeMuteAction;
use PAMI\Message\Action\MeetmeUnmuteAction;
use PAMI\Message\Action\EventsAction;
use PAMI\Message\Action\VGMSMSTxAction;
use PAMI\Message\Action\DongleSendSMSAction;
use PAMI\Message\Action\DongleShowDevicesAction;
use PAMI\Message\Action\DongleReloadAction;
use PAMI\Message\Action\DongleStartAction;
use PAMI\Message\Action\DongleRestartAction;
use PAMI\Message\Action\DongleStopAction;
use PAMI\Message\Action\DongleResetAction;
use PAMI\Message\Action\DongleSendUSSDAction;
use PAMI\Message\Action\DongleSendPDUAction;

class A implements IEventListener
{
    public function handle(EventMessage $event)
    {
        var_dump($event);
    }
}
////////////////////////////////////////////////////////////////////////////////
// Code STARTS.
////////////////////////////////////////////////////////////////////////////////
error_reporting(E_ALL);
ini_set('display_errors', 1);

try
{
    $options = array(
        'host' => $argv[1],
        'port' => $argv[2],
        'username' => $argv[3],
        'secret' => $argv[4],
        'connect_timeout' => $argv[5],
        'read_timeout' => $argv[6],
        'scheme' => 'tcp://' // try tls://
    );
	$a = new ClientImpl($options);
    // Registering a closure
    //$client->registerEventListener(function ($event) {
    //});

    // Register a specific method of an object for event listening
    //$client->registerEventListener(array($listener, 'handle'));

    // Register an IEventListener:
	$a->registerEventListener(new A());
	$a->open();
/*
	var_dump($a->send(new DongleSendUSSDAction('dongle01', '*101#')));
	var_dump($a->send(new DongleSendPDUAction('dongle01', 'AT+CSMS=0 ')));
	var_dump($a->send(new DongleRestartAction('now', 'dongle01')));
	var_dump($a->send(new DongleResetAction('dongle01')));
	var_dump($a->send(new DongleReloadAction('now')));
	var_dump($a->send(new DongleStopAction('now', 'dongle01')));
	var_dump($a->send(new DongleStartAction('dongle01')));
	var_dump($a->send(new DongleSendSMSAction('dongle01', '+666666666', 'a message')));
	var_dump($a->send(new ListCommandsAction()));
	var_dump($a->send(new QueueStatusAction()));
	var_dump($a->send(new QueueStatusAction()));
	var_dump($a->send(new QueueStatusAction()));
	var_dump($a->send(new CoreShowChannelsAction()));
	var_dump($a->send(new SIPPeersAction()));
	var_dump($a->send(new StatusAction()));
	var_dump($a->send(new CommandAction('sip show peers')));
	var_dump($a->send(new SIPShowRegistryAction()));
	var_dump($a->send(new CoreSettingsAction()));
	var_dump($a->send(new ListCategoriesAction('sip.conf')));
	var_dump($a->send(new CoreStatusAction()));
	var_dump($a->send(new GetConfigAction('extensions.conf')));
	var_dump($a->send(new GetConfigAction('sip.conf', 'general')));
	var_dump($a->send(new GetConfigJSONAction('extensions.conf')));
	var_dump($a->send(new DAHDIShowChannelsAction()));
	var_dump($a->send(new AgentsAction()));
	var_dump($a->send(new MailboxStatusAction('marcelog@gmail')));
	var_dump($a->send(new MailboxCountAction('marcelog@gmail')));
	var_dump($a->send(new VoicemailUsersListAction()));
	var_dump($a->send(new DBPutAction('something', 'a', 'a')));
	var_dump($a->send(new DBGetAction('something', 'a')));
	var_dump($a->send(new DBDelAction('something', 'a')));
	var_dump($a->send(new DBDelTreeAction('something', 'a')));
	var_dump($a->send(new SetVarAction('foo', 'asd')));
	var_dump($a->send(new SetVarAction('foo', 'asd', 'SIP/a-1')));
	var_dump($a->send(new GetVarAction('foo')));
	var_dump($a->send(new ParkedCallsAction()));
	var_dump($a->send(new GetVarAction('foo', 'SIP/a-1')));
	var_dump($a->send(new PingAction()));
	var_dump($a->send(new ExtensionStateAction('1', 'default')));
	var_dump($a->send(new ModuleCheckAction('chan_sip')));
	var_dump($a->send(new SIPShowPeerAction('marcelog')));
	var_dump($a->send(new QueuePauseAction('Agent/123')));
	var_dump($a->send(new QueueUnpauseAction('Agent/123')));
	var_dump($a->send(new QueueStatusAction()));
	$notify = new SIPNotifyAction('marcelog');
	$notify->setVariable('a', 'b');
	var_dump($a->send($notify));
	var_dump($a->send(new ShowDialPlanAction()));
	var_dump($a->send(new QueueSummaryAction()));
	var_dump($a->send(new QueueLogAction('a', 'asdasd')));
	var_dump($a->send(new QueuePenaltyAction('Agent/123', '123')));
	var_dump($a->send(new QueueResetAction('a')));
	var_dump($a->send(new QueueRuleAction('a')));
*/
	//var_dump($a->send(new QueueReloadAction('a', true, true, true)));
	//
	// The following are commented just in case you run it in the wrong box ;)
	//
	//var_dump($a->send(new QueueRemoveAction('a', 'Agent/123')));
	//var_dump($a->send(new MeetmeListAction('asd')));
	//var_dump($a->send(new MeetmeMuteAction('asd', 'asd')));
	//var_dump($a->send(new MeetmeUnmuteAction('asd', 'asd')));
	//var_dump($a->send(new ParkAction('a', 'b')));
	//var_dump($a->send(new JabberSendAction('a', 'b', 'c')));
	//var_dump($a->send(new QueuesAction()));
	//var_dump($a->send(new MonitorAction('DAHDI/1-1', 'monitor')));
	//var_dump($a->send(new PauseMonitorAction('DAHDI/1-1')));
	//var_dump($a->send(new UnpauseMonitorAction('DAHDI/1-1')));
	//var_dump($a->send(new StopMonitorAction('DAHDI/1-1')));
	//var_dump($a->send(new SipQualifyPeerAction('marcelog')));
	//var_dump($a->send(new AgentLogoffAction('a', true)));
	//var_dump($a->send(new PlayDTMFAction('DAHDI/1-1', '1')));
	//var_dump($a->send(new CreateConfigAction('foo.conf')));
	//var_dump($a->send(new DAHDIDNDOnAction('1')));
	//var_dump($a->send(new DAHDIDNDOffAction('1')));
	//var_dump($a->send(new DAHDIDialOffHookAction(1, '113')));
	//var_dump($a->send(new DAHDIRestartAction()));
	//var_dump($a->send(new RedirectAction('SIP/a-1', '51992266', 'netlabs', '1')));
	//var_dump($a->send(new AttendedTransferAction('SIP/a-1', '51992266', 'netlabs', '1')));
	//var_dump($a->send(new ModuleReloadAction('chan_sip.so')));
	//var_dump($a->send(new ModuleLoadAction('chan_sip.so')));
	//var_dump($a->send(new ModuleUnloadAction('chan_sip.so')));
	//$originateMsg = new OriginateAction('SIP/marcelog');
	//$originateMsg->setContext('netlabs');
	//$originateMsg->setPriority('1');
	//$originateMsg->setExtension('51992266');
	//var_dump($a->send($originateMsg));
	//var_dump($a->send(new AbsoluteTimeoutAction('SIP/XXXX-123123', 10)));
	//var_dump($a->send(new BridgeAction('SIP/a-1', 'SIP/a-2', true)));
	//var_dump($a->send(new LogoffAction()));
	//var_dump($a->send(new HangupAction('SIP/XXXX-123123')));
	//var_dump($a->send(new DAHDIHangupAction('1')));
	//var_dump($a->send(new ReloadAction()));
	//var_dump($a->send(new ReloadAction('chan_sip')));
	//var_dump($a->send(new LocalOptimizeAwayAction('SIP/a-1')));
	//var_dump($a->send(new EventsAction()));
    //var_dump($a->send(new QueuesAction())->getRawContent());
    //
    // SMS
    //$sms = new VGMSMSTxAction();
    //$sms->setContentType('text/plain; charset=ASCII');
    //$sms->setContent($msg);
    //$sms->setCellPhone($phone);
    //$a->send($sms);

	$time = time();
	while(true)//(time() - $time) < 60) // Wait for events.
	{
	    usleep(1000); // 1ms delay
	    // Since we declare(ticks=1) at the top, the following line is not necessary
	    $a->process();
	}
	$a->close(); // send logoff and close the connection.
} catch (Exception $e) {
	echo $e->getMessage() . "\n";
}
////////////////////////////////////////////////////////////////////////////////
// Code ENDS.
////////////////////////////////////////////////////////////////////////////////
