<?php
namespace PAMI\AsyncAgi\Event;

/**
 * Async AGI Event interface.
 */
interface IAsyncAgiStartEvent
{

    /**
     * Returns key: 'Privilege'.
     *
     * @return string
     */
    public function getPrivilege();

    /**
     * Returns key: 'Channel'.
     *
     * @return string
     */
    public function getChannel();

    /**
     * Returns the original environment received with this event.
     *
     * @return string
     */
    public function getEnvironment();
}
