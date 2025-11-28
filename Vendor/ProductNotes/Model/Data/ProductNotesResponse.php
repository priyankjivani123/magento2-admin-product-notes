<?php
/**
 * Copyright © Nirmit  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Vendor\ProductNotes\Model\Data;

use Magento\Framework\Api\AbstractSimpleObject;
use Vendor\ProductNotes\Api\Data\ProductNotesResponseInterface;

class ProductNotesResponse extends AbstractSimpleObject implements ProductNotesResponseInterface
{
    /**
     * @inheritdoc
     */
    public function getProductId()
    {
        return $this->_get(self::PRODUCT_ID);
    }

    /**
     * @inheritdoc
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * @inheritdoc
     */
    public function getNotes()
    {
        return $this->_get(self::NOTES);
    }

    /**
     * @inheritdoc
     */
    public function setNotes($notes)
    {
        return $this->setData(self::NOTES, $notes);
    }
}