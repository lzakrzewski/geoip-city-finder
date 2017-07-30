<?php

declare(strict_types=1);

namespace CityFinder\Application;

use CityFinder\Domain\CityFinder;
use CityFinder\Domain\Destination;

class FindCityByIpAddressUseCase
{
    /** @var Destination */
    private $destination;

    /** @var CityFinder */
    private $finder;

    /**
     * @param Destination $destination
     * @param CityFinder  $finder
     */
    public function __construct(Destination $destination, CityFinder $finder)
    {
        $this->destination = $destination;
        $this->finder      = $finder;
    }

    /**
     * @param string $ipAddress
     */
    public function find(string $ipAddress): void
    {
        $city = $this->finder->find($ipAddress);

        $this->destination->store($ipAddress, $city);
    }
}
