<?php
/**
 * Event triggered when the 'SCCP Conference Participant Mute' Event arrives.
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
 * Event triggered when the 'SCCP Conference Participant Mute' Event arrives.
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
class SCCPConfParticipantMuteEvent extends EventMessage
{
	/**
	 * Returns key: 'ConfId'.
	 *
	 * @return integer
	 */
	public function getConfId()
	{
      return intval($this->getKey('ConfId'));
	}

	/**
	 * Returns key: 'PartId'.
	 *
	 * @return integer
	 */
	public function getPartId()
	{
      return intval($this->getKey('PartId'));
	}

	/**
	 * Returns key: 'Mute'.
	 *
	 * @return string
	 */
	public function getMute()
	{
      return $this->getKey('Mute');
	}

}
