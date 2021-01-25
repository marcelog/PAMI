<?php
namespace PAMI\Message\Action;

/**
 * ConfbridgeLockAction action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Szabolcs Morvai <smorvai@arenim.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
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
 */
class ConfbridgeLockAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $conference Conference on which to act.
     *
     * @return void
     */
    public function __construct($conference)
    {
        parent::__construct('ConfbridgeLock');
        $this->setKey('Conference', $conference);
    }
}