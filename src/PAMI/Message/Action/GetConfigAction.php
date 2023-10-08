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
class GetConfigAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $filename Configuration filename (e.g.: foo.conf).
     * @param string $category Contect name in ini file (e.g.: [general]).
     *
     * @return void
     */
    public function __construct($filename, $category = false, $filter = false)
    {
        parent::__construct('GetConfig');
        $this->setKey('Filename', $filename);
        if ($category != false) {
            $this->setKey('Category', $category);
        }
        if ($filter != false) {
            $this->setKey('Filter', $filter);
        }
    }
}
