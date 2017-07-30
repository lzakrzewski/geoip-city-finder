<?php

declare(strict_types=1);

namespace tests\unit\CityFinder\Application;

use CityFinder\Application\FindCityByIpAddressUseCase;
use CityFinder\Domain\CityFinder;
use CityFinder\Domain\Destination;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

class FindCityByIpAddressUseCaseTest extends TestCase
{
    /** @var Destination|ObjectProphecy */
    private $destination;

    /** @var CityFinder|ObjectProphecy */
    private $finder;

    /** @var FindCityByIpAddressUseCase */
    private $useCase;

    /** @test */
    public function it_can_store_city_when_it_was_found()
    {
        $this->finder
            ->find('162.111.111.111')
            ->willReturn('Alabama');

        $this->useCase->find('162.111.111.111');

        $this->destination
            ->store('162.111.111.111', 'Alabama')
            ->shouldBeCalled();
    }

    /** {@inheritdoc} */
    protected function setUp()
    {
        $this->destination = $this->prophesize(Destination::class);
        $this->finder = $this->prophesize(CityFinder::class);

        $this->useCase = new FindCityByIpAddressUseCase($this->destination->reveal(), $this->finder->reveal());
    }

    /** {@inheritdoc} */
    protected function tearDown()
    {
        $this->destination = null;
        $this->finder = null;

        $this->useCase = null;
    }
}
