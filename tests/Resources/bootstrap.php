<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', realpath(__DIR__ . "/.."));
}
if (!defined('TMPDIR')) {
    define('TMPDIR', '/tmp');
}

require_once __DIR__ . "/../../vendor/autoload.php";

//
//
//namespace PAMI\Client\Impl {
//
//    function microtime()
//    {
//        global $mockTime;
//        global $mockTimeCount;
//        global $mockTimeReturn;
//        if (isset($mockTime) && $mockTime === true) {
//            return 1432.123;
//        } else {
//            return call_user_func_array('\microtime', func_get_args());
//        }
//    }
//
//    function stream_socket_client(
//        $remote_socket,
//        &$errno = null,
//        &$errstr = null,
//        $timeout = null,
//        $flags = null,
//        $context = null
//    ) {
//        global $mock_stream_socket_client;
//        if (isset($mock_stream_socket_client) && $mock_stream_socket_client === true) {
//        } else {
//            return \stream_socket_client($remote_socket, $errno, $errstr, $timeout, $flags, $context);
//        }
//    }
//
//    function stream_socket_shutdown()
//    {
//        return true;
//    }
//
//    function stream_set_blocking()
//    {
//        global $mock_stream_set_blocking;
//        if (isset($mock_stream_set_blocking) && $mock_stream_set_blocking === true) {
//            return true;
//        } else {
//            return call_user_func_array('\stream_set_blocking', func_get_args());
//        }
//    }
//
//    function fwrite()
//    {
//        global $mockFwrite;
//        global $mockFwriteCount;
//        global $mockFwriteReturn;
//        if (isset($mockFwrite) && $mockFwrite === true) {
//            $args = func_get_args();
//            if (isset($mockFwriteReturn[$mockFwriteCount]) && $mockFwriteReturn[$mockFwriteCount] !== false) {
//                if ($mockFwriteReturn[$mockFwriteCount] === 'fwrite error') {
//                    $mockFwriteCount++;
//
//                    return 0;
//                }
//                $str = $mockFwriteReturn[$mockFwriteCount] . "\r\n";
//                if ($str !== $args[1]) {
//                    throw new \Exception(
//                        'Mocked: ' . PHP_EOL . PHP_EOL . print_r($mockFwriteReturn[$mockFwriteCount],
//                            true) . PHP_EOL . PHP_EOL
//                        . ' is different from: ' . PHP_EOL . PHP_EOL . print_r($args[1], true)
//                    );
//                }
//            }
//            $mockFwriteCount++;
//
//            return strlen($args[1]);
//        } else {
//            return call_user_func_array('\fwrite', func_get_args());
//        }
//    }
//
//    function stream_get_line()
//    {
//        global $mockFgets;
//        global $mockFgetsCount;
//        global $mockFgetsReturn;
//        if (isset($mockFgets) && $mockFgets === true) {
//            $result = $mockFgetsReturn[$mockFgetsCount];
//            $mockFgetsCount++;
//
//            return is_string($result) ? $result . "\r\n" : $result;
//        } else {
//            return call_user_func_array('\stream_get_line', func_get_args());
//        }
//    }
//
//    function feof($resource)
//    {
//        global $mockFgets;
//        if (isset($mockFgets) && $mockFgets === true) {
//            return false;
//        }
//
//        return \feof($resource);
//    }
//
//    function fread()
//    {
//        global $mockFgets;
//        global $mockFgetsCount;
//        global $mockFgetsReturn;
//        if (isset($mockFgets) && $mockFgets === true) {
//            $result = $mockFgetsReturn[$mockFgetsCount];
//            $mockFgetsCount++;
//            if (is_integer($result)) {
//                sleep($result);
//
//                return '';
//            }
//
//            return is_string($result) ? $result . "\r\n" : $result;
//        } else {
//            return call_user_func_array('\fread', func_get_args());
//        }
//    }
//
//    function setFgetsMock(?array $readValues, $writeValues)
//    {
//        global $mockFgets;
//        global $mockFopen;
//        global $mockFgetsCount;
//        global $mockFgetsReturn;
//        global $mockFwrite;
//        global $mockFwriteCount;
//        global $mockFwriteReturn;
//        $mockFgets        = true;
//        $mockFopen        = true;
//        $mockFwrite       = true;
//        $mockFgetsCount   = 0;
//        $mockFgetsReturn  = $readValues;
//        $mockFwriteCount  = 0;
//        $mockFwriteReturn = $writeValues;
//    }
//}