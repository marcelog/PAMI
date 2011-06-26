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
class Test_Actions extends \PHPUnit_Framework_TestCase
{
    private $_properties = array();

    public function setUp()
    {
        $this->_properties = array(
            'log4php.properties' => RESOURCES_DIR . DIRECTORY_SEPARATOR . 'log4php.properties'
        );
    }

    private function _start()
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
        return $client;
    }
    /**
     * @test
     */
    public function can_absolute_timeout()
    {
        $client = $this->_start();
        $event = array(
            'Response: Success',
            'ActionID: 1432.123',
            'Message: Timeout Set',
        	''
        );
        $write = array(
        	"action: AbsoluteTimeout\r\nactionid: 1432.123\r\nchannel: SIP/asd\r\ntimeout: 10\r\n"
        );
        setFgetsMock($event, $write);
	    $result = $client->send(new \PAMI\Message\Action\AbsoluteTimeoutAction('SIP/asd', 10));
	    $this->assertTrue($result instanceof \PAMI\Message\Response\ResponseMessage);
    }
    /**
     * @test
     */
    public function can_agent_logoff()
    {
        $client = $this->_start();
        $event = array(
            'Response: Success',
            'ActionID: 1432.123',
        	''
        );
        $write = array(implode("\r\n", array(
        	'action: AgentLogoff',
            'actionid: 1432.123',
            'agent: asd',
            'soft: true',
            ''
        )));
        setFgetsMock($event, $write);
	    $result = $client->send(new \PAMI\Message\Action\AgentLogoffAction('asd', true));
	    $this->assertTrue($result instanceof \PAMI\Message\Response\ResponseMessage);
    }
}
}