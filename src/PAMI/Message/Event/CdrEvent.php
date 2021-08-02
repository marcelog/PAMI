<?php
/**
 * Event triggered when a channel updated its status.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Nattapong Mongkolnavin <nattapong@octagon.co.th>
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
namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * Event triggered when a channel updated its status.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class CdrEvent extends EventMessage
{
    /**
     * Returns key: 'Privilege'.
     *
     * @return string
     */
    public function getPrivilege()
    {
        return $this->getKey('Privilege');
    }

    /**
     * Return key: 'AccountCode'.
     * 
     * @return string
     */
    public function getAccount()
    {
        return $this->getKey('AccountCode');
    }

    /**
     * Return key: 'Source'.
     * 
     * @return string
     */
    public function getSource()
    {
        return $this->getKey('Source');
    }

    /**
     * Returns key: 'Destination'.
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->getKey('Destination');
    }

    /**
     * Returns key: 'DestinationContext'.
     *
     * @return string
     */
    public function getDestinationContext()
    {
        return $this->getKey('DestinationContext');
    }

    /**
     * Returns key: 'CallerID'.
     *
     * @return string
     */
    public function getCallerID()
    {
        return $this->getKey('CallerID');
    }

    /**
     * Returns key: 'Channel'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }

    /**
     * Returns key: 'DestinationChannel'.
     *
     * @return string
     */
    public function getDestinationChannel()
    {
        return $this->getKey('DestinationChannel');
    }

    /**
     * Returns key: 'LastApplication'.
     *
     * @return string
     */
    public function getLastApplication()
    {
        return $this->getKey('LastApplication');
    }

    /**
     * Returns key: 'LastData'.
     *
     * @return string
     */
    public function getLastData()
    {
        return $this->getKey('LastData');
    }

    /**
     * Returns key: 'StartTime'.
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->getKey('StartTime');
    }

    /**
     * Returns key: 'AnswerTime'.
     *
     * @return string
     */
    public function getAnswerTime()
    {
        return $this->getKey('AnswerTime');
    }

    /**
     * Returns key: 'EndTime'.
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->getKey('EndTime');
    }

    /**
     * Returns key: 'Duration'.
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->getKey('Duration');
    }

    /**
     * Returns key: 'BillableSeconds'.
     *
     * @return string
     */
    public function getBillableSeconds()
    {
        return $this->getKey('BillableSeconds');
    }
    /**
     * Returns key: 'Disposition'.
     *
     * @return string
     */
    public function getDisposition()
    {
        return $this->getKey('Disposition');
    }

    /**
     * Returns key: 'AMAFlags'.
     *
     * @return string
     */
    public function getAMAFlags()
    {
        return $this->getKey('AMAFlags');
    }


    /**
     * Returns key: 'UniqueID'.
     *
     * @return string
     */
    public function getUniqueID()
    {
        return $this->getKey('UniqueID');
    }

    /**
     * Returns key: 'UserField'.
     *
     * @return string
     */
    public function getUserField()
    {
        return $this->getKey('UserField');
    }

}
