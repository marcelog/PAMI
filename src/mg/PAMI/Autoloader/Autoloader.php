<?php
/**
 * PAMI autoloader.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Autoloader
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://marcelog.github.com/PAMI/
 *
 * Copyright 2011 Marcelo Gornstein <marcelog@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */
namespace PAMI\Autoloader;

/**
 * PAMI autoloader.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Autoloader
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
class Autoloader
{
    /**
     * Holds current realpath.
     * @var string
     */
    private static $_myPath;
    /**
     * Include path.
     * @var string[]
     */
    private static $_includePath;

    /**
     * Called by php to load a given class. Returns true if the class was
     * successfully loaded.
     *
     * @todo Performance: Try to get rid of implode() and str_replace() here.
     *
     * @return boolean
     */
    public static function load($class)
    {
        foreach (self::$_includePath as $path) {
            $file
                = $path
                . DIRECTORY_SEPARATOR
                . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php'
            ;
            if (file_exists($file)) {
                include_once $file;
                return true;
            }
        }
        return false;
    }

    /**
     * You need to use this function to autoregister this loader.
     *
     * @see spl_autoload_register()
     *
     * @return boolean
     */
    public static function register()
    {
        self::$_myPath = implode(
            DIRECTORY_SEPARATOR,
            array(realpath(dirname(__FILE__)), '..', '..')
        );
        self::$_includePath = explode(PATH_SEPARATOR, ini_get('include_path'));
        return spl_autoload_register('\PAMI\Autoloader\Autoloader::load');
    }
}
