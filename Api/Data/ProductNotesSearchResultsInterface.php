<?php
/**
 * Copyright © Priyank Jivani  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace PriyankJivani\AdminProductNotes\Api\Data;

interface ProductNotesSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get ProductNotes list.
     * @return \PriyankJivani\AdminProductNotes\Api\Data\ProductNotesInterface[]
     */
    public function getItems();

    /**
     * Set product_id list.
     * @param \PriyankJivani\AdminProductNotes\Api\Data\ProductNotesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

