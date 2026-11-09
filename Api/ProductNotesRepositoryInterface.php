<?php
/**
 * Copyright © Priyank Jivani  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Priyank\ProductNotes\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ProductNotesRepositoryInterface
{

    /**
     * Save ProductNotes
     * @param \Priyank\ProductNotes\Api\Data\ProductNotesInterface $productNotes
     * @return \Priyank\ProductNotes\Api\Data\ProductNotesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Priyank\ProductNotes\Api\Data\ProductNotesInterface $productNotes
    );

    /**
     * Retrieve ProductNotes
     * @param string $productnotesId
     * @return \Priyank\ProductNotes\Api\Data\ProductNotesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($productnotesId);

    /**
     * Retrieve ProductNotes matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Priyank\ProductNotes\Api\Data\ProductNotesSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete ProductNotes
     * @param \Priyank\ProductNotes\Api\Data\ProductNotesInterface $productNotes
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Priyank\ProductNotes\Api\Data\ProductNotesInterface $productNotes
    );

    /**
     * Delete ProductNotes by ID
     * @param string $productnotesId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($productnotesId);

    /**
     * Get product notes by product ID
     * @param int $productId
     * @return \Priyank\ProductNotes\Api\Data\ProductNotesResponseInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getByProductId($productId);
}

