<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', realpath(__DIR__ . "/.."));
}
if (!defined('TMPDIR')) {
    define('TMPDIR', '/tmp');
}
require_once implode(DIRECTORY_SEPARATOR, array(
  __DIR__, "..", "..", "vendor", "autoload.php"
));
