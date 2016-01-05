<?php
/**
 * QueueAdd action message.
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
 * QueueAdd action message.
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
class QueueAddAction extends ActionMessage
{
    /**
     * Sets state interface ... ? Key: 'StateInterface'.
     *
     * @param string $stateInterface State interface ... ?
     *
     * @return void
     */
    public function setStateInterface($stateInterface)
    {
        $this->setKey('StateInterface', $stateInterface);
    }

    /**
     * Sets penalty. Key: 'Penalty'.
     *
     * @param string $penalty Penalty .. ?
     *
     * @return void
     */
    public function setPenalty($penalty)
    {
        $this->setKey('Penalty', $penalty);
    }

    /**
     * Sets member name. Key: 'MemberName'.
     *
     * @param string $memberName Member name ?
     *
     * @return void
     */
    public function setMemberName($memberName)
    {
        $this->setKey('MemberName', $memberName);
    }


    /**
     * Sets paused. Key: 'Paused'.
     *
     * @param string $paused Paused .. ?
     *
     * @return void
     */
    public function setPaused($paused)
    {
        $this->setKey('Paused', $paused);
    }

    /**
     * Constructor.
     *
     * @param string $queue     Queue name
     * @param string $interface Interface ... ?
     *
     * @return void
     */
    public function __construct($queue, $interface)
    {
        parent::__construct('QueueAdd');
        $this->setKey('Interface', $interface);
        $this->setKey('Queue', $queue);
    }
}