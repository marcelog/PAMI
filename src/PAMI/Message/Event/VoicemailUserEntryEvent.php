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
 * Event triggered when issuing a VoicemailUsersList action.
 */
class VoicemailUserEntryEvent extends EventMessage
{
    /**
     * Returns key: 'NewMessageCount'.
     *
     * @return string
     */
    public function getNewMessageCount()
    {
        return $this->getKey('NewMessageCount');
    }

    /**
     * Returns key: 'MaxMessageLength'.
     *
     * @return string
     */
    public function getMaxMessageLength()
    {
        return $this->getKey('MaxMessageLength');
    }

    /**
     * Returns key: 'MaxMessageCount'.
     *
     * @return string
     */
    public function getMaxMessageCount()
    {
        return $this->getKey('MaxMessageCount');
    }

    /**
     * Returns key: 'CallOperator'.
     *
     * @return string
     */
    public function getCallOperator()
    {
        return $this->getKey('CallOperator');
    }

    /**
     * Returns key: 'CanReview'.
     *
     * @return string
     */
    public function getCanReview()
    {
        return $this->getKey('CanReview');
    }

    /**
     * Returns key: 'VolumeGain'.
     *
     * @return string
     */
    public function getVolumeGain()
    {
        return $this->getKey('VolumeGain');
    }

    /**
     * Returns key: 'DeleteMessage'.
     *
     * @return string
     */
    public function getDeleteMessage()
    {
        return $this->getKey('DeleteMessage');
    }

    /**
     * Returns key: 'AttachmentFormat'.
     *
     * @return string
     */
    public function getAttachmentFormat()
    {
        return $this->getKey('AttachmentFormat');
    }

    /**
     * Returns key: 'AttachMessage'.
     *
     * @return string
     */
    public function getAttachMessage()
    {
        return $this->getKey('AttachMessage');
    }

    /**
     * Returns key: 'SayCID'.
     *
     * @return string
     */
    public function getSayCID()
    {
        return $this->getKey('SayCID');
    }

    /**
     * Returns key: 'SayEnvelope'.
     *
     * @return string
     */
    public function getSayEnvelope()
    {
        return $this->getKey('SayEnvelope');
    }

    /**
     * Returns key: 'SayDurationMin'.
     *
     * @return string
     */
    public function getSayDurationMin()
    {
        return $this->getKey('SayDurationMin');
    }

    /**
     * Returns key: 'ExitContext'.
     *
     * @return string
     */
    public function getExitContext()
    {
        return $this->getKey('ExitContext');
    }

    /**
     * Returns key: 'UniqueID'.
     *
     * @return string
     */
    public function getUniqueID()
    {
        return $this->getKey('UniqueID');
    }

    /**
     * Returns key: 'DialOut'.
     *
     * @return string
     */
    public function getDialOut()
    {
        return $this->getKey('DialOut');
    }

    /**
     * Returns key: 'Callback'.
     *
     * @return string
     */
    public function getCallback()
    {
        return $this->getKey('Callback');
    }

    /**
     * Returns key: 'Timezone'.
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->getKey('Timezone');
    }

    /**
     * Returns key: 'Language'.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->getKey('Language');
    }

    /**
     * Returns key: 'MailCommand'.
     *
     * @return string
     */
    public function getMailCommand()
    {
        return $this->getKey('MailCommand');
    }

    /**
     * Returns key: 'ServerEmail'.
     *
     * @return string
     */
    public function getServerEmail()
    {
        return $this->getKey('ServerEmail');
    }

    /**
     * Returns key: 'Pager'.
     *
     * @return string
     */
    public function getPager()
    {
        return $this->getKey('Pager');
    }

    /**
     * Returns key: 'Email'.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getKey('Email');
    }

    /**
     * Returns key: 'Fullname'.
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->getKey('Fullname');
    }

    /**
     * Returns key: 'VoicemailBox'.
     *
     * @return string
     */
    public function getVoicemailBox()
    {
        return $this->getKey('VoicemailBox');
    }

    /**
     * Returns key: 'VmContext'.
     *
     * @return string
     */
    public function getVoicemailContext()
    {
        return $this->getKey('VmContext');
    }
}
