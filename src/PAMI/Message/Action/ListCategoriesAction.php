<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Action;

/**
 * ListCategories action message.
 */
class ListCategoriesAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $file File to dump categories from
     */
    public function __construct($file)
    {
        parent::__construct('ListCategories');

        $this->setKey('Filename', $file);
    }
}
