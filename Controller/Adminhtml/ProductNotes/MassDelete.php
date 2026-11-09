<?php
/**
 * Copyright © Priyank Jivani  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Priyank\ProductNotes\Controller\Adminhtml\ProductNotes;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Priyank\ProductNotes\Model\ResourceModel\ProductNotes\CollectionFactory;
use Priyank\ProductNotes\Api\ProductNotesRepositoryInterface;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * Authorization level
     */
    const ADMIN_RESOURCE = 'Priyank_ProductNotes::ProductNotes_delete';

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var ProductNotesRepositoryInterface
     */
    protected $productNotesRepository;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param ProductNotesRepositoryInterface $productNotesRepository
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        ProductNotesRepositoryInterface $productNotesRepository
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->productNotesRepository = $productNotesRepository;
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
        $deletedItems = 0;

        foreach ($collection as $item) {
            try {
                $this->productNotesRepository->delete($item);
                $deletedItems++;
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(
                    __('Error deleting note with ID %1: %2', $item->getId(), $e->getMessage())
                );
            }
        }

        if ($deletedItems > 0) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $deletedItems)
            );
        }

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }

     /**
     * Check ACL permission
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Priyank_ProductNotes::ProductNotes_delete');
    }
}