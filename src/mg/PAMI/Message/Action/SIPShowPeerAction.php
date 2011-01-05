<?php
/**
 * Sipshowpeer action message.
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
 * Sipshowpeer action message.
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
class SIPShowPeerAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $peer Peer name.
     *
     * @return void
     */
    public function __construct($peer)
    {
        parent::__construct('SIPshowpeer');
        $this->setKey('Peer', $peer);
    }
}