<?php
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
namespace {
    $mockTime = false;
    $mockTimeCount = false;
    $mockTimeReturn = false;
    $mock_stream_socket_client = false;
    $mock_stream_set_blocking = false;
    $mockFwrite = false;
    $mockFwriteReturn = false;
    $mockFwriteCount = 0;
    $mockFgets = false;
    $mockFgetsCount = 0;
    $mockFreadReturn = false;
    $standardAMIStart = array(
   		'Asterisk Call Manager/1.1',
   		'Response: Success',
   		'ActionID: 1432.123',
   		'Message: Authentication accepted',
        '',
        'Response: Goodbye',
        'ActionID: 1432.123',
        'Message: Thanks for all the fish.',
        ''
    );
    $standardAMIStartBadLogin = array(
   		'Asterisk Call Manager/1.1',
   		'Response: Error', // also tests behavior when asterisk does not return an actionid
   		'Message: Authentication accepted',
        ''
    );
}
namespace PAMI\Message\Action {
    function microtime() {
        global $mockTime;
        global $mockTimeCount;
        global $mockTimeReturn;
        if (isset($mockTime) && $mockTime === true) {
            return 1432.123;
        } else {
            return call_user_func_array('\microtime', func_get_args());
        }
    }
}

namespace PAMI\Client\Impl {
    function microtime() {
        global $mockTime;
        global $mockTimeCount;
        global $mockTimeReturn;
        if (isset($mockTime) && $mockTime === true) {
            return 1432.123;
        } else {
            return call_user_func_array('\microtime', func_get_args());
        }
    }
    function stream_socket_client($remote_socket, &$errno = null, &$errstr = null, $timeout = null, $flags = null, $context = null) {
        global $mock_stream_socket_client;
        if (isset($mock_stream_socket_client) && $mock_stream_socket_client === true) {
        } else {
            return \stream_socket_client($remote_socket, $errno, $errstr, $timeout, $flags, $context);
        }
    }
    function stream_socket_shutdown() {
        return true;
    }
    function stream_set_blocking() {
        global $mock_stream_set_blocking;
        if (isset($mock_stream_set_blocking) && $mock_stream_set_blocking === true) {
            return true;
        } else {
            return call_user_func_array('\stream_set_blocking', func_get_args());
        }
    }
    function fwrite() {
        global $mockFwrite;
        global $mockFwriteCount;
        global $mockFwriteReturn;
        if (isset($mockFwrite) && $mockFwrite === true) {
            $args = func_get_args();
            if (isset($mockFwriteReturn[$mockFwriteCount]) && $mockFwriteReturn[$mockFwriteCount] !== false) {
                if ($mockFwriteReturn[$mockFwriteCount] === 'fwrite error') {
                    $mockFwriteCount++;
                    return 0;
                }
                $str = $mockFwriteReturn[$mockFwriteCount] . "\r\n";
                if ($str !== $args[1]) {
                    throw new \Exception(
                    	'Mocked: ' . PHP_EOL . PHP_EOL .  print_r($mockFwriteReturn[$mockFwriteCount], true) . PHP_EOL . PHP_EOL
                        . ' is different from: ' . PHP_EOL . PHP_EOL . print_r($args[1], true)
                    );
                }
            }
            $mockFwriteCount++;
            return strlen($args[1]);
        } else {
            return call_user_func_array('\fwrite', func_get_args());
        }
    }
    function stream_get_line() {
        global $mockFgets;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        if (isset($mockFgets) && $mockFgets === true) {
            $result = $mockFgetsReturn[$mockFgetsCount];
            $mockFgetsCount++;
            return is_string($result) ? $result . "\r\n" : $result;
        } else {
            return call_user_func_array('\stream_get_line', func_get_args());
        }
    }
    function feof($resource) {
        global $mockFgets;
        if (isset($mockFgets) && $mockFgets === true) {
            return false;
        }
        return \feof($resource);
    }

