<?php

declare(strict_types=1);

namespace App\Tests\Visitor;

use App\Entity\Article;
use App\Entity\Book;
use App\Entity\Journal;
use App\Visitor\PageCountVisitor;
use PHPUnit\Framework\TestCase;

class PageCountVisitorTest extends TestCase
{
    public function testVisitBook()
    {
        $book = new Book(30);

        $this->assertSame(30, $book->accept(new PageCountVisitor()));
    }

    public function testVisitJournal()
    {
        $articles = [
            new Article(12),
            new Article(5),
            new Article(3),
            new Article(8),
        ];

        $journal = new Journal($articles);

        $this->assertSame(28, $journal->accept(new PageCountVisitor()));
    }
}
