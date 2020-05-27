<?php

namespace Mechawrench\CafcpHydrogenStationFuelStatus\Tests;

use PHPUnit\Framework\TestCase;
use Mechawrench\CafcpHydrogenStationFuelStatus\CafcpHydrogenStationFuelStatus;

class CafcpStatusFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_station_status()
    {
        $stations = new CafcpHydrogenStationFuelStatus();

        $station_status = $stations->getStationStatus('Diamond Bar');

        $this->assertEquals($station_status->station, 'Diamond Bar');
    }

    /** @test */
    public function it_handles_station_name_missing_from_api()
    {
        $stations = new CafcpHydrogenStationFuelStatus();

        $station_status = $stations->getStationStatus('Fake Station here');

        $this->assertArrayHasKey('status', $station_status);
        $this->assertEquals(["status" => "Station not found with that name."], $station_status);
    }

    /** @test */
    public function it_uses_facade_to_get_data()
    {
        $station_status = CafcpHydrogenStationFuelStatus::getStationStatus('Diamond Bar');

        $this->assertEquals('Diamond Bar', $station_status->station);
    }
}
