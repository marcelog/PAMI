<?php
namespace AMI\Message;

/**
 * This is a generic incoming ami message, asterisk send these.
 *
 */
abstract class IncomingMessage extends Message
{
    public function getActionID()
    {
        return $this->getVariable('ActionID');
    }
    
    public function __construct($rawContent)
    {
        $lines = explode(Message::EOL, $rawContent);
        foreach ($lines as $line) {
            $content = explode(':', $line);
            $this->setKey(trim($content[0]), trim($content[1]));
        }
    } 
}
