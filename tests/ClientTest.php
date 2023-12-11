<?php

namespace Tests;

use Mockery;
use PAMI\Stream\Stream;
use PAMI\Client\IClient;
use Mockery\MockInterface;
use PAMI\Client\Impl\ClientImpl;
use Mockery\LegacyMockInterface;
use PAMI\Message\Action\LoginAction;
use PAMI\Message\Event\UnknownEvent;
use Tests\Resources\SomeListenerClass;
use PAMI\Message\Event\PeerStatusEvent;
use PAMI\Client\Exception\ClientException;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use PAMI\Message\Action\CoreShowChannelsAction;
use PAMI\Message\Event\CoreShowChannelsCompleteEvent;

/**
 * This class will test the ami client
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Client
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @link       http://marcelog.github.com/
 */
class ClientTest extends MockeryTestCase
{
    protected string $microTime;

    protected int $time;

    protected function setUp(): void
    {
        parent::setUp();

        SomeListenerClass::$event = null;

        $this->microTime = (string)microtime(true);
        setMockedMicroTime($this->microTime);

        $this->time = time();
        setMockedTime($this->time);
    }

    /**
     * @return array{0: ClientImpl|MockInterface|LegacyMockInterface, 1: Stream|MockInterface|LegacyMockInterface}
     * @throws \PAMI\Client\Exception\ClientException
     */
    protected function makeClientAndStream(): array
    {
        $options = [
            'host'            => '2.3.4.5',
            'scheme'          => 'tcp://',
            'port'            => 9999,
            'username'        => 'asd',
            'secret'          => 'asd',
            'connect_timeout' => 10,
            'read_timeout'    => 20,
        ];
        $write   =
            "action: Login\r\n" .
            "actionid: " . $this->microTime . "\r\n" .
            "username: asd\r\n" .
            "secret: asd\r\n\r\n";

        $stream = Mockery::mock(Stream::class);

        $client = Mockery::mock(ClientImpl::class, [$options]);
        $client->makePartial();
        $client->shouldAllowMockingProtectedMethods();

        $client->shouldReceive('makeStream')->andReturn($stream);

        $stream->shouldReceive('getLine')
            ->once()
            ->andReturn('Asterisk 1234');

        $stream->shouldReceive('write')
            ->once()
            ->with($write)
            ->andReturn(strlen($write));

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

        $client->open();

        return [$client, $stream];
    }

    public function testCanGetClient(): void
    {
        $options = [
            'host'         => 'tcp://1.1.1.1',
            'port'         => 9999,
            'username'     => 'asd',
            'secret'       => 'asd',
            'connect_timeout' => 10,
            'read_timeout' => 10,
        ];
        $client  = new ClientImpl($options);

        $this->assertInstanceOf(IClient::class, $client);
    }

    public function testCanConnectTimeout(): void
    {
        $this->expectException(\ErrorException::class);
        $this->expectExceptionMessage('timed out');

        set_error_handler(
        /**
         * @throws \ErrorException
         */
            function (int $errno, string $errstr, string $errfile, int $errline) {
                throw new \ErrorException($errstr, $errno, 1, $errfile, $errline);
            });

        $options = [
            'host'         => '2.3.4.5',
            'scheme'       => 'tcp://',
            'port'         => 9999,
            'username'     => 'asd',
            'secret'       => 'asd',
            'connect_timeout' => 3,
            'read_timeout' => 10,
        ];
        $start   = time();

        $client = new ClientImpl($options);
        $client->open();

        $length = time() - $start;
        $this->assertTrue($length >= 2 && $length <= 5);

        restore_error_handler();
    }

