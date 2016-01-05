<?php
/**
 * Not all methods were implemented. For reference please check
 * http://open.voismart.it/index.php/VGSM_Manager_Interface
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Matías Barletta <mrb@lionix.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
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
 *
 */
namespace PAMI\Message\Action;

/**
 * Not all methods were implemented. For reference please check
 * http://open.voismart.it/index.php/VGSM_Manager_Interface
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Matías Barletta <mrb@lionix.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://www.lionix.com/
 */
class VGSMSMSTxAction extends ActionMessage
{
    /**
     * Sets CellPhone Number . Mandatory
     *
     * @param string $to phone to send SMS to. Sign + and Countr code is needed in some countries.
     *
     * @return void
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
     *
     * @return void
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
     * @param string $content Should be ASCII not utf8, no accents nada!.
     *
     * @return void
     */
    public function setContent($content)
    {
        $this->setKey('Content', $content);
    }

    /**
     * Sets X-SMS-Class  key. Optional
     *
     * @param string $sms_class Class of SMS to send. Values are 0, 1. 0 is Flash message.
     *
     * @return void
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
     *
     * @return void
     */
    public function setConcatSeqNum($seqnum)
    {
        $this->setKey('X-SMS-Concatenate-Sequence-Number',$seqnum);
    }

    /**
     * Sets X-SMS-Concatenate-Total-Messages. Optional. Should be set with
     * setConcatRefId and setConcatSeqNum
     *
     * @return void
     */
    public function setConcatTotalMsg($totalmsg)
    {
        $this->setKey('X-SMS-Concatenate-Total-Messages',$totalmsg);

    }
    /**
     * Sets Account key.
     *
     * @param string Account code.
     *
     * @return void
     */
    public function setAccount($account)
    {
        $this->setKey('Account', $account);
    }

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('vgsm_sms_tx');
    }
}