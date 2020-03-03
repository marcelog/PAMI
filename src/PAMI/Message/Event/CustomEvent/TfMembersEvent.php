<?php
/**
 * Event triggered when an agent connects.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
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
 * Event triggered when an agent connects.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class TfMembersEvent extends EventMessage
{
    /**
     * Search by pattern
     * @var string
     */
    public $pattern_members_domain = '/tfoms(\-?)\d+/';

    /**
     * Returns key: 'Members'.
     *
     * @return array
     */
    public function getMembers()
    {
        return unserialize($this->getKey('Members'));
    }

    /**
     * Parser returns array
     *
     * @param $message
     * @param $pattern
     * @return array
     */
    protected function parseMessage(String $message, $pattern)
    {
        $results = array();

        preg_match_all('/\n/', $message, $matches);

        for ($j = 0; $j < count($matches[0]); $j++) {
            if (!$matches[0][$j]) {
                continue;
            }

            $msg = trim($matches[0][$j]);

            preg_match($pattern, $msg, $names);

            if (!$names) {
                continue;
            }

            if (preg_match('/(\d)+/', $names[0], $key)) {
                $results[$key[0]] = $names[0];
            } else {
                $results[] = $names[0];
            }
        }

        return $results;
    }

    /**
     * Setter key Members
     *
     * @param $message
     */
    protected function setMembers(String $message)
    {
        $this->setKey('Members', serialize($this->parseMessage($message, $this->pattern_members_domain)));
    }

    /**
     * Constructor.
     *
     * @param string $rawContent Original message as received from ami.
     *
     * @return void
     */
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);

        $this->setKey('name', array_pop(explode('\\', __CLASS__)));
        $this->setMembers($rawContent);
    }
}