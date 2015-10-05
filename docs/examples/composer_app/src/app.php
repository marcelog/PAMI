<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Buenos_Aires');
require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PAMI\Client\Impl\ClientImpl;

$log = new Logger('name');

$options = array(
  'psr3_logger' => $log,
  // Alternative logger configuration uses default log4php implementation
  // 'log4php.properties' => __DIR__ . '/log4php.properties',
  'host' => "127.0.0.1",
  'port' => 5038,
  'username' => 'admin',
  'secret' => 'secret',
  'connect_timeout' => 10000,
  'read_timeout' => 10000,
  'scheme' => 'tcp://'
);
$pamiClient = new ClientImpl($options);
$pamiClient->open();
