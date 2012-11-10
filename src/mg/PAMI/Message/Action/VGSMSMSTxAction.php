<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Action;

/**
 * Not all methods were implemented. For reference please check
 * http://open.voismart.it/index.php/VGSM_Manager_Interface
 */
class VGSMSMSTxAction extends ActionMessage
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct('vgsm_sms_tx');
    }

    /**
     * Sets CellPhone Number . Mandatory
     *
     * @param string $to phone to send SMS to. Sign + and Countr code is needed in some countries
     */
    public function setTo($to)
    {
        $this->setKey('To', $to);
    }

    /**
     * Sets Content  Type. Optional
     *
     * @param string $contentType Content to use, default text/plain; charset=ASCII
     *
     * @return void
     */
    public function setContentType($contentType)
    {
        $this->setKey('Content-type', $contentType);
    }

    /**
     * Sets Content  Type Encoding.Optional
     *
     * @param string $encoding Content to use, default text/plain; charset=ASCII
     */
    public function setContentEncoding($encoding)
    {
        $this->setKey('Content-Transfer-Encoding', $encoding);
    }

    /**
     * Sets Chip Id - It will use the chip_id provided.Optional
     *
     * @param string $me_id Chip Id to use format meX , eg. me0 for VGSM 2 cards
     *
     * @return void
     */
    public function setMe($id)
    {
        $this->setKey('X-SMS-ME', $id);
    }

    /**
     * Sets $content  - Message to send. Mandatory
     *
     * @param string $content Should be ASCII not utf8, no accents nada!
     */
    public function setContent($content)
    {
        $this->setKey('Content', $content);
    }

    /**
     * Sets X-SMS-Class  key. Optional
     *
     * @param string $sms_class Class of SMS to send. Values are 0, 1. 0 is Flash message
     */
    public function setSmsClass($class)
    {
        $this->setKey('X-SMS-Class', $class);
    }

    /**
     * Sets X-SMS-Concatenate-RefID . Optional. Should be set with
     * setConcatSeqNum and setConcatSeqNum
     *
     * @return void
     */
    public function setConcatRefId($refid)
    {
        $this->setKey('X-SMS-Concatenate-RefID',$refid);
    }

    /**
     * Sets X-SMS-Concatenate-Sequence-Number. Optional. Should be set with
     * setConcatSeqNum: setConcatTotalMsg
     */
    public function setConcatSeqNum($seqnum)
    {
        $this->setKey('X-SMS-Concatenate-Sequence-Number',$seqnum);
    }

    /**
     * Sets X-SMS-Concatenate-Total-Messages. Optional. Should be set with
     * setConcatRefId and setConcatSeqNum
     */
    public function setConcatTotalMsg($totalmsg)
    {
        $this->setKey('X-SMS-Concatenate-Total-Messages',$totalmsg);

    }
    /**
     * Sets Account key.
     *
     * @param string Account code
     */
    public function setAccount($account)
    {
        $this->setKey('Account', $account);
    }
}
