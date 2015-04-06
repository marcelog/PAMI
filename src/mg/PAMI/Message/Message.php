<?php
/**
 * A generic ami message, in-or-outbound.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://marcelog.github.com/PAMI/
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
namespace PAMI\Message;

use PAMI\Exception\PAMIException;
/**
 * A generic ami message, in-or-outbound.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
abstract class Message
{
	/**
	 * End Of Line means this token.
	 * @var string
	 */
	const EOL = "\r\n";

	/**
	 * End Of Message means this token.
	 * @var string
	 */
	const EOM = "\r\n\r\n";

	/**
	 * Message content, line by line. This is what it gets sent
	 * or received literally.
	 * @var string[]
	 */
	protected $lines;

	/**
	 * Metadata. Message variables (key/value).
	 * @var string[]
	 */
	protected $variables;

	/**
	 * Metadata. Message "keys" i.e: Action: login
	 * @var string[]
	 */
	protected $keys;

	/**
	 * Created date (unix timestamp).
	 * @var integer
	 */
	protected $createdDate;

    /**
     * Serialize function.
     *
     * @return string[]
     */
    public function __sleep()
    {
        return array('lines', 'variables', 'keys', 'createdDate');
    }

	/**
	 * Returns created date.
	 *
	 * @return integer
	 */
	public function getCreatedDate()
	{
	    return $this->createdDate;
	}

	/**
	 * Adds a variable to this message.
	 *
	 * @param string $key   Variable name.
	 * @param string $value Variable value.
	 *
	 * @return void
	 */
	public function setVariable($key, $value)
	{
	    $key = strtolower($key);
	    $this->variables[$key] = $value;
	}

	/**
	 * Returns a variable by name.
	 *
	 * @param string $key Variable name.
	 *
	 * @return string
	 */
	public function getVariable($key)
	{
	    $key = strtolower($key);
		if (!isset($this->variables[$key])) {
		    return null;
		}
		return $this->variables[$key];
	}

	/**
	 * Sanitize incoming value
	 *
	 * @param string $value Key value.
	 *
	 * @return typed and sanitized value
	 */
	protected function sanitizeInput($value)
	{
		if (!isset($value) || $value === NULL || strlen($value) == 0) {
			return NULL;
		} else if (is_numeric($value)) {
			if (filter_var($value, FILTER_VALIDATE_INT, FILTER_FLAG_ALLOW_HEX | FILTER_FLAG_ALLOW_OCTAL)) {
				return intval($value, 0);
			} else if (filter_var($value, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND | FILTER_FLAG_ALLOW_SCIENTIFIC)) {
				return (float)$value;
			} else {
				return (double)$value;
			}
		} else if (is_string($value)) {
			if (filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
				return (boolean)$value;
			} else if (filter_var($value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE)) {
				return (string)$value;
			} else {
				throw new PAMIException("Incoming String is not sanitary. Skipping: '" . $value . "'\n");
			}
		} else if (is_resource($value)) {
			// failure ?
			return $value;
		} else if (is_object($value)) {
			// failure ?
			return (object)$value;
		} else {
			throw new PAMIException("Don't know how to convert: '" . $value . "'\n");
		}
	}

	/**
	 * Adds a variable to this message.
	 *
	 * @param string $key   Key name (i.e: Action).
	 * @param string $value Key value.
	 *
	 * @return void
	 */
	protected function setKey($key, $value)
	{
		$key = strtolower((string)$key);
		$this->keys[$key] = (string)$value;
	}

	/**
	 * Adds a variable to this message after sanitizing it first.
	 *
	 * @param string $key   Key name (i.e: Action).
	 * @param string $value Key value.
	 *
	 * @return void
	 */
	protected function setSanitizedKey($key, $value)
	{
		$key = strtolower((string)$key);
		if ($key === 'actionid') {
			$this->keys[$key] = (string)$this->sanitizeInput($value);
		} else {
			$this->keys[$key] = $this->sanitizeInput($value);
		}
	}

	/**
	 * Returns a key by name.
	 *
	 * @param string $key Key name (i.e: Action).
	 *
	 * @return string
	 */
	public function getKey($key)
	{
	    $key = strtolower($key);
	    if (!isset($this->keys[$key])) {
		    return null;
		}
		//return (string)$this->keys[$key];
		return $this->keys[$key];
	}

	/**
	 * Returns a key by name as boolean.
	 *
	 * @param string $key Key name (i.e: Action).
	 *
	 * @return boolean
	 */
	public function getBoolKey($key)
	{
		$val = $this->getKey($key);
		$boolval = ( is_string($val) ? filter_var($val, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : (bool) $val );
		return ( $boolval===null ? false : $boolval );
	}

	/**
	 * Returns all keys for this message.
	 *
	 * @return string[]
	 */
	public function getKeys()
	{
	    return $this->keys;
	}

	/**
	 * Returns all variabels for this message.
	 *
	 * @return string[]
	 */
	public function getVariables()
	{
	    return $this->variables;
	}

	/**
	 * Returns the end of message token appended to the end of a given message.
	 *
	 * @return string
	 */
	protected function finishMessage($message)
	{
		return $message . self::EOL . self::EOL;
	}

	/**
	 * Returns the string representation for an ami action variable.
	 *
	 * @param string $key
	 * @param string $value
	 *
	 * @return string
	 */
	private function serializeVariable($key, $value)
	{
		return "Variable: $key=$value";
	}

	/**
	 * Gives a string representation for this message, ready to be sent to
	 * ami.
	 *
	 * @return string
	 */
	public function serialize()
	{
	    $result = array();
	    foreach ($this->getKeys() as $k => $v) {
	        $result[] = $k . ': ' . $v;
	    }
	    foreach ($this->getVariables() as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $singleValue) {
        	        $result[] = $this->serializeVariable($k, $singleValue);
                }
            } else {
        	    $result[] = $this->serializeVariable($k, $v);
            }
	    }
	    $mStr = $this->finishMessage(implode(self::EOL, $result));
	    return $mStr;
	}

	/**
     * Returns key: 'ActionID'.
     *
     * @return string
     */
    public function getActionID()
    {
        return $this->getKey('ActionID');
    }

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->lines = array();
		$this->variables = array();
		$this->keys = array();
		$this->createdDate = time();
	}
}
