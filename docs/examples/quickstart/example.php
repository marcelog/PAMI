<?php
ini_set(
    'include_path',
    implode(
        PATH_SEPARATOR,
        array(
            ini_get('include_path'),
            implode(DIRECTORY_SEPARATOR, array('..', '..', '..', 'src', 'mg'))
        )
    )
);

////////////////////////////////////////////////////////////////////////////////
// Mandatory stuff to bootstrap.
////////////////////////////////////////////////////////////////////////////////
require_once 'AMI/Autoloader/Autoloader.php'; // Include ding autoloader.
Autoloader::register(); // Call autoloader register for ding autoloader.
use AMI\Client\Impl\ClientImpl;

error_reporting(E_ALL);
ini_set('display_errors', 1);
try
{
	$a = new ClientImpl('localhost', '9999', 'a', 'a', 10, 1);
	$a->open();
	$a->close();
} catch (Exception $e) {
	echo $e->getMessage() . "\n";
}
