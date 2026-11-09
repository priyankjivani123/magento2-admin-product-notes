<?php
/**
 * Copyright © Priyank Jivani  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Priyank\ProductNotes\Model;

use Magento\Framework\Model\AbstractModel;
use Priyank\ProductNotes\Api\Data\ProductNotesInterface;

class ProductNotes extends AbstractModel implements ProductNotesInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Priyank\ProductNotes\Model\ResourceModel\ProductNotes::class);
    }

    /**
     * @inheritDoc
     */
    public function getProductnotesId()
    {
        return $this->getData(self::PRODUCTNOTES_ID);
    }

    /**
     * @inheritDoc
     */
    public function setProductnotesId($productnotesId)
    {
        return $this->setData(self::PRODUCTNOTES_ID, $productnotesId);
    }

    /**
     * @inheritDoc
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * @inheritDoc
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * @inheritDoc
     */
    public function getNoteTitle()
    {
        return $this->getData(self::NOTE_TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setNoteTitle($noteTitle)
    {
        return $this->setData(self::NOTE_TITLE, $noteTitle);
    }

    /**
     * @inheritDoc
     */
    public function getNoteDetails()
    {
        return $this->getData(self::NOTE_DETAILS);
    }

    /**
     * @inheritDoc
     */
    public function setNoteDetails($noteDetails)
    {
        return $this->setData(self::NOTE_DETAILS, $noteDetails);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}

