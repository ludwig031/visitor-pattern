<?php

declare(strict_types=1);

namespace App\Tests\Visitor;

use App\Entity\Article;
use App\Entity\Book;
use App\Entity\Journal;
use App\Visitor\AuthorFinderVisitor;
use PHPUnit\Framework\TestCase;

class AuthorFinderVisitorTest extends TestCase
{
    public function testFindAuthorPublications(): void
    {
        $publications = [
            new Book(5, ['foo', 'bar', 'baz']),
            new Book(5, ['bar']),
            new Book(5, ['foo', 'baz']),
            new Journal([
                new Article(6, ['foo', 'bar']),
                new Article(6, ['baz']),
                new Article(6, ['foo', 'baz']),
            ])
        ];

        $author = 'foo';

        $visitor = new AuthorFinderVisitor($author);

        foreach ($publications as $publication) {
            $publication->accept($visitor);
        }

        $this->assertCount(2, $visitor->filterAuthorPublication()['books']);
        $this->assertCount(2, $visitor->filterAuthorPublication()['articles']);
    }

}
