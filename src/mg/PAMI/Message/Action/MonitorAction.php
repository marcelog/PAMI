<?php
/**
 * Monitor action message. Will always record with .wav format and mixing the
 * input and output channels. Also, the filename is mandatory:
 *
 * Mix: true
 * Format: wav
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Message\Action;

/**
 * Monitor action message. Will always record with .wav format and mixing the
 * input and output channels. Also, the filename is mandatory:
 *
 * Mix: true
 * Format: wav
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class MonitorAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel  Channel to monitor.
     * @param string $filename Absolute path to target filename.
     *
     * @return void
     */
    public function __construct($channel, $filename)
    {
        parent::__construct('Monitor');
        $this->setKey('Channel', $channel);
        $this->setKey('Mix', 'true');
        $this->setKey('Format', 'wav');
        $this->setKey('File', $filename);
    }
}