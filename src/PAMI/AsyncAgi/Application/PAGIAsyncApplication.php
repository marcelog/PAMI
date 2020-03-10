<?php

namespace PAMI\AsyncAgi\Application;

use PAGI\Application\PAGIApplication;
use PAMI\AsyncAgi\IAsyncClient;

/**
 * Parent class for all async PAGIApplications.
 *
 */
abstract class PAGIAsyncApplication extends PAGIApplication
{
    /**
     * AGI Client.
     * @var IAsyncClient
     */
    protected $agiClient;

    /**
     * Returns AGI Client.
     *
     * @return IAsyncClient
     */
    public function getAgi()
    {
        return $this->agiClient;
    }
}
