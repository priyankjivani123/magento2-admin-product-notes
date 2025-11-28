<?php

namespace Vendor\ProductNotes\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class ProductList implements OptionSourceInterface
{
    protected $productCollectionFactory;

    public function __construct(
        CollectionFactory $productCollectionFactory
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
    }

    public function toOptionArray()
    {
        $options = [];

        $collection = $this->productCollectionFactory->create()
            ->addAttributeToSelect('name')
            ->setPageSize(200); // limit results (optional)

        foreach ($collection as $product) {
            $options[] = [
                'value' => $product->getId(),
                'label' => $product->getName()
            ];
        }

        return $options;
    }
}
