<?php
/**
 * This class will test the ami client
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Client
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/
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
namespace {
    $mockFopen = false;
    $mockFwrite = false;
    $mockFwriteReturn = false;
    $mockTime = false;
    $mockFgets = false;
    $mockFgetsCount = 0;
    $mockTimeCount = 0;
    $mockTimeResult = 0;
    $mockFclose = false;
    $mockFreadReturn = false;

    function setFgetsMock(array $readValues, $writeValues)
    {
        global $mockFgets;
        global $mockFopen;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        global $mockFwrite;
        global $mockFwriteCount;
        global $mockFwriteReturn;
        $mockFgets = true;
        $mockFopen = true;
        $mockFwrite = true;
        $mockFgetsCount = 0;
        $mockFgetsReturn = $readValues;
        $mockFwriteCount = 0;
        $mockFwriteReturn = $writeValues;
    }
}

namespace PAMI\Client\Impl {
    function time() {
        global $mockTime;
        global $mockTimeCount;
        global $mockTimeReturn;
        if (isset($mockTime) && $mockTime === true) {
            if (!isset($mockTimeReturn[$mockTimeCount])) {
                return call_user_func_array('\time', func_get_args());
            }
            $result = $mockTimeReturn[$mockTimeCount];
            $mockTimeCount++;
            return $result;
        } else {
            return call_user_func_array('\time', func_get_args());
        }
    }
    function fclose() {
        global $mockFclose;
        if (isset($mockFclose) && $mockFclose === true) {
            return true;
        } else {
            return call_user_func_array('\fclose', func_get_args());
        }
    }
    function fopen() {
        global $mockFopen;
        if (isset($mockFopen) && $mockFopen === true) {
            return true;
        } else {
            return call_user_func_array('\fopen', func_get_args());
        }
    }
    function fwrite() {
        global $mockFwrite;
        global $mockFwriteCount;
        global $mockFwriteReturn;
        if (isset($mockFwrite) && $mockFwrite === true) {
            $args = func_get_args();
            if (isset($mockFwriteReturn[$mockFwriteCount]) && $mockFwriteReturn[$mockFwriteCount] !== false) {
                if ($mockFwriteReturn[$mockFwriteCount] === 'fwrite error') {
                    $mockFwriteCount++;
                    return 0;
                }
                $str = $mockFwriteReturn[$mockFwriteCount] . "\n";
                if ($str !== $args[1]) {
                    throw new \Exception(
                    	'Mocked: ' . print_r($mockFwriteReturn[$mockFwriteCount], true) . ' is '
                    	. ' different from: ' . print_r($args[1], true)
                    );
                }
            }
            $mockFwriteCount++;
            return strlen($args[1]);
        } else {
            return call_user_func_array('\fwrite', func_get_args());
        }
    }
    function fgets() {
        global $mockFgets;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        if (isset($mockFgets) && $mockFgets === true) {
            $result = $mockFgetsReturn[$mockFgetsCount];
            $mockFgetsCount++;
            return is_string($result) ? $result . "\n" : $result;
        } else {
            return call_user_func_array('\fopen', func_get_args());
        }
    }
/**
 * This class will test the ami client
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Client
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @link       http://marcelog.github.com/
 */
class Test_Client extends \PHPUnit_Framework_TestCase
{
    private $_properties = array();

    public function setUp()
    {
        $this->_properties = array(
            'log4php.properties' => RESOURCES_DIR . DIRECTORY_SEPARATOR . 'log4php.properties'
        );
    }

    /**
     * @test
     */
    public function can_get_client()
    {
        $options = array();
	    //$a = new \PAMI\Client\Impl\ClientImpl($options);
    }
}
}