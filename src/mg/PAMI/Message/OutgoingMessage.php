<?php
/**
 * A generic outgoing message.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://marcelog.github.com/PAMI/
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
namespace PAMI\Message;

use PAMI\Exception\PAMIException;

/**
 * A generic outgoing message.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
abstract class OutgoingMessage extends Message
{
    /**
     * String of the Class name to handle the Reponse to this Message
     *
     * @var string
     */
    private $_responseHandler;

    /**
     * Returns '_responseHandler'.
     * @return string
     */
    public function getResponseHandler()
    {
        $res = "";
        if (strlen($this->_responseHandler) > 0) {
            $res = (string)$this->_responseHandler;
        }
        return $res;
    }

    /**
     * Set '_responseHandler'.
     *
     * @return void
     */
    public function setResponseHandler($responseHandler)
    {
        if (0 == strlen($responseHandler)) {
            throw new PAMIException('ResponseHandler cannot be empty.');
        }
        $className = '\\PAMI\\Message\\Response\\' . $responseHandler . 'Response';
        if (class_exists($className, true)) {
            $this->_responseHandler = $responseHandler;
        } else {
            throw new PAMIException('ResponseHandler could not be found.');
        }
    }
}
