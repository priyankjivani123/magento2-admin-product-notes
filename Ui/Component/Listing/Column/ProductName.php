<?php
declare(strict_types=1);

namespace PriyankJivani\AdminProductNotes\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductName extends Column
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param ProductRepository $productRepository
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        ProductRepository $productRepository,
        array $components = [],
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['product_id']) && $item['product_id']) {
                    try {
                        $product = $this->productRepository->getById($item['product_id']);
                        $item[$this->getData('name')] = $product->getName();
                    } catch (NoSuchEntityException $e) {
                        $item[$this->getData('name')] = __('Product Not Found');
                    }
                } else {
                    $item[$this->getData('name')] = __('N/A');
                }
            }
        }

        return $dataSource;
    }
}