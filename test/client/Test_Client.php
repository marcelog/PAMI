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
    function stream_socket_client() {
        global $mock_stream_socket_client;
        if (isset($mock_stream_socket_client) && $mock_stream_socket_client === true) {
        } else {
            return call_user_func_array('\stream_socket_client', func_get_args());
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
                    	'Mocked: ' . print_r($mockFwriteReturn[$mockFwriteCount], true) . ' is '
                    	. ' different from: ' . print_r($args[1], true)
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
        $this->_properties = array(
            'log4php.properties' => RESOURCES_DIR . DIRECTORY_SEPARATOR . 'log4php.properties'
        );
    }

    /**
     * @test
     */
    public function can_get_client()
    {
        $options = array(
            'log4php.properties' => RESOURCES_DIR . DIRECTORY_SEPARATOR . 'log4php.properties',
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
            'log4php.properties' => RESOURCES_DIR . DIRECTORY_SEPARATOR . 'log4php.properties',
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
        $end = time();
        $this->assertEquals($end - $start, 3);
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
            'log4php.properties' => RESOURCES_DIR . DIRECTORY_SEPARATOR . 'log4php.properties',
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
        $this->assertTrue(SomeListenerClass::$event instanceof \PAMI\Message\Event\PeerStatusEvent);
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
            'log4php.properties' => RESOURCES_DIR . DIRECTORY_SEPARATOR . 'log4php.properties',
        	'host' => '2.3.4.5',
            'scheme' => 'tcp://',
        	'port' => 9999,
        	'username' => 'asd',
        	'secret' => 'asd',
            'connect_timeout' => 10,
        	'read_timeout' => 3
        );
        $write = array(
        	"action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n"
        );
        setFgetsMock($standardAMIStart, $write);
        $client = new \PAMI\Client\Impl\ClientImpl($options);
	    $client->open();
        setFgetsMock(array(10, 1), $write);
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