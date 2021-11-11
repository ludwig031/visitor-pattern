<?php

declare(strict_types=1);

namespace App\Entity;

use App\Visitor\PublicationVisitorInterface;

interface PublicationInterface
{
    public function accept(PublicationVisitorInterface $visitor);
}
