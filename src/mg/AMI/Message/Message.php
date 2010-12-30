<?php
/**
 * A generic ami message, in-or-outbound.
 *
 * PHP Version 5
 *
 * @category Ami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://www.noneyet.ar/
 */
namespace AMI\Message;

/**
 * A generic ami message, in-or-outbound.
 *
 * PHP Version 5
 *
 * @category Ami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @link     http://www.noneyet.ar/
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
	private $_lines;

	/**
	 * Metadata. Message variables (key/value).
	 * @var string[]
	 */
	private $_variables;

	/**
	 * Metadata. Message "keys" i.e: Action: login
	 * @var string[]
	 */
	private $_keys;

	/**
	 * Adds a variable to this message.
	 *
	 * @param string $key   Variable name.
	 * @param string $value Variable value.
	 * 
	 * @return void
	 */
	protected function setVariable($key, $value)
	{
		$this->_variables[$key] = $value;
	}

	/**
	 * Returns a variable by name.
	 *
	 * @param string $key Variable name.
	 * 
	 * @return string
	 */
	protected function getVariable($key)
	{
		if (!isset($this->_variables[$key])) {
		    return null;
		}
		return $this->_variables[$key];
	}

	/**
	 * Returns the end of line token appended to the end of a given line.
	 *
	 * @return string
	 */
	protected function finishLine($line)
	{
		return $line . self::$EOL;
	}

	/**
	 * Returns the end of message token appended to the end of a given message.
	 *
	 * @return string
	 */
	protected function finishMessage($message)
	{
		return $message . self::$EOL . self::$EOL;
	}

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->_lines = array();
	}
}
