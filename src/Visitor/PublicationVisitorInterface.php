<?php

declare(strict_types=1);

namespace App\Visitor;

use App\Entity\Book;
use App\Entity\Journal;

interface PublicationVisitorInterface
{
    public function visitJournal(Journal $journal);
    public function visitBook(Book $book);
}
