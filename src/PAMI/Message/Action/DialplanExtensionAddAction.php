<?php
/**
 * GetConfig action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
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
 */
namespace PAMI\Message\Action;

/**
 * GetConfig action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class DialplanExtensionAddAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('DialplanExtensionAdd');
    }
    
    public function setContext($input)
    {
        $this->setKey('Context-'.$this->getPaddedCounter(), $input);
    }
    
    public function setExtension($input)
    {
        $this->setKey('Extension-'.$this->getPaddedCounter(), $input);
    }
    
    public function setPriority($input)
    {
        $this->setKey('Priority-'.$this->getPaddedCounter(), $input);
    }
    
    public function setApplication($input)
    {
        $this->setKey('Application-'.$this->getPaddedCounter(), $input);
    }
    
    public function setApplicationData($input)
    {
        $this->setKey('ApplicationData-'.$this->getPaddedCounter(), $input);
    }
    
    public function setReplace($input)
    {
        $this->setKey('Replace-'.$this->getPaddedCounter(), $input);
    }
    
}
