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
	/**
	 * This is our factory method.
	 *
	 * @param string $message Literal message as received from ami.
	 * @param string $requestingaction
	 * @param string $responseHandler
	 *
	 * @return EventMessage
	 */
	public static function createFromRaw($message, $requestingaction = false, $responseHandler = false)
	{
		$_className = false;
		
		if ($responseHandler != false) {
			$_className = $responseHandler;
		} else if ($requestingaction != false) {
			$_className = substr(get_class($requestingaction), 20, -6);
		}
		if ($_className) {
			$responseclass = '\\PAMI\\Message\\Response\\' . $_className . 'Response';
			if (class_exists($responseclass, true)) {
				return new $responseclass($message);
			} else if ($responseHandler != false){
				throw new PAMIException('Response Class Not Found');
			}
		}
		return new GenericResponse($message);
	}

	/**
	 * Constructor. Nothing to see here, move along.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}
}
