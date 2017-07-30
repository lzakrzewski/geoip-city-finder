<?php

declare(strict_types=1);

namespace CityFinder\Domain;

interface CityFinder
{
    public function find(string $ip): string;
}
