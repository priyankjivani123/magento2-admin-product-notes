<?php
/**
 * Copyright © Priyank Jivani  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Priyank\ProductNotes\Api\Data;

interface ProductNotesInterface
{

    const NOTE_TITLE = 'note_title';
    const PRODUCT_ID = 'product_id';
    const CREATED_AT = 'created_at';
    const NOTE_DETAILS = 'note_details';
    const PRODUCTNOTES_ID = 'note_id';

    /**
     * Get note_id
     * @return string|null
     */
    public function getProductnotesId();

    /**
     * Set note_id
     * @param string $productnotesId
     * @return \Priyank\ProductNotes\ProductNotes\Api\Data\ProductNotesInterface
     */
    public function setProductnotesId($productnotesId);

    /**
     * Get product_id
     * @return string|null
     */
    public function getProductId();

    /**
     * Set product_id
     * @param string $productId
     * @return \Priyank\ProductNotes\ProductNotes\Api\Data\ProductNotesInterface
     */
    public function setProductId($productId);

    /**
     * Get note_title
     * @return string|null
     */
    public function getNoteTitle();

    /**
     * Set note_title
     * @param string $noteTitle
     * @return \Priyank\ProductNotes\ProductNotes\Api\Data\ProductNotesInterface
     */
    public function setNoteTitle($noteTitle);

    /**
     * Get note_details
     * @return string|null
     */
    public function getNoteDetails();

    /**
     * Set note_details
     * @param string $noteDetails
     * @return \Priyank\ProductNotes\ProductNotes\Api\Data\ProductNotesInterface
     */
    public function setNoteDetails($noteDetails);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Priyank\ProductNotes\ProductNotes\Api\Data\ProductNotesInterface
     */
    public function setCreatedAt($createdAt);
}

