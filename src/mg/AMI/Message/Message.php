<?php
namespace AMI\Message;

/**
 * This is a generic ami message.
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

	protected function setVariable($key, $value)
	{
		$this->_variables[$key] = $value;
	}

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
