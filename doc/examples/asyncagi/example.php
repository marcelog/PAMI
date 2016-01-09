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

require(implode(DIRECTORY_SEPARATOR, array(
    __DIR__,
    '..',
    '..',
    '..',
    'vendor',
    'autoload.php'
)));

date_default_timezone_set('America/Buenos_Aires');
////////////////////////////////////////////////////////////////////////////////
// Mandatory stuff to bootstrap.
////////////////////////////////////////////////////////////////////////////////
use PAMI\Client\Impl\ClientImpl;
use PAMI\Listener\IEventListener;
use PAMI\Message\Event\EventMessage;
use PAMI\Message\Action\AGIAction;
use PAMI\Message\Event\NewextenEvent;
use PAGI\Application\PAGIApplication;
use PAGI\Client\AbstractClient;

require_once __DIR__ . '/MyPAGIApplication.php';

class ListenerTest implements IEventListener
{
    private $_client;
    private $_id;
    private $_pamiOptions;

    public function handle(EventMessage $event)
    {
        if ($event instanceof \PAMI\Message\Event\AsyncAGIEvent) {
            if ($event->getSubEvent() == 'Start') {
                switch($pid = pcntl_fork())
                {
                    case 0:
                        $logger = \Logger::getLogger(__CLASS__);
                        $this->_client = new ClientImpl($this->_pamiOptions);
                        $this->_client->open();
                        $agi = new \PAMI\AsyncAgi\AsyncClientImpl(array(
                            'pamiClient' => $this->_client,
                            'asyncAgiEvent' => $event
                        ));
                        $app = new MyPAGIApplication(array(
                            'pagiClient' => $agi
                        ));
                        $app->init();
                        $app->run();
                        //$agi->indicateProgress();
                        //$agi->answer();
                        //$agi->streamFile('welcome');
                        //$agi->playCustomTones(array("425/50","0/50"));
                        //sleep(5);
                        //$agi->indicateCongestion(10);
                        //$agi->hangup();
                        $this->_client->close();
                        echo "Application finished\n";
                        exit(0);
                        break;
                    case -1:
                        echo "Could not fork application\n";
                        break;
                    default:
                        echo "Forked Application\n";
                        break;
                }
            }
        }
    }
    public function run()
    {
        $this->_client->open();
    	while(true)
    	{
    	    usleep(1000);
    	    $this->_client->process();
            pcntl_wait($status);
    	}
    	$this->_client->close();
    }
    public function __construct(array $pamiOptions)
    {
        $this->_pamiOptions = $pamiOptions;
        $this->_client = new ClientImpl($pamiOptions);
        $this->_id = $this->_client->registerEventListener($this);
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
        'log4php.properties' => realpath(__DIR__) . DIRECTORY_SEPARATOR . 'log4php.properties',
        'host' => $argv[1],
        'port' => $argv[2],
        'username' => $argv[3],
        'secret' => $argv[4],
        'connect_timeout' => $argv[5],
        'read_timeout' => $argv[6],
        'scheme' => 'tcp://' // try tls://
    );
	$listener = new ListenerTest($options);
	$listener->run();
} catch (Exception $e) {
	echo $e->getMessage() . "\n";
}
////////////////////////////////////////////////////////////////////////////////
// Code ENDS.
////////////////////////////////////////////////////////////////////////////////