    public function testCanDetectOtherPeer(): void
    {
        $this->expectException(ClientException::class);
        $this->expectExceptionMessage('Unknown peer. Is this an ami?');

        $options = [
            'host'         => '2.3.4.5',
            'scheme'       => 'tcp://',
            'port'         => 9999,
            'username'     => 'asd',
            'secret'       => 'asd',
            'connect_timeout' => 10,
            'read_timeout' => 10,
        ];

        $stream = Mockery::mock(Stream::class);

        $client = Mockery::mock(ClientImpl::class, [$options]);
        $client->makePartial();
        $client->shouldAllowMockingProtectedMethods();

        $client->shouldReceive('makeStream')->andReturn($stream);

        $stream->shouldReceive('isConnected')->andReturnTrue();

        $stream->shouldReceive('getLine')
            ->once()
            ->andReturn('Whatever');

        $client->open();
    }

    /**
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanRegisterEventListener(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $client->registerEventListener(new SomeListenerClass);

        $events = [
            implode("\r\n", [
                'Event: PeerStatus',
                'Privilege: system,all',
                'ChannelType: SIP',
                'Peer: SIP/someguy',
                'PeerStatus: Registered',
                '',
            ]),
            "\r\n\r\n",
        ];

        $stream->shouldReceive('read')->andReturn(...$events);

        for ($i = 0; $i < 6; $i++) {
            $client->process();
        }
        $event = SomeListenerClass::$event;
        $this->assertEquals('PeerStatus', $event->getName());
        $this->assertTrue($event instanceof PeerStatusEvent);
    }

    /**
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanRegisterClosureEventListener(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $resultVariable = false;
        $client->registerEventListener(function ($event) use (&$resultVariable) {
            $resultVariable = $event;
        });

        $events = [
            implode("\r\n", [
                'Event: PeerStatus',
                'Privilege: system,all',
                'ChannelType: SIP',
                'Peer: SIP/someguy',
                'PeerStatus: Registered',
                '',
            ]),
            "\r\n\r\n",
        ];

        $stream->shouldReceive('read')->andReturn(...$events);
        for ($i = 0; $i < 6; $i++) {
            $client->process();
        }
        $this->assertEquals('PeerStatus', $resultVariable->getName());
        $this->assertTrue($resultVariable instanceof PeerStatusEvent);
    }

    /**
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanRegisterMethodEventListener(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $listener = new SomeListenerClass;
        $client->registerEventListener([$listener, 'handle']);
        $events = [
            implode("\r\n", [
                'Event: PeerStatus',
                'Privilege: system,all',
                'ChannelType: SIP',
                'Peer: SIP/someguy',
                'PeerStatus: Registered',
                '',
            ]),
            "\r\n\r\n",
        ];

        $stream->shouldReceive('read')->andReturn(...$events);
        for ($i = 0; $i < 6; $i++) {
            $client->process();
        }
        $event = SomeListenerClass::$event;
        $this->assertEquals('PeerStatus', $event->getName());
        $this->assertTrue($event instanceof PeerStatusEvent);
    }

    /**
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanUnregisterEventListener(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $id = $client->registerEventListener(new SomeListenerClass);

        $client->unregisterEventListener($id);

        $events = [
            implode("\r\n", [
                'Event: PeerStatus',
                'Privilege: system,all',
                'ChannelType: SIP',
                'Peer: SIP/someguy',
                'PeerStatus: Registered',
                '',
            ]),
            "\r\n\r\n",
        ];

        $stream->shouldReceive('read')->andReturn(...$events);
        for ($i = 0; $i < 6; $i++) {
            $client->process();
        }

        $this->assertNull(SomeListenerClass::$event);
    }

    /**
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanFilterWithPredicate(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $resultVariable = false;
        $client->registerEventListener(
            function ($event) use (&$resultVariable) {
                $resultVariable = $event;
            },
            function () {
                return false;
            }
        );

        $events = [
            implode("\r\n", [
                'Event: PeerStatus',
                'Privilege: system,all',
                'ChannelType: SIP',
                'Peer: SIP/someguy',
                'PeerStatus: Registered',
                '',
            ]),
            "\r\n\r\n",
        ];

        $stream->shouldReceive('read')->andReturn(...$events);
        for ($i = 0; $i < 6; $i++) {
            $client->process();
        }

        $this->assertFalse($resultVariable);
    }

    /**
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanLogin(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $stream->shouldReceive('close')->once();

        $client->close();
    }

    public function testCannotSend(): void
    {
        $this->expectException(ClientException::class);
        $this->expectExceptionMessage('Could not send message');

        $options = [
            'host'         => '2.3.4.5',
            'scheme'       => 'tcp://',
            'port'         => 9999,
            'username'     => 'asd',
            'secret'       => 'asd',
            'connect_timeout' => 10,
            'read_timeout' => 10,
        ];

        $stream = Mockery::mock(Stream::class);

        $client = Mockery::mock(ClientImpl::class, [$options]);
        $client->makePartial();
        $client->shouldAllowMockingProtectedMethods();

        $client->shouldReceive('makeStream')->andReturn($stream);

        $stream->shouldReceive('getLine')
            ->once()
            ->andReturn('Asterisk 1234');

        $stream->shouldReceive('isConnected')
            ->andReturnTrue();

        $stream->shouldReceive('write')
            ->once()
            ->andReturn(1); // wrong write length

        $client->open();
    }

    public function testCannotLogin(): void
    {
        $this->expectException(ClientException::class);

        $options = [
            'host'         => '2.3.4.5',
            'scheme'       => 'tcp://',
            'port'         => 9999,
            'username'     => 'asd',
            'secret'       => 'asd',
            'connect_timeout' => 10,
            'read_timeout' => 10,
        ];
        $write   =
            "action: Login\r\n" .
            "actionid: " . $this->microTime . "\r\n" .
            "username: asd\r\n" .
            "secret: asd\r\n\r\n";

        $stream = Mockery::mock(Stream::class);

        $client = Mockery::mock(ClientImpl::class, [$options]);
        $client->makePartial();
        $client->shouldAllowMockingProtectedMethods();

        $client->shouldReceive('makeStream')->andReturn($stream);

        $stream->shouldReceive('getLine')
            ->once()
            ->andReturn('Asterisk 1234');

        $stream->shouldReceive('write')
            ->once()
            ->with($write)
            ->andReturn(strlen($write));

        $stream->shouldReceive('read')
            ->andReturn(
                "Asterisk Call Manager/1.1\r\n",
                "Response: Error\r\n", // also tests behavior when asterisk does not return an actionid
                "Message: Authentication accepted\r\n",
                "\r\n",
                "\r\n\r\n"
            );

        $stream->shouldReceive('isConnected')
            ->andReturnTrue();

        $stream->shouldReceive('endOfFile')
            ->andReturnFalse();

        $client->open();
    }

    public function testCannotRead(): void
    {
        $this->expectException(ClientException::class);
        $this->expectExceptionMessage('Error reading');

        $options = [
            'host'         => '2.3.4.5',
            'scheme'       => 'tcp://',
            'port'         => 9999,
            'username'     => 'asd',
            'secret'       => 'asd',
            'connect_timeout' => 10,
            'read_timeout' => 10,
        ];
        $write   =
            "action: Login\r\n" .
            "actionid: " . $this->microTime . "\r\n" .
            "username: asd\r\n" .
            "secret: asd\r\n\r\n";

        $stream = Mockery::mock(Stream::class);

        $client = Mockery::mock(ClientImpl::class, [$options]);
        $client->makePartial();
        $client->shouldAllowMockingProtectedMethods();

        $client->shouldReceive('makeStream')->andReturn($stream);

        $stream->shouldReceive('getLine')
            ->once()
            ->andReturn('Asterisk 1234');

        $stream->shouldReceive('write')
            ->once()
            ->with($write)
            ->andReturn(strlen($write));

        $stream->shouldReceive('read')
            ->andReturnFalse();

        $stream->shouldReceive('isConnected')
            ->andReturnTrue();

        $stream->shouldReceive('endOfFile')
            ->andReturnFalse();

        $client->open();
    }

    /**
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanGetResponseWithAssociatedEvents(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $action = new CoreShowChannelsAction();

        $write =
            "action: CoreShowChannels\r\n" .
            "actionid: " . $this->microTime . "\r\n" .
            "\r\n";

        $this->assertEquals($write, $action->serialize());

        $stream->shouldReceive('write')
            ->with($write)
            ->andReturn(strlen($write));

        $event = [
            "Response: Success\r\n",
            "ActionID: " . $this->microTime . "\r\n",
            "Eventlist: start\r\n",
            "Message: Channels will follow\r\n",
            "\r\n",
            "Event: CoreShowChannelsComplete\r\n",
            "EventList: Complete\r\n",
            "ListItems: 0\r\n",
            "ActionID: " . $this->microTime . "\r\n",
            "\r\n",
            "\r\n\r\n",
        ];

        $stream->shouldReceive('read')->andReturn(...$event);

        $result = $client->send($action);

        $events = $result->getEvents();

        $this->assertCount(1, $events);
        $this->assertTrue($events[0] instanceof CoreShowChannelsCompleteEvent);
        $this->assertEquals(
            $events[0]->getRawContent(), implode("\r\n", [
                'Event: CoreShowChannelsComplete',
                'EventList: Complete',
                'ListItems: 0',
                'ActionID: ' . $this->microTime,
            ])
        );
    }

    /**
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanSerializeResponseAndEvents(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $client->registerEventListener(new SomeListenerClass);

        $action = new CoreShowChannelsAction;
        $write  =
            "action: CoreShowChannels\r\n" .
            "actionid: " . $this->microTime . "\r\n" .
            "\r\n";

        $this->assertEquals($write, $action->serialize());

        $stream->shouldReceive('write')
            ->with($write)
            ->andReturn(strlen($write));

        $event = [
            "Response: Success\r\n",
            "ActionID: " . $this->microTime . "\r\n",
            "Eventlist: start\r\n",
            "Message: Channels will follow\r\n",
            "\r\n",
            "Event: CoreShowChannelsComplete\r\n",
            "EventList: Complete\r\n",
            "ListItems: 0\r\n",
            "ActionID: " . $this->microTime . "\r\n",
            "\r\n",
            "\r\n\r\n",
        ];

        $stream->shouldReceive('read')->andReturn(...$event);

        $result = $client->send($action);

        $ser = serialize($result);
        $result2 = unserialize($ser);

        /** @var array<int,CoreShowChannelsCompleteEvent> $events */
        $events = $result2->getEvents();
        $this->assertEquals('Channels will follow', $result2->getMessage());

