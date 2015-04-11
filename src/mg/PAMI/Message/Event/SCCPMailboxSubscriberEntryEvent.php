<?php
/**
 * Event triggered when SCCPMailboxSubscriberEntry arrives.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2015 Diederik de Groot <ddegroot@users.sf.net>, Marcelo Gornstein <marcelog@gmail.com>
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
 * Event triggered when SCCPMailboxSubscriberEntry arrives.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class SCCPMailboxSubscriberEntryEvent extends EventMessage
{
	/**
	 * Returns key: 'ChannelType'.
	 *
	 * @return string
	 */
	public function getChannelType()
	{
      return $this->getKey('ChannelType');
	}

	/**
	 * Returns key: 'ChannelObjectType'.
	 *
	 * @return string
	 */
	public function getChannelObjectType()
	{
      return $this->getKey('ChannelObjectType');
	}

	/**
	 * Returns key: 'Mailbox'.
	 *
	 * @return string
	 */
	public function getMailbox()
	{
      return $this->getKey('Mailbox');
	}

	/**
	 * Returns key: 'LineName'.
	 *
	 * @return string
	 */
	public function getLineName()
	{
      return $this->getKey('LineName');
	}

	/**
	 * Returns key: 'Context'.
	 *
	 * @return string
	 */
	public function getContext()
	{
      return $this->getKey('Context');
	}

	/**
	 * Returns key: 'New'.
	 *
	 * @return integer
	 */
	public function getNew()
	{
      return intval($this->getKey('New'));
	}

	/**
	 * Returns key: 'Old'.
	 *
	 * @return integer
	 */
	public function getOld()
	{
      return intval($this->getKey('Old'));
	}

	/**
	 * Returns key: 'Sub'.
	 *
	 * @return boolean
	 */
	public function getSub()
	{
      return $this->getBoolKey('Sub');
	}

}
