<?php
declare(ticks=1);
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

// Setup include path.
ini_set(
    'include_path',
    implode(
        PATH_SEPARATOR,
        array(
            implode(DIRECTORY_SEPARATOR, array('..', '..', '..', 'src', 'mg')),
            '../../../vendor/php/log4php', '../../../vendor/php',
            ini_get('include_path'),
        )
    )
);

////////////////////////////////////////////////////////////////////////////////
// Mandatory stuff to bootstrap.
////////////////////////////////////////////////////////////////////////////////
require_once 'PAMI/Autoloader/Autoloader.php'; // Include PAMI autoloader.
\PAMI\Autoloader\Autoloader::register(); // Call autoloader register for PAMI autoloader.
use PAMI\Client\Impl\ClientImpl;
use PAMI\Listener\IEventListener;
use PAMI\Message\Event\EventMessage;
use PAMI\Message\Action\GetConfigJSONAction;
use PAMI\Message\Action\ListCommandsAction;
use PAMI\Message\Action\SCCPShowDevicesAction;
use PAMI\Message\Action\SCCPShowGlobalsAction;
use PAMI\Message\Action\SCCPShowLinesAction;
use PAMI\Message\Action\SCCPShowDeviceAction;
use PAMI\Message\Action\SCCPShowLineAction;
use PAMI\Message\Action\SCCPShowChannelsAction;
use PAMI\Message\Action\SCCPShowSessionsAction;
use PAMI\Message\Action\SCCPConfigMetaDataAction;
use PAMI\Message\Event\SuccessfulAuthEvent;
use PAMI\Message\Event\SCCPGlobalSettingsEvent;
use PAMI\Message\Event\TableStart;
use PAMI\Message\Event\TableEnd;
use PAMI\Message\Event\SCCPLineEntryEvent;
use PAMI\Message\Event\SCCPShowDeviceEvent;
use PAMI\Message\Event\SCCPDeviceEntryEvent;
use PAMI\Message\Event\SCCPDeviceButtonEntryEvent;
use PAMI\Message\Event\SCCPDeviceFeatureEntryEvent;
use PAMI\Message\Event\SCCPDeviceSpeeddialEntryEvent;
use PAMI\Message\Event\SCCPDeviceLineEntryEvent;
use PAMI\Message\Event\SCCPShowLinesCompleteEvent;
use PAMI\Message\Event\SCCPShowLineCompleteEvent;
use PAMI\Message\Event\SCCPShowGlobalsCompleteEvent;
use PAMI\Message\Event\SCCPShowDevicesCompleteEvent;
use PAMI\Message\Event\SCCPShowDeviceCompleteEvent;
use PAMI\Message\Event\SCCPShowChannelsCompleteEvent;
use PAMI\Message\Event\SCCPShowSessionsCompleteEvent;
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
		'log4php.properties' => realpath(__DIR__) . DIRECTORY_SEPARATOR . 'log4php.properties',
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
	//$a->registerEventListener(function ($event) {
	//
	//});

	// Register a specific method of an object for event listening
	//$a->registerEventListener(array($listener, 'handle'));
	// Register an IEventListener:

	$a->registerEventListener(new A());
	$a->open();

/*
	var_dump($a->send(new ListCommandsAction()));
	var_dump($a->send(new GetConfigJSONAction("sip.conf")));

	$response = $a->send(new GetConfigJSONAction("sip.conf"));
	var_dump($response->getJSON());

	$response = $a->send(new SCCPConfigMetaDataAction());
	print_r($response->getJSON());

	$response = $a->send(new SCCPConfigMetaDataAction("general"));
	print_r($response->getJSON());
*/

/*	$response = $a->send(new SCCPConfigMetaDataAction("device"));
	print_r($response->getJSON());
*/	
//	var_dump($a->send(new SCCPShowGlobalsAction()));
/*	$response = $a->send(new SCCPShowGlobalsAction());
	if ($response->isSuccess()) {
		print "op\n";
		print "KeepAlive: " . $response->getKey("KeepAlive") . "\n";
		print "ConfigFile: " . $response->getKey("ConfigFile") . "\n";
		print "CodecsPreference: ";
		print_r ($response->getKey("CodecsPreference"));
		print "\n";
		if ($response->isList()) {
			print "ok\n";
			$events = $response->getEvents();
			foreach ($events as $event) {
				if ($event->getName() == "SCCPGlobalSettings") {
					print "KeepAlive: " . $event->getKeepAlive() . "\n";
					print "ConfigFile: " . $event->getConfigFile() . "\n";
					print "CodecsPreference: ";
					print_r ($event->getCodecsPreference());
					print "\n";
				}
			}
		}
		//print_r($response->getJSON());
	}
*/
//	var_dump($a->send(new SCCPShowDevicesAction()));
/*
	$response = $a->send(new SCCPShowDevicesAction());
	if ($response->isList()) {
		$events = $response->getEvents();
		foreach ($events as $event) {
			if ($event->getName() == "SCCPDeviceEntry") {
				print_r ($event);
			}
		} 
	}
*/
//	var_dump($a->send(new SCCPShowLinesAction()));
/*
	$response = $a->send(new SCCPShowLinesAction());
	if ($response->isList()) {
		$events = $response->getEvents();
		foreach ($events as $event) {
			if ($event->getName() == "SCCPLineEntry") {
				print_r ($event);
			}
		} 
	}
*/
	//var_dump($a->send(new SCCPShowDeviceAction("SEP0023043403F9")));
	$response = $a->send(new SCCPShowDeviceAction("SEP0023043403F9"));
	if ($response->isList()) {
		$events = $response->getEvents(); 
		print ("DeviceName" . $response->getDeviceName() . "\n");
		print ("\nDenyPermit:\n");
		print_r ($response->getDenyPermit());
		print ("\nCaps:\n");
		print_r ($response->getCapabilities());
		print ("\nPrefs:\n");
		print_r ($response->getCodecsPreference());
	}
	$tableNames = $response->getTableNames();
	foreach ($tableNames as $tableName) {
		print "Table: $tableName\n";
		$method = 'get' . $tableName;
		$table = $response->$method();
		foreach ($table as $entry) {
			print_r ($entry);
		} 
	}
//	var_dump($a->send(new SCCPShowLineAction("98011")));
//	var_dump($a->send(new SCCPShowChannelsAction()));
//	var_dump($a->send(new SCCPShowSessionsAction()));

    $time = time();
    while(( time() - $time) < $argv[5]) // Wait for events.
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
