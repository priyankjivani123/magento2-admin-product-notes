<?php
/**
 * Copyright © Priyank Jivani  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace PriyankJivani\AdminProductNotes\Api\Data;

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
     * @return \PriyankJivani\AdminProductNotes\Api\Data\NoteItemInterface[]
     */
    public function getNotes();

    /**
     * Set notes
     * @param \PriyankJivani\AdminProductNotes\Api\Data\NoteItemInterface[] $notes
     * @return $this
     */
    public function setNotes($notes);
}