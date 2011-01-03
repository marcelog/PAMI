<?php
/**
 * Event triggered when exchanging rtp stats.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * Event triggered when exchanging rtp stats.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class RTPSenderStatEvent extends EventMessage
{
    /**
     * Returns key: 'Privilege'.
     *
     * @return string
     */
    public function getPrivilege()
    {
        return $this->getKey('Privilege');
    }

    /**
     * Returns key: 'SSRC'.
     *
     * @return string
     */
    public function getSSRC()
    {
        return $this->getKey('SSRC');
    }

    /**
     * Returns key: 'SentPackets'.
     *
     * @return string
     */
    public function getSentPackets()
    {
        return $this->getKey('SentPackets');
    }
    
    /**
     * Returns key: 'LostPackets'.
     *
     * @return string
     */
    public function getLostPackets()
    {
        return $this->getKey('LostPackets');
    }

    /**
     * Returns key: 'Jitter'.
     *
     * @return string
     */
    public function getJitter()
    {
        return $this->getKey('Jitter');
    }

    /**
     * Returns key: 'RTT'.
     *
     * @return string
     */
    public function getRTT()
    {
        return $this->getKey('RTT');
    }

    /**
     * Returns key: 'SRCount'.
     *
     * @return string
     */
    public function getSRCount()
    {
        return $this->getKey('SRCount');
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
    }
}