<?php
ini_set(
    'include_path',
    implode(
        PATH_SEPARATOR,
        array(
            realpath(implode(
                DIRECTORY_SEPARATOR, array(__DIR__, '..', 'vendor')
            )),
            ini_get('include_path'),
        )
    )
);
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!defined('RESOURCES_DIR')) {
    define ('RESOURCES_DIR', realpath(__DIR__) . DIRECTORY_SEPARATOR . 'resources');
}
require_once 'autoload.php';
