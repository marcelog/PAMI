<?php
/**
 * SCCPConference action message.
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

use \PAMI\Exception\PAMIException;
/**
 * SCCP Conference Control Action
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
class SCCPConferenceAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $ConferenceId Conference Id
     * @param string $ParticipantId Participant Id
     * @param string $Command Command, one of ['endconf', 'kick', 'mute', 'invite', 'moderate']
     *
     * @return void
     */
    public function __construct($ConferenceId, $ParticipantId, $Command)
    {
        parent::__construct('SCCPConference');
        $this->setKey('ConferenceId', $ConferenceId);
        $this->setKey('ParticipantId', $ParticipantId);
        if (in_array(strtolower($Command), array('endconf', 'kick', 'mute', 'invite', 'moderate'))) {
	        $this->setKey('Command', strtolower($Command));
		} else {
			throw new PAMIException('State has to be one of \'endconf\', \'kick\', \'mute\', \'invite\', \'moderate\'.');
		}
    }
}
