<?php

declare(strict_types=1);

namespace CityFinder\Domain;

interface Source
{
    public function readAll(int $startPosition, int $linesCount): array;

    public function count(): int;
}