    function fread() {
        global $mockFgets;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        if (isset($mockFgets) && $mockFgets === true) {
            $result = $mockFgetsReturn[$mockFgetsCount];
            $mockFgetsCount++;
            if (is_integer($result)) {
                sleep($result);
                return '';
            }
            return is_string($result) ? $result . "\r\n" : $result;
        } else {
            return call_user_func_array('\fread', func_get_args());
        }
    }
    function setFgetsMock(array $readValues, $writeValues)
    {
        global $mockFgets;
        global $mockFopen;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        global $mockFwrite;
        global $mockFwriteCount;
        global $mockFwriteReturn;
        $mockFgets = true;
        $mockFopen = true;
        $mockFwrite = true;
        $mockFgetsCount = 0;
        $mockFgetsReturn = $readValues;
        $mockFwriteCount = 0;
        $mockFwriteReturn = $writeValues;
    }
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
class Test_Client extends \PHPUnit_Framework_TestCase
{
    private $_properties = array();

    public function setUp()
    {
        $this->_properties = array();
    }

    /**
     * @test
     */
    public function can_get_client()
    {
        $options = array(
        	'host' => 'tcp://1.1.1.1',
        	'port' => 9999,
        	'username' => 'asd',
        	'secret' => 'asd',
            'connect_timeout' => 10,
        	'read_timeout' => 10
        );
	    $client = new \PAMI\Client\Impl\ClientImpl($options);
    }
    /**
     * @test
     */
    public function can_connect_timeout()
    {
        $options = array(
        	'host' => '2.3.4.5',
            'scheme' => 'tcp://',
        	'port' => 9999,
        	'username' => 'asd',
        	'secret' => 'asd',
            'connect_timeout' => 3,
        	'read_timeout' => 10
        );
        $start = time();
        try
        {
	        $client = new \PAMI\Client\Impl\ClientImpl($options);
	        $client->open();
        } catch(\Exception $e) {
        }
        $length = time() - $start;
        $this->assertTrue($length >= 2 && $length <= 5);
    }
    /**
     * @test
     * @expectedException \PAMI\Client\Exception\ClientException
     */
    public function can_detect_other_peer()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
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
        $read = array('Whatever');
        $write = array();
        setFgetsMock($read, $write);
        $client = new \PAMI\Client\Impl\ClientImpl($options);
	    $client->open();
    }
    /**
     * @test
     */
    public function can_register_event_listener()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        $event = array(
        	'Event: PeerStatus',
            'Privilege: system,all',
            'ChannelType: SIP',
        	'Peer: SIP/someguy',
        	'PeerStatus: Registered',
        	''
        );
	    setFgetsMock($event, $event);
	    for($i = 0; $i < 6; $i++) {
	        $client->process();
	    }
	    $event = SomeListenerClass::$event;
	    $this->assertEquals($event->getName(), 'PeerStatus');
        $this->assertTrue($event instanceof \PAMI\Message\Event\PeerStatusEvent);
    }

    /**
     * @test
     */
    public function can_register_closure_event_listener()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        $resultVariable = false;
        $client->registerEventListener(function ($event) use (&$resultVariable) {
            $resultVariable = $event;
        });
	    $client->open();
        $event = array(
        	'Event: PeerStatus',
            'Privilege: system,all',
            'ChannelType: SIP',
        	'Peer: SIP/someguy',
        	'PeerStatus: Registered',
        	''
        );
	    setFgetsMock($event, $event);
	    for($i = 0; $i < 6; $i++) {
	        $client->process();
	    }
	    $this->assertEquals($resultVariable->getName(), 'PeerStatus');
        $this->assertTrue($resultVariable instanceof \PAMI\Message\Event\PeerStatusEvent);
    }

    /**
     * @test
     */
    public function can_register_method_event_listener()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        $resultVariable = false;
        $listener = new SomeListenerClass;
        $client->registerEventListener(array($listener, 'handle'));
	    $client->open();
        $event = array(
        	'Event: PeerStatus',
            'Privilege: system,all',
            'ChannelType: SIP',
        	'Peer: SIP/someguy',
        	'PeerStatus: Registered',
        	''
        );
	    setFgetsMock($event, $event);
	    for($i = 0; $i < 6; $i++) {
	        $client->process();
	    }
	    $event = SomeListenerClass::$event;
	    $this->assertEquals($event->getName(), 'PeerStatus');
        $this->assertTrue($event instanceof \PAMI\Message\Event\PeerStatusEvent);
    }

    /**
     * @test
     */
    public function can_unregister_event_listener()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        SomeListenerClass::$event = null;
        $id = $client->registerEventListener(new SomeListenerClass);
	    $client->open();
        $event = array(
        	'Event: PeerStatus',
            'Privilege: system,all',
            'ChannelType: SIP',
        	'Peer: SIP/someguy',
        	'PeerStatus: Registered',
        	''
        );
	    setFgetsMock($event, $event);
	    $client->unregisterEventListener($id);
	    for($i = 0; $i < 6; $i++) {
	        $client->process();
	    }
	    $event = SomeListenerClass::$event;
	    $this->assertNull(SomeListenerClass::$event);
    }

    /**
     * @test
     */
    public function can_filter_with_predicate()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        $resultVariable = false;
        $client->registerEventListener(
            function ($event) use (&$resultVariable) {
                $resultVariable = $event;
            },
            function ($event) {
                return false;
            }
        );
	    $client->open();
        $event = array(
        	'Event: PeerStatus',
            'Privilege: system,all',
            'ChannelType: SIP',
        	'Peer: SIP/someguy',
        	'PeerStatus: Registered',
        	''
        );
	    setFgetsMock($event, $event);
	    for($i = 0; $i < 6; $i++) {
	        $client->process();
	    }
        $this->assertFalse($resultVariable);
    }

    /**
     * @test
     */
    public function can_login()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
	    $client->open();
	    $client->close();
    }
    /**
     * @test
     * @expectedException \PAMI\Client\Exception\ClientException
     */
    public function cannot_send()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        	'fwrite error'
        );
        setFgetsMock($standardAMIStart, $write);
        $client = new \PAMI\Client\Impl\ClientImpl($options);
	    $client->open();
    }

    /**
     * @test
     * @expectedException \PAMI\Client\Exception\ClientException
     */
    public function cannot_login()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStartBadLogin;
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
        setFgetsMock($standardAMIStartBadLogin, $write);
        $client = new \PAMI\Client\Impl\ClientImpl($options);
	    $client->open();
    }
    /**
     * @test
     * @expectedException \PAMI\Client\Exception\ClientException
     */
    public function cannot_read()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
	    $client->open();
        setFgetsMock(array(false), $write);
        $client->send(new \PAMI\Message\Action\LoginAction('asd', 'asd'));
    }
    /**
     * @test
     * @expectedException \PAMI\Client\Exception\ClientException
     */
    public function cannot_read_by_read_timeout()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        	'read_timeout' => 1
        );
        $write = array(
        	"action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n"
        );
        setFgetsMock($standardAMIStart, $write);
        $client = new \PAMI\Client\Impl\ClientImpl($options);
	    $client->open();
        setFgetsMock(array(10, 4), $write);
        $start = \time();
        $client->send(new \PAMI\Message\Action\LoginAction('asd', 'asd'));
        $this->assertEquals(\time() - $start, 10);
    }
    /**
     * @test
     */
    public function can_get_response_with_associated_events()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        $event = array(
			'Response: Success',
			'ActionID: 1432.123',
			'Eventlist: start',
			'Message: Channels will follow',
			'',
			'Event: CoreShowChannelsComplete',
			'EventList: Complete',
			'ListItems: 0',
			'ActionID: 1432.123',
			''
        );
        $write = array(
        	"action: CoreShowChannels\r\nactionid: 1432.123\r\n"
        );
        setFgetsMock($event, $write);
	    $result = $client->send(new \PAMI\Message\Action\CoreShowChannelsAction);
	    $this->assertTrue($result instanceof \PAMI\Message\Response\ResponseMessage);
	    $events = $result->getEvents();
	    $this->assertEquals(count($events), 1);
	    $this->assertTrue($events[0] instanceof \PAMI\Message\Event\CoreShowChannelsCompleteEvent);
	    $this->assertEquals(
	        $events[0]->getRawContent(), implode("\r\n", array(
				'Event: CoreShowChannelsComplete',
				'EventList: Complete',
				'ListItems: 0',
				'ActionID: 1432.123',
		    ))
	    );
    }

    /**
     * @test
     */
    public function can_serialize_response_and_events()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        $event = array(
			'Response: Success',
			'ActionID: 1432.123',
			'Eventlist: start',
			'Message: Channels will follow',
			'',
			'Event: CoreShowChannelsComplete',
			'EventList: Complete',
			'ListItems: 0',
			'ActionID: 1432.123',
			''
        );
        $write = array(
        	"action: CoreShowChannels\r\nactionid: 1432.123\r\n"
        );
        setFgetsMock($event, $write);
	    $result = $client->send(new \PAMI\Message\Action\CoreShowChannelsAction);
        $ser = serialize($result);
        $result2 = unserialize($ser);
        $events = $result2->getEvents();
        $this->assertEquals($result2->getMessage(), 'Channels will follow');
        $this->assertEquals($events[0]->getName(), 'CoreShowChannelsComplete');
        $this->assertEquals($events[0]->getListItems(), 0);
    }

    /**
     * @test
     */
    public function can_get_response_events_without_actionid_and_event()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
        $mockTime = true;
        $mock_stream_socket_client = true;
        $mock_stream_set_blocking = true;
        $options = array(
        	'host' => '2.3.4.5',
            'scheme' => 'tcp://',
        	'port' => 9999,
        	'username' => 'asd',
        	'secret' => 'asd',
            'connect_timeout' => 1000,
        	'read_timeout' => 1000
        );
        $write = array(
        	"action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n"
        );
        setFgetsMock($standardAMIStart, $write);
        $client = new \PAMI\Client\Impl\ClientImpl($options);
        $client->registerEventListener(new SomeListenerClass);
	    $client->open();
        $event = array(
			'Response: Success',
			'ActionID: 1432.123',
			'Eventlist: start',
			'Message: Channels will follow',
			'',
            'Channel: pepe',
            'Count: Blah',
            '',
			'Event: CoreShowChannelsComplete',
			'EventList: Complete',
			'ListItems: 0',
			'ActionID: 1432.123',
			''
        );
        $write = array(
        	"action: CoreShowChannels\r\nactionid: 1432.123\r\n"
        );
        setFgetsMock($event, $write);
	    $result = $client->send(new \PAMI\Message\Action\CoreShowChannelsAction);
        $events = $result->getEvents();
        $this->assertEquals($events[0]->getName(), 'ResponseEvent');
        $this->assertEquals($events[0]->getKey('Channel'), 'pepe');
        $this->assertEquals($events[0]->getKey('Count'), 'Blah');
        $this->assertEquals($events[1]->getName(), 'CoreShowChannelsComplete');
        $this->assertEquals($events[1]->getListItems(), 0);
    }

    /**
     * @test
     */
    public function can_get_set_variable()
    {
        $now = time();
        $action = new \PAMI\Message\Action\LoginAction('a', 'b');
        $this->assertEquals($now, $action->getCreatedDate());
        $action->setVariable('variable', 'value');
        $this->assertEquals($action->getVariable('variable'), 'value');
        $this->assertNull($action->getVariable('variable2'));
    }

    /**
     * @test
     */
    public function can_get_set_variable_with_multiple_values()
    {
        global $mockTime;
        $mockTime = true;
        $now = time();
        $action = new \PAMI\Message\Action\LoginAction('a', 'b');
        $this->assertEquals($now, $action->getCreatedDate());
        $action->setVariable('variable', array('value1', 'value2'));
        $text
            = "action: Login\r\n"
            . "actionid: 1432.123\r\n"
            . "username: a\r\n"
            . "secret: b\r\n"
            . "Variable: variable=value1\r\n"
            . "Variable: variable=value2\r\n"
            . "\r\n"
        ;
        $this->assertEquals($text, $action->serialize());
    }

    /**
     * @test
     */
    public function can_report_unknown_event()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        $event = array(
        	'Event: MyOwnImaginaryEvent',
            'Privilege: system,all',
            'ChannelType: SIP',
        	''
        );
	    setFgetsMock($event, $event);
	    for($i = 0; $i < 4; $i++) {
	        $client->process();
	    }
        $this->assertTrue(SomeListenerClass::$event instanceof \PAMI\Message\Event\UnknownEvent);

    }

    /**
     * @test
     * @group channel_vars
     * ChanVariable is sent without a channel name and without a "channel"
     * key.
     * https://github.com/marcelog/PAMI/issues/85
     */
    public function can_get_channel_variables_without_default_channel_name()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        $event = array(
            'Event: Dial',
            'Privilege: call,all',
            'SubEvent: Begin',
            'Destination: SIP/jw1034-00000010',
            'CallerIDNum: 1201',
            'CallerIDName: <unknown>',
            'ConnectedLineNum: strategy-sequential',
            'ConnectedLineName: <unknown>',
            'UniqueID: pbx-1439974866.33',
            'DestUniqueID: pbx-1439974866.34',
            'Dialstring: jw1034',
            'ChanVariable: var1',
            'ChanVariable: var2=v2',
            ''
        );
        setFgetsMock($event, $event);
        for($i = 0; $i < 14; $i++) {
            $client->process();
        }
        $event = SomeListenerClass::$event;
        $varChan = array(
            'var1' => '',
            'var2' => 'v2'
        );
        $channelVars = array(
            'default' => $varChan
        );
        $this->assertEquals($channelVars, $event->getAllChannelVariables());
        $this->assertEquals($varChan, $event->getChannelVariables());
        $this->assertEquals($varChan, $event->getChannelVariables('default'));
    }


    /**
     * @test
     * @group channel_vars
     * ChanVariable is sent without a channel name but with a "channel" key.
     * https://github.com/marcelog/PAMI/issues/85
     */
    public function can_get_channel_variables_with_default_channel_name()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        $event = array(
            'Event: Dial',
            'Privilege: call,all',
            'Channel: Local/0@pbx_dial_callroute_to_endpoint-00000008;2',
            'SubEvent: Begin',
            'Destination: SIP/jw1034-00000010',
            'CallerIDNum: 1201',
            'CallerIDName: <unknown>',
            'ConnectedLineNum: strategy-sequential',
            'ConnectedLineName: <unknown>',
            'UniqueID: pbx-1439974866.33',
            'DestUniqueID: pbx-1439974866.34',
            'Dialstring: jw1034',
            'ChanVariable: var1',
            'ChanVariable: var2=v2',
            ''
        );
        setFgetsMock($event, $event);
        for($i = 0; $i < 15; $i++) {
            $client->process();
        }
        $event = SomeListenerClass::$event;
        $varChan = array(
            'var1' => '',
            'var2' => 'v2'
        );
        $channelVars = array(
            'local/0@pbx_dial_callroute_to_endpoint-00000008;2' => $varChan
        );
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
     * @test
     * @group channel_vars
     * ChanVariable is sent with a channel name and with a "channel" key.
     * https://github.com/marcelog/PAMI/issues/85
     */
    public function can_get_channel_variables()
    {
        global $mock_stream_socket_client;
        global $mock_stream_set_blocking;
        global $mockTime;
        global $standardAMIStart;
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
        $event = array(
            'Event: Dial',
            'Privilege: call,all',
            'SubEvent: Begin',
            'Channel: Local/0@pbx_dial_callroute_to_endpoint-00000008;2',
            'Destination: SIP/jw1034-00000010',
            'CallerIDNum: 1201',
            'CallerIDName: <unknown>',
            'ConnectedLineNum: strategy-sequential',
            'ConnectedLineName: <unknown>',
            'UniqueID: pbx-1439974866.33',
            'DestUniqueID: pbx-1439974866.34',
            'Dialstring: jw1034',
            'ChanVariable: var1',
            'ChanVariable: var2=value2',
            'ChanVariable(Local/0@pbx_dial_callroute_to_endpoint-00000008;2): var3=value3',
            'ChanVariable(Local/0@pbx_dial_callroute_to_endpoint-00000008;2): var4=value4',
            'ChanVariable(Local/0@pbx_dial_callroute_to_endpoint-00000008;2): var5=value5',
            'ChanVariable(SIP/jw1034-00000010): var12=value12',
            'ChanVariable(SIP/jw1034-00000010): var22=value22',
            'ChanVariable(SIP/jw1034-00000010): var32=value32',
            ''
        );
        setFgetsMock($event, $event);
        for($i = 0; $i < 21; $i++) {
            $client->process();
        }
        $event = SomeListenerClass::$event;
        $varChan1 = array(
            'var1' => '',
            'var2' => 'value2',
            'var3' => 'value3',
            'var4' => 'value4',
            'var5' => 'value5'
        );
        $varChan2 = array(
            'var12' => 'value12',
            'var22' => 'value22',
            'var32' => 'value32'
        );
        $channelVars = array(
            'local/0@pbx_dial_callroute_to_endpoint-00000008;2' => $varChan1,
            'sip/jw1034-00000010' => $varChan2
        );
        $this->assertEquals($varChan1, $event->getChannelVariables());
        $this->assertEquals($channelVars, $event->getAllChannelVariables());
    }
}
class SomeListenerClass implements \PAMI\Listener\IEventListener
{
    public static $event;

    public function handle(\PAMI\Message\Event\EventMessage $event)
    {
        self::$event = $event;
    }
}
}
