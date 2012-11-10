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
 * A generic incoming message.
 */
abstract class IncomingMessage extends Message
{
    /**
     * Holds original message.
     *
     * @var string
     */
    protected $rawContent;

    /**
     * Constructor.
     *
     * @param string $rawContent Original message as received from ami
     */
    public function __construct($rawContent)
    {
        parent::__construct();

        $this->rawContent = $rawContent;

        $lines = explode(Message::EOL, $rawContent);

        foreach ($lines as $line) {
            $content = explode(':', $line);
            $name = strtolower(trim($content[0]));
            unset($content[0]);
            $value = isset($content[1]) ? trim(implode(':', $content)) : '';
            $this->setKey($name, $value);
        }
    }

    /**
     * Serialize function.
     *
     * @return array
     */
    public function __sleep()
    {
        $result = parent::__sleep();
        $result[] = 'rawContent';

        return $result;
    }

    /**
     * Returns key 'EventList'. In respones, this will surely be a "start". In
     * events, should be a "complete".
     *
     * @return string
     */
    public function getEventList()
    {
        return $this->getKey('EventList');
    }

    /**
     * Returns the original message content without parsing.
     *
     * @return string
     */
    public function getRawContent()
    {
        return $this->rawContent;
    }
}
