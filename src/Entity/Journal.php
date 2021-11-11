<?php

declare(strict_types=1);

namespace App\Entity;

use App\Visitor\PublicationVisitorInterface;

class Journal implements PublicationInterface
{
    private array $articles;

    public function __construct(array $articles = [])
    {
        $this->articles = $articles;
    }

    public function getArticles(): array
    {
        return $this->articles;
    }

    public function setArticles(array $articles): void
    {
        $this->articles = $articles;
    }

    public function accept(PublicationVisitorInterface $visitor)
    {
        return $visitor->visitJournal($this);
    }
}
