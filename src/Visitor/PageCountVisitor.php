<?php

declare(strict_types=1);

namespace App\Visitor;

use App\Entity\Book;
use App\Entity\Journal;

final class PageCountVisitor implements PublicationVisitorInterface
{
    public function visitJournal(Journal $journal): int
    {
        $count = 0;

        foreach ($journal->getArticles() as $article) {
            $count += $article->getPageCount();
        }

        return $count;
    }

    public function visitBook(Book $book): int
    {
        return $book->getPageCount();
    }
}
