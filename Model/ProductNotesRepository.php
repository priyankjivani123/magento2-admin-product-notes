<?php
/**
 * Copyright © Priyank Jivani  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Priyank\ProductNotes\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Priyank\ProductNotes\Api\Data\ProductNotesInterface;
use Priyank\ProductNotes\Api\Data\ProductNotesInterfaceFactory;
use Priyank\ProductNotes\Api\Data\ProductNotesSearchResultsInterfaceFactory;
use Priyank\ProductNotes\Api\ProductNotesRepositoryInterface;
use Priyank\ProductNotes\Model\ResourceModel\ProductNotes as ResourceProductNotes;
use Priyank\ProductNotes\Model\ResourceModel\ProductNotes\CollectionFactory as ProductNotesCollectionFactory;
use Priyank\ProductNotes\Api\Data\ProductNotesResponseInterfaceFactory;
use Priyank\ProductNotes\Api\Data\NoteItemInterfaceFactory;

class ProductNotesRepository implements ProductNotesRepositoryInterface
{

    /**
     * @var ResourceProductNotes
     */
    protected $resource;

    /**
     * @var ProductNotesCollectionFactory
     */
    protected $productNotesCollectionFactory;

    /**
     * @var ProductNotes
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ProductNotesInterfaceFactory
     */
    protected $productNotesFactory;

     /**
     * @var ProductNotesResponseInterfaceFactory
     */
    protected $responseFactory;
    
    /**
     * @var NoteItemInterfaceFactory
     */
    protected $noteItemFactory;
    
    /**
     * @param ResourceProductNotes $resource
     * @param ProductNotesInterfaceFactory $productNotesFactory
     * @param ProductNotesCollectionFactory $productNotesCollectionFactory
     * @param ProductNotesSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param ProductNotesResponseInterfaceFactory $responseFactory
     * @param NoteItemInterfaceFactory $noteItemFactory

     */
    public function __construct(
        ResourceProductNotes $resource,
        ProductNotesInterfaceFactory $productNotesFactory,
        ProductNotesCollectionFactory $productNotesCollectionFactory,
        ProductNotesSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor,
        ProductNotesResponseInterfaceFactory $responseFactory,
        NoteItemInterfaceFactory $noteItemFactory

    ) {
        $this->resource = $resource;
        $this->productNotesFactory = $productNotesFactory;
        $this->productNotesCollectionFactory = $productNotesCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->responseFactory = $responseFactory;
        $this->noteItemFactory = $noteItemFactory;

    }

    /**
     * @inheritDoc
     */
    public function save(ProductNotesInterface $productNotes)
    {
        try {
            $this->resource->save($productNotes);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the productNotes: %1',
                $exception->getMessage()
            ));
        }
        return $productNotes;
    }

    /**
     * @inheritDoc
     */
    public function get($productNotesId)
    {
        $productNotes = $this->productNotesFactory->create();
        $this->resource->load($productNotes, $productNotesId);
        if (!$productNotes->getId()) {
            throw new NoSuchEntityException(__('ProductNotes with id "%1" does not exist.', $productNotesId));
        }
        return $productNotes;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->productNotesCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(ProductNotesInterface $productNotes)
    {
        try {
            $productNotesModel = $this->productNotesFactory->create();
            $this->resource->load($productNotesModel, $productNotes->getProductnotesId());
            $this->resource->delete($productNotesModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the ProductNotes: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($productNotesId)
    {
        return $this->delete($this->get($productNotesId));
    }

     /**
     * @inheritDoc
     */
    public function getByProductId($productId)
    {
        $collection = $this->productNotesCollectionFactory->create();
        $collection->addFieldToFilter('product_id', $productId);

        $notes = [];
        foreach ($collection as $note) {
            $noteItem = $this->noteItemFactory->create();
            $noteItem->setTitle($note->getNoteTitle());
            $noteItem->setDetails($note->getNoteDetails());
            $notes[] = $noteItem;
        }

        $response = $this->responseFactory->create();
        $response->setProductId((int)$productId);
        $response->setNotes($notes);

        return $response;
    }
}

