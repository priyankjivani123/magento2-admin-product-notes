<?php
declare(strict_types=1);

namespace PriyankJivani\AdminProductNotes\Test\Unit\Model;

use PHPUnit\Framework\TestCase;
use PriyankJivani\AdminProductNotes\Model\Data\NoteItem;

class ProductNotesTest extends TestCase
{
    public function testNoteItemGettersAndSetters(): void
    {
        $item = new NoteItem();
        $item->setTitle('Urgent Inspection');
        $item->setDetails('Batch #402 flagged for quality check.');

        $this->assertEquals('Urgent Inspection', $item->getTitle());
        $this->assertEquals('Batch #402 flagged for quality check.', $item->getDetails());
    }

    public function testNoteItemDefaults(): void
    {
        $item = new NoteItem();
        $this->assertNull($item->getTitle());
        $this->assertNull($item->getDetails());
    }
}
