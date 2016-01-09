<?php
/**
 * PAMI basic SMS usage.
 * This script will send a message and listen for any incoming message. Multipart message is
 * supported (receiving a multiparte msg will trigger 2 separate msgs instead of concatenate
 * them correctly :P )
 *
 * PHP Version 5
 *
 * @category Pami
 * @author   Matías Barletta <mrb@lionix.com>
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
if ($argc <7 ) {
    echo "Use: $argv[0] <host> <port> <user> <pass> <msg> <phone> [test_multipart <1|0> ] ";
    echo "example: example_sms.php 192.168.1.20 5038 smsuser smspass 'PAMI is great!' +17865394747 1
" ;
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
use PAMI\Message\Event\VgsmSmsRxEvent;
use PAMI\Message\Action\VGSMSMSTxAction;

class A implements IEventListener
{
    public function handle(EventMessage $event)
    {
        //This Handler will print the incoming message.
        echo "Message Received from :". $event->getFrom()." \n";
        if ($event->getContentEncoding()=='base64'){

            echo base64_decode($event->getContent());
            }
        else{
            echo 'Unrecognized encoding - printing message in this encoding :  ' ;
            $event->getContentEncoding();
            echo '\n Message:  ' ;
            $event->getContent();
            }



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

        'connect_timeout' => 60,
        'read_timeout' => 60
    );
    $a = new ClientImpl($options);
    $a->registerEventListener(new A());
    $a->open();

    // SMS
    $sms = new VGSMSMSTxAction();

    $sms->setContentType('text/plain; charset=ASCII');
    $msg=$argv[5];
    $phone=$argv[6];
    $sms->setContent($msg);
    $sms->setTo($phone);
    // SMS multipart MSG - This is used to send 1 big message splitted in several parts, up to 255 messages
    if($argv[7]==1){
        $sms->setConcatRefId('58');
        $sms->setConcatTotalMsg('2');
        $sms->setConcatSeqNum('1');
        $a->send($sms);
        $sms->setContent('---Testing Multipart message ');
        $sms->setTo($phone);
        $sms->setConcatRefId('58');
        $sms->setConcatTotalMsg('2');
        $sms->setConcatSeqNum('2');
    }
    $a->send($sms);

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
