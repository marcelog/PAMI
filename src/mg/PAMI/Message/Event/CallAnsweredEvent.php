<?php
/**
 * Event triggered when the 'SCCP Call Answered' Event arrives.
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
 * Event triggered when the 'SCCP Call Answered' Event arrives.
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
class CallAnsweredEvent extends EventMessage
{
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
	 * Returns key: 'SCCPLine'.
	 *
	 * @return string
	 */
	public function getSCCPLine()
	{
      return $this->getKey('SCCPLine');
	}

	/**
	 * Returns key: 'SCCPDevice'.
	 *
	 * @return string
	 */
	public function getSCCPDevice()
	{
      return $this->getKey('SCCPDevice');
	}

	/**
	 * Returns key: 'Uniqueid'.
	 *
	 * @return string
	 */
	public function getUniqueid()
	{
      return $this->getKey('Uniqueid');
	}

	/**
	 * Returns key: 'CallingPartyNumber'.
	 *
	 * @return string
	 */
	public function getCallingPartyNumber()
	{
      return $this->getKey('CallingPartyNumber');
	}

	/**
	 * Returns key: 'CallingPartyName'.
	 *
	 * @return string
	 */
	public function getCallingPartyName()
	{
      return $this->getKey('CallingPartyName');
	}

	/**
	 * Returns key: 'originalCallingParty'.
	 *
	 * @return string
	 */
	public function getoriginalCallingParty()
	{
      return $this->getKey('originalCallingParty');
	}

	/**
	 * Returns key: 'lastRedirectingParty'.
	 *
	 * @return string
	 */
	public function getlastRedirectingParty()
	{
      return $this->getKey('lastRedirectingParty');
	}

}
