<?php
/**
 * SCCPHoldCall action message.
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

use PAMI\Exception\PAMIException;

/**
 * Hold/Resume SCCP Sevice action message.
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
class SCCPHoldCallAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $CHannelId ChannelId
     * @param boolean $Hold Hold or Resume
     * @param string $DeviceName Required for SharedLine
     * @param boolean $SwapChannels If we are resuming and have an active channel, should it be put on hold
     *
     * @return void
     */
    public function __construct($ChannelId, $DeviceName, $Hold = true, $SwapChannels = false)
    {
        parent::__construct('SCCPHoldCall');
        
        $this->setKey('ChannelId', $ChannelId);
        $this->setKey('DeviceName', $DeviceName);
        if ($Hold == true) {
            $this->setKey('Hold', 'on');
            if ($SwapChannels == true) {
    	        throw new PAMIException('Cannot SwapChannels when putting on hold.');
            }
            $this->setKey('SwapChannels', 'off');
        } else {
            $this->setKey('Hold', 'off');
            if ($SwapChannels == true) {
                $this->setKey('SwapChannels', 'on');
            } else {
                $this->setKey('SwapChannels', 'off');
            }
        }
    }
}
