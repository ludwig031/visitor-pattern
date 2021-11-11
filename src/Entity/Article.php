<?php

declare(strict_types=1);

namespace App\Entity;

final class Article extends Journal
{
    private array $authors;
    private int $pageCount;

    public function __construct(int $pageCount, array $authors = [])
    {
        $this->pageCount = $pageCount;
        $this->authors = $authors;
    }

    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function setAuthors(array $authors): void
    {
        $this->authors = $authors;
    }

    public function getPageCount(): int
    {
        return $this->pageCount;
    }

    public function setPageCount(int $pageCount): void
    {
        $this->pageCount = $pageCount;
    }



}
