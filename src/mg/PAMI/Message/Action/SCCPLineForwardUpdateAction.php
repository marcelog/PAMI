<?php
/**
 * SCCPLineForwardUpdate action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2015 Diederik de Groot ddegroot@users.sf.net>, Marcelo Gornstein <marcelog@gmail.com>
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

use PAMI\Exception\PAMIException;

/**
 * SCCP Forward Line action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class SCCPLineForwardUpdateAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $DeviceName Device Name
     * @param string $LineName Line Name
     * @param string $ForwardType Forward Type, one of ['all', 'busy']
     * @param boolean $Disable
     * @param boolean $Number
     *
     * @return void
     */
    public function __construct($DeviceName, $LineName, $ForwardType, $Disable=false, $Number=false)
    {
        parent::__construct('SCCPLineForwardUpdate');
        
        $this->setKey('DeviceName', $DeviceName);
        $this->setKey('LineName', $LineName);

        if (in_array(strtolower($ForwardType), array('all', 'busy'))) {
		    $this->setKey('ForwardType', $ForwardType);
        } else {
            throw new PAMIException('ForwardType has to be one of \'all\', \'busy\'.');
        }

        if ($Disable == true) {
            $this->setKey('Disable', 'on');
            if ($Number != false) {
                throw new PAMIException('Number is missing.');
            }
        } else {
            if ($Number != false) {
                $this->setKey('Number', $Number);
            } else {
                throw new PAMIException('Number is missing.');
            }
        }
    }
}
