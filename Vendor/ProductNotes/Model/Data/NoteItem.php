<?php
/**
 * Copyright © Nirmit  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Vendor\ProductNotes\Model\Data;

use Magento\Framework\Api\AbstractSimpleObject;
use Vendor\ProductNotes\Api\Data\NoteItemInterface;

class NoteItem extends AbstractSimpleObject implements NoteItemInterface
{
    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * @inheritdoc
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @inheritdoc
     */
    public function getDetails()
    {
        return $this->_get(self::DETAILS);
    }

    /**
     * @inheritdoc
     */
    public function setDetails($details)
    {
        return $this->setData(self::DETAILS, $details);
    }
}