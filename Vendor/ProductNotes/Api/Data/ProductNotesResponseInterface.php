<?php
/**
 * Copyright © Nirmit  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Vendor\ProductNotes\Api\Data;

interface ProductNotesResponseInterface
{
    const PRODUCT_ID = 'product_id';
    const NOTES = 'notes';

    /**
     * Get product_id
     * @return int
     */
    public function getProductId();

    /**
     * Set product_id
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId);

    /**
     * Get notes
     * @return \Vendor\ProductNotes\Api\Data\NoteItemInterface[]
     */
    public function getNotes();

    /**
     * Set notes
     * @param \Vendor\ProductNotes\Api\Data\NoteItemInterface[] $notes
     * @return $this
     */
    public function setNotes($notes);
}