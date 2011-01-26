<?php
/**
 * A dummy logger, used when log4php is not available. It's a facade.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Logger
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://www.noneyet.ar/
 */

/**
 * A dummy logger, used when log4php is not available. It's a facade.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Logger
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://www.noneyet.ar/ Apache License 2.0
 * @link     http://www.noneyet.ar/
 */
final class Logger
{
    /**
     * Holds our instance.
     * @var Logger
     */
    private static $_instance = false;

    /**
     * Returns a logger.
     *
     * @param mixed $options
     *
     * @return Logger
     */
    public final static function getLogger($options)
    {
        if (self::$_instance === false) {
            $ret = new Logger();
            self::$_instance = $ret;
        } else {
            $ret = self::$_instance;
        }
        return $ret;
    }

    /**
     * Dummy configuration.
     *
     * @param mixed $options
     *
     * @return void
     */
    public final static function configure($options)
    {
    }

    /**
     * Dummy is debug enabled?
     *
     * @return false
     */
    public final function isDebugEnabled()
    {
        return false;
    }

    /**
     * Dummy constructor.
     *
     * @return void
     */
    protected final function __construct()
    {

    }
}