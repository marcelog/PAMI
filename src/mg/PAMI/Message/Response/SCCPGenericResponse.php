<?php
/**
 * A generic response message from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
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
namespace PAMI\Message\Response;

use PAMI\Message\Response\ResponseMessage;
use PAMI\Message\Event\EventMessage;
use PAMI\Exception\PAMIException;
/**
 * A generic SCCP response message from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class SCCPGenericResponse extends ResponseMessage
{
    /**
     * Child Tables
     * @var EventMessage[]
     */
    protected $_tables;

    /**
     * Catch All incoming Events into current Table.
     * @var Array
     */
    private $_temptable;

    /**
     * Adds an event to this response.
     *
     * @param EventMessage $event Child event to add.
     *
     * @return void
     */
    public function addEvent(EventMessage $event)
    {
    	// Handle TableStart/TableEnd Differently 
        if (stristr($event->getName(), 'TableStart') != false) {
            //$this->_temptable = array();
            $this->_temptable['Name'] = $event->getTableName();
            $this->_temptable['Entries'] = array();
        } else if (is_array($this->_temptable)) {
            if (stristr($event->getName(), 'TableEnd') != false) {
            	if (!is_array($this->_tables)) {
            		$this->_tables = array();
            	}
                $this->_tables[$event->getTableName()] = $this->_temptable;
                unset($this->_temptable);
                $this->_temptable = array();
            } else {
                $this->_temptable['Entries'][] = $event;
            }
        } else {
            $this->_events[] = $event;
        }
        
        if (
            stristr($event->getEventList(), 'complete') !== false
            || stristr($event->getName(), 'complete') !== false
            || stristr($event->getName(), 'DBGetResponse') !== false
        ) {
            $this->_completed = true;
        }
    }


    /**
     * Returns all eventtabless for this response.
     *
     * @return EventMessage[]
     */
    public function getTableNames()
    {
    	return array_keys($this->_tables);
    }


    /**
     * Returns all associated events for this response->tablename.
     *
     * @return EventMessage[]
     */
    public function getTable($tablename)
    {
        return $this->_tables[$tablename];
    }

    /**
     * Returns true if this response contains the key EventList with the
     * word 'start' in it. Another way is to have a Message key, like:
     * Message: Result will follow
     *
     * @return boolean
     */
    public function isTable()
    {
        return
            stristr($this->getKey('Event'), 'TableStart') !== false
            || stristr($this->getKey('Event'), 'TableEnd') !== false
        ;
    }

    /**
     * Returns decodec version of the 'JSON' key if present. 
     *
     * @return array
     */
    public function getJSON()
    {
		if (strlen($this->getKey('JSON')) > 0) {
			if (($json = json_decode($this->getKey('JSON'), true)) != false) {
				return $json;
			}
		}
		throw new PAMIException("No JSON Key found to return.");
	}

    /**
     * Constructor.
     *
     * @param string $rawContent Literal message as received from ami.
     *
     * @return void
     */
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
        $this->_temptable = array();
    }
}