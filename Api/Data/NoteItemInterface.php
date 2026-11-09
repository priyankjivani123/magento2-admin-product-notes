<?php
/**
 * Copyright © Priyank Jivani  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Priyank\ProductNotes\Api\Data;

interface NoteItemInterface
{
    const TITLE = 'title';
    const DETAILS = 'details';

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Get details
     * @return string|null
     */
    public function getDetails();

    /**
     * Set details
     * @param string $details
     * @return $this
     */
    public function setDetails($details);
}