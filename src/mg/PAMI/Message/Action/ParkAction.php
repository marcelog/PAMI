<?php
/**
 * Park action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
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
namespace PAMI\Message\Action;

/**
 * Park action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class ParkAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $channel1 Channel name to park.
     * @param string  $channel2 Channel to announce park info to (and return to if timeout).
     * @param integer $timeout  Number of milliseconds to wait before callback.
     * @param string  $lot      Parking lot to park channel in.
     *
     * @return void
     */
    public function __construct($channel1, $channel2, $timeout = false, $lot = false)
    {
        parent::__construct('Park');
        $this->setKey('Channel', $channel1);
        $this->setKey('Channel2', $channel2);
        if ($timeout != false) {
            $this->setKey('Timeout', $timeout);
        }
        if ($lot != false) {
            $this->setKey('Parkinglot', $lot);
        }
    }
}