<?php
/**
 * ListCategories action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Message\Action;

/**
 * ListCategories action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class ListCategoriesAction extends ActionMessage
{
    /**
     * Constructor.
     * 
     * @param string $file File to dump categories from.
     *
     * @return void
     */
    public function __construct($file)
    {
        parent::__construct('ListCategories');
        $this->setKey('Filename', $file);
    }
}