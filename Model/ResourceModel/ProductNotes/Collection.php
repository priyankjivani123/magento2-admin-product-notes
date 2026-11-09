<?php
/**
 * Copyright © Priyank Jivani  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Priyank\ProductNotes\Model\ResourceModel\ProductNotes;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'note_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Priyank\ProductNotes\Model\ProductNotes::class,
            \Priyank\ProductNotes\Model\ResourceModel\ProductNotes::class
        );
    }
}

