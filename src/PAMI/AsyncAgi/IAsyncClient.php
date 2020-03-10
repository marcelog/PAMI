<?php

namespace PAMI\AsyncAgi;

use PAGI\Client\IClient;

/**
 * Async AGI Client interface.
 */
interface IAsyncClient extends IClient
{

    /**
     * Interrupts expected flow of Async AGI commands and returns
     * control to previous source (typically, the PBX dialplan).
     *
     * @return void
     */
    public function asyncBreak();
}
