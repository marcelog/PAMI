<?php
/**
 * A generic incoming message.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://www.noneyet.ar/
 */
namespace PAMI\Message;

/**
 * A generic incoming message.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @link     http://www.noneyet.ar/
 */
abstract class IncomingMessage extends Message
{
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
     * Constructor.
     *
     * @param string $rawContent Original message as received from ami.
     * 
     * @return void
     */
    public function __construct($rawContent)
    {
        parent::__construct();
        $lines = explode(Message::EOL, $rawContent);
        foreach ($lines as $line) {
            $content = explode(':', $line);
            $name = strtolower(trim($content[0]));
            unset($content[0]);
            $value = isset($content[1]) ? trim(implode(':', $content)) : '';
            $this->setKey($name, $value);
        }
    } 
}
