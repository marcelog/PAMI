<?php

namespace PAMI\Logger;

use Logger;
use LoggerLevel as Log4PhpLevel;
use LoggerLevel;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel as PsrLevel;

class Log4PhpAdapter implements LoggerInterface
{

    /**
     * Contains the log4php logger.
     *
     * @var Logger
     */
    private $logger;

    private static $logLevelAdapter = array(
        PsrLevel::EMERGENCY => Log4PhpLevel::FATAL,
        PsrLevel::ALERT     => Log4PhpLevel::FATAL,
        PsrLevel::CRITICAL  => Log4PhpLevel::FATAL,
        PsrLevel::ERROR     => Log4PhpLevel::ERROR,
        PsrLevel::WARNING   => Log4PhpLevel::WARN,
        PsrLevel::NOTICE    => Log4PhpLevel::INFO,
        PsrLevel::INFO      => Log4PhpLevel::INFO,
        PsrLevel::DEBUG     => Log4PhpLevel::DEBUG,
    );

    /**
     * Creates a new instance of this class with a
     * logger with the given name and configuration.
     *
     * @param string $name
     * @param mixed  $config
     */
    public function __construct($name = 'main', $config = null)
    {
        Logger::configure($config);
        $this->logger = Logger::getLogger($name);
    }

    public function emergency($message, array $context = array())
    {
        $this->log(PsrLevel::EMERGENCY, $message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->log(PsrLevel::ALERT, $message, $context);
    }

    public function critical($message, array $context = array())
    {
        $this->log(PsrLevel::CRITICAL, $message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->log(PsrLevel::ERROR, $message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->log(PsrLevel::WARNING, $message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->log(PsrLevel::NOTICE, $message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->log(PsrLevel::INFO, $message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->log(PsrLevel::DEBUG, $message, $context);
    }

    /**
     * Changes the logging information to be acceptable to log4php and logs it.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        $logger_level = LoggerLevel::toLevel(self::$logLevelAdapter[$level]);

        if (!$this->logger->isEnabledFor($logger_level)) {
            return;
        }

        $exception = null;
        if (isset($context['exception'])) {
            $exception = $context['exception'];
            unset($context['exception']);
        }

        $this->logger->log($logger_level, $this->interpolate($message, $context), $exception);
    }

    /**
     * Interpolates context values into the message placeholders.
     * Taken from PSR-3's example implementation.
     */
    protected function interpolate($message, array $context = array())
    {
        // build a replacement array with braces around the context
        // keys
        $replace = array();
        foreach ($context as $key => $val) {
            $replace['{'.$key.'}'] = $val;
        }

        // interpolate replacement values into the message and return
        return strtr($message, $replace);
    }

    /**
     * Sets a logger instance on the object
     *
     * @param LoggerInterface $logger
     *
     * @return null
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }
}