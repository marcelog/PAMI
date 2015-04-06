<?php
/**
 * SCCPMessageDevice action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2015 Diederik de Groot ddegroot@users.sf.net>, Marcelo Gornstein <marcelog@gmail.com>
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
namespace PAMI\Message\Action;

/**
 * Hangup action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class SCCPMessageDeviceAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $DeviceName DeviceName
     * @param string $MessageText Text to Send
     * @param boolean $Beep optional
     * @param integer $TImeout optional
     *
     * @return void
     */
    public function __construct($DeviceName, $MessageText, $Beep=false, $Timeout=false)
    {
        parent::__construct('SCCPMessageDevice');

        $this->setKey('DeviceId', $DeviceName);
        $this->setKey('MessageText', $MessageText);

        if ($Beep != false) {
	        $this->setKey('Beep', 'beep');
        }

        if ($Timeout != false) {
        	$this->setKey('Timeout', intval($Timeout));
        }
    }
}
