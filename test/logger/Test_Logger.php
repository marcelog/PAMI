<?php
/**
 * This class will test the Dummy Logger class.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Logger
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/
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

/**
 * This class will test the Dummy Logger class.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Test
 * @subpackage Logger
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @link       http://marcelog.github.com/
 */
class Test_Logger extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function can_use_dummy_logger()
    {
        $logger = Logger::getLogger(array());
        $logger = Logger::getLogger(array());
        $this->assertTrue($logger instanceof Logger);
        Logger::configure(array());
        $this->assertTrue($logger->isDebugEnabled());
        $logger->warn('a');
        $logger->info('a');
        $logger->trace('a');
        $logger->error('a');
        $logger->debug('a');
        $logger->fatal('a');
    }
}
