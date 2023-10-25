<?php
/**
 * PJSIPNotify action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Sperl Viktor <viktike32@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2023 Sperl Viktor <viktike32@gmail.com>
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
 * PJSIPNotify action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Sperl Viktor <viktike32@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class PJSIPNotifyAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $endpoint PJSIP endpoint or URI to receive the notify.
     * @param array/string $variables Variable Key-Value pairs / pjsip_notify.conf context (section) name.
     *
     * @return void
     */
    public function __construct($endpoint, $variables)
    {
        parent::__construct('PJSIPNotify');
        if (strpos($endpoint, "@") !== false) {
            $this->setKey('URI', $endpoint);
        } else {
            $this->setKey('Endpoint', $endpoint);
        }
        if (is_array($variables)) {
            foreach ($variables as $key => $value) {
                $this->setKey('Variable', $key . '=' . $value);
            }
        } else {
            $this->setKey('Option', $variables);
        }
    }
}
