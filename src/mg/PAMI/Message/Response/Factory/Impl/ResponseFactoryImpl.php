<?php
/**
 * This factory knows which response to return according to a given raw message
 * from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Response
 * @subpackage Factory.Impl
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2015 Diederik de Groot <ddegroot@users.sf.net>, Marcelo Gornstein <marcelog@gmail.com>
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
namespace PAMI\Message\Response\Factory\Impl;

use PAMI\Exception\PAMIException;
use PAMI\Message\Response\ResponseMessage;
use PAMI\Message\Response\GenericResponse;
use PAMI\Message\Message;

/**
 * This factory knows which reponse handler to return according to a given raw message from ami,
 * the outgoingMessageClass and responseHandler requested by the Action
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Response
 * @subpackage Factory.Impl
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class ResponseFactoryImpl
{
	private $_logger;
	/**
	 * This is our factory method.
	 *
	 * @param string $message Literal message as received from ami.
	 * @param string $requestingaction
	 * @param string $responseHandler
	 *
	 * @return EventMessage
	 */
	//public static function createFromRaw($message, $requestingaction = false, $responseHandler = false)
	public function createFromRaw($message, $requestingaction = false, $responseHandler = false)
	{
		$responseclass = '\\PAMI\\Message\\Response\\GenericResponse';

		$_className = false;
		if ($responseHandler != false) {
			$_className = '\\PAMI\\Message\\Response\\' . $responseHandler . 'Response';
		} else if ($requestingaction != false) {
			$_className = '\\PAMI\\Message\\Response\\' . substr(get_class($requestingaction), 20, -6) . 'Response';
		}
		if ($_className) {
			if (class_exists($_className, true)) {
				$responseclass = $_className;
			} else if ($responseHandler != false){
				throw new PAMIException('Response Class ' . $_className . '  requested via responseHandler, could not be found');
			}
		}
		if ($this->_logger->isDebugEnabled()) $this->_logger->debug('Created: ' . $responseclass . "\n");
		return new $responseclass($message);
	}

	/**
	 * Constructor. Nothing to see here, move along.
	 *
	 * @return void
	 */
//    public function __construct($logger)
//    {
//        $this->_logger = $logger;
    public function __construct($logger)
    {
        $this->_logger = $logger ? $logger : \Logger::getLogger(__CLASS__);
		if ($this->_logger->isDebugEnabled()) $this->_logger->debug('------ Response Factory Created: ------ ' . "\n");
    }
}