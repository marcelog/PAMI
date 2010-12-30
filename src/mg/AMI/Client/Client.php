<?php
namespace AMI\Client;

use AMI\Exception\AMIException;

class Client
{
	private $_host;
	private $_port;
	private $_user;
	private $_pass;
	private $_cTimeout;
	private $_rTimeout;
	private $_socket;
	private $_context;
	private $_eventListeners;

	public function open()
	{
		$cString = 'tcp://' . $this->_host . ':' . $this->_port;
		$this->_context = stream_context_create();
		$this->_socket = stream_socket_client(
			$cString, $errno, $errstr,
			$this->_cTimeout, STREAM_CLIENT_CONNECT, $this->_context
		);
		if ($this->_socket === false) {
			throw new AMIException('Error connecting to ami: ' . $errstr);
		}
		stream_set_timeout($this->_socket, 0, $this->_rTimeout * 1000);
	}

	private function _login()
	{
	}

	public function close()
	{
		stream_socket_shutdown($this->_socket, STREAM_SHUT_RDWR);
	}

	public function __construct($host, $port, $user, $pass, $cTimeout, $rTimeout)
	{
		$this->_host = $host;
		$this->_port = intval($port);
		$this->_user = $user;
		$this->_pass = $pass;
		$this->_cTimeout = $cTimeout;
		$this->_rTimeout = $rTimeout;
	}
}
