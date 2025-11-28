<?php
/**
 * Copyright © Nirmit  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Vendor\ProductNotes\Api\Data;

interface ProductNotesSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get ProductNotes list.
     * @return \Vendor\ProductNotes\Api\Data\ProductNotesInterface[]
     */
    public function getItems();

    /**
     * Set product_id list.
     * @param \Vendor\ProductNotes\Api\Data\ProductNotesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

