<?php

declare(strict_types=1);

namespace App\Visitor;

use App\Entity\Book;
use App\Entity\Journal;

final class AuthorFinderVisitor implements PublicationVisitorInterface
{
    private string $author;
    private array $filteredPublications = [];

    public function __construct(string $author)
    {
        $this->author = $author;
    }

    public function visitJournal(Journal $journal): void
    {
        $articles = $journal->getArticles();

        foreach ($articles as $article) {
            if (in_array($this->author, $article->getAuthors())) {
                $this->filteredPublications['articles'][] = $article;
            }
        }
    }

    public function visitBook(Book $book): void
    {
        if (in_array($this->author, $book->getAuthors())) {
            $this->filteredPublications['books'][] = $book;
        }
    }

    public function filterAuthorPublication(): array
    {
        return $this->filteredPublications;
    }
}
