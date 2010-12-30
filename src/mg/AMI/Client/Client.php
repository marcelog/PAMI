<?php
/**
 * TCP Client for AMI.
 *
 * PHP Version 5
 *
 * @category Ami
 * @package  Client
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://www.noneyet.ar/
 */
namespace AMI\Client;

use AMI\Client\Exception\ClientException;

/**
 * TCP Client for AMI.
 *
 * PHP Version 5
 *
 * @category Ami
 * @package  Client
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @link     http://www.noneyet.ar/
 */
class Client
{
    /**
     * Hostname
     * @var string
     */
	private $_host;

	/**
	 * TCP Port.
	 * @var integer
	 */
	private $_port;

	/**
     * Username
     * @var string
     */
	private $_user;

	/**
     * Password
     * @var string
     */
	private $_pass;
	private $_cTimeout;
	private $_rTimeout;
	private $_socket;
	private $_context;
	private $_eventListeners;

	/**
	 * Opens a tcp connection to ami.
	 *
	 * @throws ClientException
	 * @return void
	 */
	public function open()
	{
		$cString = 'tcp://' . $this->_host . ':' . $this->_port;
		$this->_context = stream_context_create();
		$this->_socket = stream_socket_client(
			$cString, $errno, $errstr,
			$this->_cTimeout, STREAM_CLIENT_CONNECT, $this->_context
		);
		if ($this->_socket === false) {
			throw new ClientException('Error connecting to ami: ' . $errstr);
		}
		stream_set_timeout($this->_socket, 0, $this->_rTimeout * 1000);
	}

	/**
	 * Perform login.
	 *
	 * @return void
	 */
	private function _login()
	{
	}

	/**
	 * Closes the connection to ami.
	 *
	 * @return void
	 */
	public function close()
	{
		stream_socket_shutdown($this->_socket, STREAM_SHUT_RDWR);
	}

	/**
	 * Constructor.
	 *
	 * @param string  $host     FQDN or IP address.
	 * @param integer $port     TCP Port.
	 * @param string  $user     Username.
	 * @param string  $pass     Password.
	 * @param integer $cTimeout In seconds. Max time to establish the connection.
	 * @param integer $rTimeout In milliseconds. Read and write timeout.
	 * 
	 * @return void
	 */
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
