<?php

declare(strict_types=1);

namespace CityFinder\Domain;

interface Destination
{
    public function store(string $ipAddress, string $city): void;
}