        $event = $events[0];

        $this->assertEquals('CoreShowChannelsComplete', $event->getName());
        $this->assertEquals(0, $event->getListItems());
    }

    /**
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanGetResponseEventsWithoutActionidAndEvent(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $client->registerEventListener(new SomeListenerClass);

        $event = [
            "Response: Success\r\n",
            "ActionID: " . $this->microTime . "\r\n",
            "Eventlist: start\r\n",
            "Message: Channels will follow\r\n",
            "\r\n",
            "Channel: pepe\r\n",
            "Count: Blah\r\n",
            "\r\n",
            "Event: CoreShowChannelsComplete\r\n",
            "EventList: Complete\r\n",
            "ListItems: 0\r\n",
            "ActionID: " . $this->microTime . "\r\n",
            "\r\n",
            "\r\n\r\n",
        ];

        $write =
            "action: CoreShowChannels\r\n" .
            "actionid: " . $this->microTime . "\r\n" .
            "\r\n";

        $stream->shouldReceive('write')
            ->with($write)
            ->andReturn(strlen($write));

        $stream->shouldReceive('read')->andReturn(...$event);

        $action = new CoreShowChannelsAction;

        $this->assertEquals($write, $action->serialize());

        $result = $client->send($action);

        /** @var array<int,CoreShowChannelsCompleteEvent> $events */
        $events = $result->getEvents();

        $this->assertEquals('ResponseEvent', $events[0]->getName());
        $this->assertEquals('pepe', $events[0]->getKey('Channel'));
        $this->assertEquals('Blah', $events[0]->getKey('Count'));
        $this->assertEquals('CoreShowChannelsComplete', $events[1]->getName());
        $this->assertEquals(0, $events[1]->getListItems());
    }

    public function testCanGetSetVariable(): void
    {
        $now    = time();
        $action = new LoginAction('a', 'b');
        $this->assertEquals($now, $action->getCreatedDate());
        $action->setVariable('variable', 'value');
        $this->assertEquals('value', $action->getVariable('variable'));
        $this->assertNull($action->getVariable('variable2'));
    }

    public function testCanGetSetVariableWithMultipleValues(): void
    {
        $action = new LoginAction('a', 'b');
        $this->assertEquals($this->time, $action->getCreatedDate());
        $action->setVariable('variable', ['value1', 'value2']);
        $text
            = "action: Login\r\n"
            . "actionid: " . $this->microTime . "\r\n"
            . "username: a\r\n"
            . "secret: b\r\n"
            . "Variable: variable=value1\r\n"
            . "Variable: variable=value2\r\n"
            . "\r\n";
        $this->assertEquals($text, $action->serialize());
    }

    /**
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanReportUnknownEvent(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $client->registerEventListener(new SomeListenerClass);

        $event = [
            "Event: MyOwnImaginaryEvent\r\n",
            "Privilege: system,all\r\n",
            "ChannelType: SIP\r\n",
            "\r\n",
            "\r\n\r\n",
        ];

        $stream->shouldReceive('read')->andReturn(...$event);

        for ($i = 0; $i < 4; $i++) {
            $client->process();
        }
        $this->assertTrue(SomeListenerClass::$event instanceof UnknownEvent);
    }

    /**
     * @group channel_vars
     * ChanVariable is sent without a channel name and without a "channel"
     * key.
     * https://github.com/marcelog/PAMI/issues/85
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanGetChannelVariablesWithoutDefaultChannelName(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $client->registerEventListener(new SomeListenerClass);

        $event = [
            "Event: Dial\r\n",
            "Privilege: call,all\r\n",
            "SubEvent: Begin\r\n",
            "Destination: SIP/jw1034-00000010\r\n",
            "CallerIDNum: 1201\r\n",
            "CallerIDName: <unknown>\r\n",
            "ConnectedLineNum: strategy-sequential\r\n",
            "ConnectedLineName: <unknown>\r\n",
            "UniqueID: pbx-1439974866.33\r\n",
            "DestUniqueID: pbx-1439974866.34\r\n",
            "Dialstring: jw1034\r\n",
            "ChanVariable: var1\r\n",
            "ChanVariable: var2=v2\r\n",
            "\r\n",
            "\r\n\r\n",
        ];

        $stream->shouldReceive('read')->andReturn(...$event);

        for ($i = 0; $i < 14; $i++) {
            $client->process();
        }
        $event       = SomeListenerClass::$event;
        $varChan     = [
            'var1' => '',
            'var2' => 'v2',
        ];
        $channelVars = [
            'default' => $varChan,
        ];
        $this->assertEquals($channelVars, $event->getAllChannelVariables());
        $this->assertEquals($varChan, $event->getChannelVariables());
        $this->assertEquals($varChan, $event->getChannelVariables('default'));
    }

    /**
     * @group channel_vars
     * ChanVariable is sent without a channel name but with a "channel" key.
     * https://github.com/marcelog/PAMI/issues/85
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanGetChannelVariablesWithDefaultChannelName(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $client->registerEventListener(new SomeListenerClass);

        $event = [
            "Event: Dial\r\n",
            "Privilege: call,all\r\n",
            "Channel: Local/0@pbx_dial_callroute_to_endpoint-00000008;2\r\n",
            "SubEvent: Begin\r\n",
            "Destination: SIP/jw1034-00000010\r\n",
            "CallerIDNum: 1201\r\n",
            "CallerIDName: <unknown>\r\n",
            "ConnectedLineNum: strategy-sequential\r\n",
            "ConnectedLineName: <unknown>\r\n",
            "UniqueID: pbx-1439974866.33\r\n",
            "DestUniqueID: pbx-1439974866.34\r\n",
            "Dialstring: jw1034\r\n",
            "ChanVariable: var1\r\n",
            "ChanVariable: var2=v2\r\n",
            "\r\n",
            "\r\n\r\n",
        ];
        $stream->shouldReceive('read')->andReturn(...$event);

        for ($i = 0; $i < 15; $i++) {
            $client->process();
        }
        $event       = SomeListenerClass::$event;
        $varChan     = [
            'var1' => '',
            'var2' => 'v2',
        ];
        $channelVars = [
            'local/0@pbx_dial_callroute_to_endpoint-00000008;2' => $varChan,
        ];
        $this->assertEquals($channelVars, $event->getAllChannelVariables());
        $this->assertEquals($varChan, $event->getChannelVariables());
        $this->assertEquals(
            $varChan,
            $event->getChannelVariables(
                'Local/0@pbx_dial_callroute_to_endpoint-00000008;2'
            )
        );
    }

    /**
     * @group channel_vars
     * ChanVariable is sent with a channel name and with a "channel" key.
     * https://github.com/marcelog/PAMI/issues/85
     * @throws \PAMI\Client\Exception\ClientException
     */
    public function testCanGetChannelVariables(): void
    {
        [$client, $stream] = $this->makeClientAndStream();

        $client->registerEventListener(new SomeListenerClass);

        $event = [
            "Event: Dial\r\n",
            "Privilege: call,all\r\n",
            "SubEvent: Begin\r\n",
            "Channel: Local/0@pbx_dial_callroute_to_endpoint-00000008;2\r\n",
            "Destination: SIP/jw1034-00000010\r\n",
            "CallerIDNum: 1201\r\n",
            "CallerIDName: <unknown>\r\n",
            "ConnectedLineNum: strategy-sequential\r\n",
            "ConnectedLineName: <unknown>\r\n",
            "UniqueID: pbx-1439974866.33\r\n",
            "DestUniqueID: pbx-1439974866.34\r\n",
            "Dialstring: jw1034\r\n",
            "ChanVariable: var1\r\n",
            "ChanVariable: var2=value2\r\n",
            "ChanVariable(Local/0@pbx_dial_callroute_to_endpoint-00000008;2): var3=value3\r\n",
            "ChanVariable(Local/0@pbx_dial_callroute_to_endpoint-00000008;2): var4=value4\r\n",
            "ChanVariable(Local/0@pbx_dial_callroute_to_endpoint-00000008;2): var5=value5\r\n",
            "ChanVariable(SIP/jw1034-00000010): var12=value12\r\n",
            "ChanVariable(SIP/jw1034-00000010): var22=value22\r\n",
            "ChanVariable(SIP/jw1034-00000010): var32=value32\r\n",
            "\r\n",
            "\r\n\r\n",
        ];

        $stream->shouldReceive('read')->andReturn(...$event);

        for ($i = 0; $i < 21; $i++) {
            $client->process();
        }
        $event       = SomeListenerClass::$event;
        $varChan1    = [
            'var1' => '',
            'var2' => 'value2',
            'var3' => 'value3',
            'var4' => 'value4',
            'var5' => 'value5',
        ];
        $varChan2    = [
            'var12' => 'value12',
            'var22' => 'value22',
            'var32' => 'value32',
        ];
        $channelVars = [
            'local/0@pbx_dial_callroute_to_endpoint-00000008;2' => $varChan1,
            'sip/jw1034-00000010' => $varChan2,
        ];
        $this->assertEquals($varChan1, $event->getChannelVariables());
        $this->assertEquals($channelVars, $event->getAllChannelVariables());
    }
}


