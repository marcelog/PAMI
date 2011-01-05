<?php
/**
 * Event triggered when an action ShowDialPlan is issued.
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
 * Event triggered when an action ShowDialPlan is issued.
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
class ListDialPlanEvent extends EventMessage
{
    /**
     * Returns key: 'Context'.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }

    /**
     * Returns key: 'Extension'.
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->getKey('Extension');
    }

    /**
     * Returns key: 'Priority'.
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->getKey('Priority');
    }

    /**
     * Returns key: 'Application'.
     *
     * @return string
     */
    public function getApplication()
    {
        return $this->getKey('Application');
    }

    /**
     * Returns key: 'AppData'.
     *
     * @return string
     */
    public function getApplicationData()
    {
        return $this->getKey('AppData');
    }

    /**
     * Returns key: 'Registrar'.
     *
     * @return string
     */
    public function getRegistrar()
    {
        return $this->getKey('Registrar');
    }

    /**
     * Returns key: 'IncludeContext'.
     *
     * @return string
     */
    public function getIncludeContext()
    {
        return $this->getKey('IncludeContext');
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