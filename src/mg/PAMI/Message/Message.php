<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message;

/**
 * A generic ami message, in-or-outbound.
 */
abstract class Message
{
    /**
     * End Of Line means this token.
     *
     * @var string
     */
    const EOL = "\r\n";

    /**
     * End Of Message means this token.
     *
     * @var string
     */
    const EOM = "\r\n\r\n";

    /**
     * Message content, line by line. This is what it gets sent
     * or received literally.
     *
     * @var array
     */
    protected $lines;

    /**
     * Metadata. Message variables (key/value).
     *
     * @var array
     */
    protected $variables;

    /**
     * Metadata. Message "keys" i.e: Action: login
     *
     * @var array
     */
    protected $keys;

    /**
     * Created date (unix timestamp).
     *
     * @var integer
     */
    protected $dateCreated;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->lines = array();
        $this->variables = array();
        $this->keys = array();
        $this->dateCreated = time();
    }

    /**
     * Serialize function.
     *
     * @return array
     */
    public function __sleep()
    {
        return array('lines', 'variables', 'keys', 'dateCreated');
    }

    /**
     * Returns created date.
     *
     * @return integer
     */
    public function getdateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Adds a variable to this message.
     *
     * @param string $key   Variable name
     * @param string $value Variable value
     */
    public function setVariable($key, $value)
    {
        $key = strtolower($key);
        $this->variables[$key] = $value;
    }

    /**
     * Returns a variable by name.
     *
     * @param string $key Variable name
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
     * Adds a variable to this message.
     *
     * @param string $key   Key name (i.e: Action)
     * @param string $value Key value
     */
    protected function setKey($key, $value)
    {
        $key = strtolower((string) $key);
        $this->keys[$key] = (string) $value;
    }

    /**
     * Returns a key by name.
     *
     * @param string $key Key name (i.e: Action)
     *
     * @return string
     */
    public function getKey($key)
    {
        $key = strtolower($key);

        if (!isset($this->keys[$key])) {
            return null;
        }

        return (string) $this->keys[$key];
    }

    /**
     * Returns all keys for this message.
     *
     * @return array
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * Returns all variabels for this message.
     *
     * @return array
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
        return $message.self::EOL.self::EOL;
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
        return sprintf('Variable: %s=%s', $key, $value);
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
            $result[] = $k.': '.$v;
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

        return $this->finishMessage(implode(self::EOL, $result));
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
}
