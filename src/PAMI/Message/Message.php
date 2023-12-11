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
     * @var string[]
     */
    protected array $lines;

    /**
     * Metadata. Message variables (key/value).
     *
     * @var string[]
     */
    protected array $variables;

    /**
     * Metadata. Message "keys" i.e: Action: login
     *
     * @var array<string,string|int|bool>
     */
    protected array $keys;

    /**
     * Created date (unix timestamp).
     *
     * @var integer
     */
    protected int $createdDate;

    /**
     * Serialize function.
     *
     * @return array<int,string>
     */
    public function __sleep()
    {
        return ['lines', 'variables', 'keys', 'createdDate'];
    }

    /**
     * Returns created date.
     *
     * @return integer
     */
    public function getCreatedDate(): int
    {
        return $this->createdDate;
    }

    /**
     * Adds a variable to this message.
     *
     * @param string $key   Variable name.
     * @param mixed $value Variable value.
     *
     * @return void
     */
    public function setVariable(string $key, mixed $value): void
    {
        $this->variables[$key] = $value;
    }

    /**
     * Returns a variable by name.
     *
     * @param string $key Variable name.
     *
     * @return mixed
     */
    public function getVariable(string $key): mixed
    {
        if (!isset($this->variables[$key])) {
            return null;
        }

        return $this->variables[$key];
    }

    /**
     * Adds a variable to this message.
     *
     * @param string          $key   Key name (i.e: Action).
     * @param string|int|bool $value Key value.
     *
     * @return void
     */
    protected function setKey(string $key, string|int|bool $value): void
    {
        $key              = strtolower($key);
        $this->keys[$key] = $value;
    }

    /**
     * Returns a key by name.
     *
     * @param string $key Key name (i.e: Action).
     *
     * @return string|int|bool|null
     */
    public function getKey(string $key): string|int|bool|null
    {
        $key = strtolower($key);
        if (!isset($this->keys[$key])) {
            return null;
        }

        return (string)$this->keys[$key];
    }

    /**
     * Returns all keys for this message.
     *
     * @return array<string,string>
     */
    public function getKeys(): array
    {
        return $this->keys;
    }

    /**
     * Returns all variabels for this message.
     *
     * @return array<string,mixed>
     */
    public function getVariables(): array
    {
        return $this->variables;
    }

    /**
     * Returns the end of message token appended to the end of a given message.
     *
     * @param string $message
     *
     * @return string
     */
    protected function finishMessage(string $message): string
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
    private function serializeVariable(string $key, string $value): string
    {
        return "Variable: $key=$value";
    }

    /**
     * Gives a string representation for this message, ready to be sent to
     * ami.
     *
     * @return string
     */
    public function serialize(): string
    {
        $result = [];
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

        return $this->finishMessage(implode(self::EOL, $result));
    }

    /**
     * Returns key: 'ActionID'.
     *
     * @return string
     */
    public function getActionID(): string
    {
        return $this->getKey('ActionID') ?? '';
    }

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->lines       = [];
        $this->variables   = [];
        $this->keys        = [];
        $this->createdDate = getTime();
    }
}
