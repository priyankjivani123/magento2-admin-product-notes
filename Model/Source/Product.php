<?php
declare(strict_types=1);

namespace PriyankJivani\AdminProductNotes\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class Product implements OptionSourceInterface
{
    /**
     * @var CollectionFactory
     */
    protected $productCollectionFactory;

    /**
     * @param CollectionFactory $productCollectionFactory
     */
    public function __construct(
        CollectionFactory $productCollectionFactory
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('name')
            ->addAttributeToSelect('sku')
            ->addAttributeToFilter('status', 1); // Only enabled products

        foreach ($collection as $product) {
            $options[] = [
                'label' => $product->getName() . ' (SKU: ' . $product->getSku() . ')',
                'value' => $product->getId()
            ];
        }

        return $options;
    }
}