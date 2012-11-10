<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Event;

/**
 * On reception of an inbound SMS (SMS-DELIVERY) the message will also be
 * reported as a manager event, however, acknowledgment still relies on SMS
 * spooler to handle the message. This event is generated starting from 0.21.0
 */
class vgsm_sms_rxEvent extends EventMessage
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
     * Returns key: 'Received'.
     *
     * @return string
     */
    public function getReceived()
    {
        return $this->getKey('Received');
    }

    /**
     * Returns key: 'From'.
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->getKey('From');
    }

    /**
     * Returns key: 'Subject'.
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->getKey('Subject');
    }

    /**
     * Returns key: 'MIME-Version'.
     *
     * @return string
     */
    public function getMimeVersion()
    {
        return $this->getKey('MIME-Version');
    }

    /**
     * Returns key: 'Content-Type'.
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->getKey('Content-Type');
    }

    /**
     * Returns key: 'Content-Transfer-Encoding'.
     *
     * @return string
     */
    public function getContentEncoding()
    {
        return $this->getKey('Content-Transfer-Encoding');
    }

    /**
     * Returns key: 'Date'.
     *
     * @return string
     */
    public function getDate()
    {
        return $this->getKey('Date');
    }

    /**
     * Returns key: 'Content'.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->getKey('Content');
    }

    /**
     * Returns key: 'X-SMS-Message-Type:'.
     *
     * @return string
     */
    public function getMessageType()
    {
        return $this->getKey('X-SMS-Message-Type');
    }

    /**
     * Returns key: 'X-SMS-Sender-NP'.
     *
     * @return string
     */
    public function getSenderNP()
    {
        return $this->getKey('X-SMS-Sender-NP');
    }

    /**
     * Returns key: 'X-SMS-Sender-TON'.
     *
     * @return string
     */
    public function getSenderTON()
    {
        return $this->getKey('X-SMS-Sender-TON');
    }

    /**
     * Returns key: 'X-SMS-Sender-Number'.
     *
     * @return string
     */
    public function getSenderNumber()
    {
        return $this->getKey('X-SMS-Sender-Number');
    }

    /**
     * Returns key: 'X-SMS-SMCC-NP'.
     *
     * @return string
     */
    public function getSMCCNP()
    {
        return $this->getKey('X-SMS-SMCC-NP');
    }

    /**
     * Returns key: 'X-SMS-SMCC-TON'.
     *
     * @return string
     */
    public function getSMCCTON()
    {
        return $this->getKey('X-SMS-SMCC-TON');
    }

    /**
     * Returns key: 'X-SMS-SMCC-Number'.
     *
     * @return string
     */
    public function getSMCCNumber()
    {
        return $this->getKey('X-SMS-SMCC-Number');
    }

    /**
     * Returns key: 'X-SMS-More-Messages-To-Send'.
     *
     * @return string
     */
    public function getMoreMessagesToSend()
    {
        return $this->getKey('X-SMS-More-Messages-To-Send');
    }

    /**
     * Returns key: 'X-SMS-Reply-Path'.
     *
     * @return string
     */
    public function getReplyPath()
    {
        return $this->getKey('X-SMS-Reply-Path');
    }

    /**
     * Returns key: 'XX-SMS-User-Data-Header-Indicator'.
     *
     * @return string
     */
    public function getDataHeaderIndicator()
    {
        return $this->getKey('X-SMS-User-Data-Header-Indicator');
    }

    /**
     * Returns key: 'X-SMS-Status-Report-Indication'.
     *
     * @return string
     */
    public function getStatusReportIndication()
    {
        return $this->getKey('X-SMS-Status-Report-Indication');
    }
}
