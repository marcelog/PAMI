<?php
ini_set(
    'include_path',
    implode(
        PATH_SEPARATOR,
        array(
            ini_get('include_path'),
            realpath(implode(
                DIRECTORY_SEPARATOR, array(__DIR__, '..', 'src', 'mg')
            ))
        )
    )
);
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'PAMI/Logger/Logger.php';
if (!defined('RESOURCES_DIR')) {
    define ('RESOURCES_DIR', realpath(__DIR__) . DIRECTORY_SEPARATOR . 'resources');
}
require_once 'PAMI/Autoloader/Autoloader.php';
\PAMI\Autoloader\Autoloader::register();
