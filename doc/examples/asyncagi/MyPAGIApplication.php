<?php
/**
 * PAGI basic use example. Please see run.sh in this same directory for an
 * example of how to actually run this from your dialplan.
 *
 * Note: The client accepts an array with options. The available options are
 *
 * log4php.properties => Optional. If set, should contain the absolute
 * path to the log4php.properties file.
 *
 * stdin => Optional. If set, should contain an already open stream from
 * where the client will read data (useful to make it interact with fastagi
 * servers or even text files to mock stuff when testing). If not set, stdin
 * will be used by the client.
 *
 * stdout => Optional. Same as stdin but for the output of the client.
 *
 *
 * PHP Version 5
 *
 * @category   Pagi
 * @package    examples
 * @subpackage quickstart
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
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
use PAGI\Application\PAGIApplication;
use PAGI\Client\ChannelStatus;
use PAGI\CallSpool\CallFile;
use PAGI\CallSpool\Impl\CallSpoolImpl;
declare(ticks=1);
/**
 * PAGI basic use example. Please see run.sh in this same directory for an
 * example of how to actually run this from your dialplan.
 *
 * Note: The client accepts an array with options. The available options are
 *
 * log4php.properties => Optional. If set, should contain the absolute
 * path to the log4php.properties file.
 *
 * stdin => Optional. If set, should contain an already open stream from
 * where the client will read data (useful to make it interact with fastagi
 * servers or even text files to mock stuff when testing). If not set, stdin
 * will be used by the client.
 *
 * stdout => Optional. Same as stdin but for the output of the client.
 *
 * PHP Version 5
 *
 * @category   Pagi
 * @package    examples
 * @subpackage quickstart
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class MyPAGIApplication extends PAGIApplication
{
    /**
     * (non-PHPdoc)
     * @see PAGI\Application.PAGIApplication::init()
     */
    public function init()
    {
        $this->log('Init');
        $client = $this->getAgi();
        $client->answer();
    }
    /**
     * Logs to asterisk console.
     *
     * @param string $msg Message to log.
     *
     * @return void
     */
    public function log($msg)
    {
        $agi = $this->getAgi();
        if ($this->logger->isDebugEnabled()) {
            $this->logger->debug($msg);
        }
        $agi->consoleLog($msg);
    }

    /**
     * (non-PHPdoc)
     * @see PAGI\Application.PAGIApplication::shutdown()
     */
    public function shutdown()
    {
        try
        {
            $this->log('Shutdown');
            $client = $this->getAgi();
            $client->hangup();
        } catch(\Exception $e) {

        }
    }

    /**
     * (non-PHPdoc)
     * @see PAGI\Application.PAGIApplication::run()
     */
    public function run()
    {
        $this->log('Run');
        $client = $this->getAgi();
        $loggerFacade = $client->getAsteriskLogger();
        $loggerFacade->notice('hello notice');
        $loggerFacade->warn('hello warn');
        $loggerFacade->debug('hello debug');
        $loggerFacade->error('hello error');
        $loggerFacade->dtmf('hello dtmf');
        //$this->log($client->faxReceive('/tmp/a.tiff')->__toString());
        //$this->log($client->faxSend('/tmp/a.tiff')->__toString());
        $variables = $client->getChannelVariables();
        $this->log('Config dir: ' . $variables->getDirectoryConfig());
        $this->log('Config file: ' . $variables->getConfigFile());
        $this->log('Module dir: ' . $variables->getDirectoryModules());
        $this->log('Spool dir: ' . $variables->getDirectorySpool());
        $this->log('Monitor dir: ' . $variables->getDirectoryMonitor());
        $this->log('Var dir: ' . $variables->getDirectoryVar());
        $this->log('Data dir: ' . $variables->getDirectoryData());
        $this->log('Log dir: ' . $variables->getDirectoryLog());
        $this->log('Agi dir: ' . $variables->getDirectoryAgi());
        $this->log('Key dir: ' . $variables->getDirectoryKey());
        $this->log('Run dir: ' . $variables->getDirectoryRun());
        $this->log('Request: '. $variables->getRequest());
        $this->log('Channel: '. $variables->getChannel());
        $this->log('Language: '. $variables->getLanguage());
        $this->log('Type: '. $variables->getType());
        $this->log('UniqueId: ' . $variables->getUniqueId());
        $this->log('Version: ' . $variables->getVersion());
        $this->log('CallerId: ' . $variables->getCallerId());
        $this->log('CallerId name: ' . $variables->getCallerIdName());
        $this->log('CallerId pres: ' . $variables->getCallingPres());
        $this->log('CallingAni2: ' . $variables->getCallingAni2());
        $this->log('CallingTon: ' . $variables->getCallingTon());
        $this->log('CallingTNS: ' . $variables->getCallingTns());
        $this->log('DNID: ' . $variables->getDNID());
        $this->log('RDNIS: ' . $variables->getRDNIS());
        $this->log('Context: ' . $variables->getContext());
        $this->log('Extension: ' . $variables->getDNIS());
        $this->log('Priority: ' . $variables->getPriority());
        $this->log('Enhanced: ' . $variables->getEnhanced());
        $this->log('AccountCode: ' . $variables->getAccountCode());
        $this->log('ThreadId: ' . $variables->getThreadId());
        $this->log('Arguments: ' . intval($variables->getTotalArguments()));
        for ($i = 0; $i < $variables->getTotalArguments(); $i++) {
            $this->log(' -- Argument ' . intval($i) . ': ' . $variables->getArgument($i));
        }

        $result = $client->sayDigits('12345', '12#');
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for say digits.');
        }

        $result = $client->sayNumber('12345', '12#');
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for say number.');
        }

        $result = $client->getData('/var/lib/asterisk/sounds/welcome', 10000, 4);
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for get data with: ' . $result->getDigits());
        }

        $result = $client->getOption('/var/lib/asterisk/sounds/welcome', '0123456789*#', 10000);
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for get option.');
        }

        $result = $client->streamFile('/var/lib/asterisk/sounds/welcome', '#');
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for stream file.');
        }

        $this->log('Channel status: ' . ChannelStatus::toString($client->channelStatus()));
        $this->log('Channel status: ' . ChannelStatus::toString($client->channelStatus($variables->getChannel())));
        $this->log('Variable: ' . $client->getVariable('EXTEN'));
        $this->log('FullVariable: ' . $client->getFullVariable('EXTEN'));
        $cdr = $client->getCDR();
        $this->log('CDRVariable: ' . $cdr->getSource());
        $cdr->setAccountCode('foo');
        $this->log('CDRVariable: ' . $cdr->getAccountCode());

        $callerId = $client->getCallerId();
        $this->log('CallerID: ' . $callerId);
        $callerId->setName('pepe');
        $this->log('CallerID: ' . $callerId);
        $client->setCallerId('foo', '123123');
        $this->log('CallerID: ' . $callerId);

        //$this->log($client->exec('Dial', array('SIP/sip', 30, 'r')));
        $this->log($client->dial('SIP/01', array(30, 'r')));

        $result = $client->sayPhonetic('marcelog', '123#');
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for say phonetic.');
        }

        $result = $client->sayAlpha('marcelog', '123#');
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for say alpha.');
        }

        $result = $client->sayTime(time(), '123#');
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for say time.');
        }

        $result = $client->sayDateTime(time(), 'mdYHMS', '123#');
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for say datetime.');
        }

        $result = $client->sayDate(time(), '123#');
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for say date.');
        }

        $client->setPriority(1000);
        $client->setExtension(1000);
        $client->setContext('foo');
        $client->setMusic(true);
        sleep(10);
        $client->setMusic(false);

        $result = $client->waitDigit(10000);
        if (!$result->isTimeout()) {
            $this->log('Read: ' . $result->getDigits());
        } else {
            $this->log('Timeouted for waitdigit.');
        }
        $result = $client->record('/tmp/asd', 'wav', '#');
        if ($result->isInterrupted()) {
            if ($result->isHangup()) {
                $this->log('hangup when recording.');
            } else {
                $this->log('interrupted with: ' . $result->getDigits());
            }
            $this->log('Recorded: ' . $result->getEndPos());
        }
        //$this->log($client->databaseGet('SIP', 'Registry'));
        //$client->setAutoHangup(10);
        //sleep(20);
    }

    /**
     * (non-PHPdoc)
     * @see PAGI\Application.PAGIApplication::errorHandler()
     */
    public function errorHandler($type, $message, $file, $line)
    {
        $this->log(
        	'ErrorHandler: '
            . implode(' ', array($type, $message, $file, $line))
        );
    }

    /**
     * (non-PHPdoc)
     * @see PAGI\Application.PAGIApplication::signalHandler()
     */
    public function signalHandler($signal)
    {
        $this->log('SignalHandler got signal: ' . $signal);
        $this->shutdown();
        exit(0);
    }
}
