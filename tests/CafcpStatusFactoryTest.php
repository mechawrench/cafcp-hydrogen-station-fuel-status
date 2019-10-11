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

        $should_match = collect([
            'station' => 'Diamond Bar',
            'statusH70' => 'offline',
            'capacityH70' => '0 kg',
            'statusH35' => 'offline',
            'capacityH35' => '0 kg',
        ]);

        $this->assertEquals($station_status, $should_match);
    }

    /** @test */
    public function the_fuel_station_should_return_an_array_with_same_title_as_name()
    {
        $stations = new CafcpHydrogenStationFuelStatus();

        $station_status = $stations->getStationStatus('Diamond Bar');

        $this->assertArrayHasKey('station', $station_status);
    }

    /** @test */
    public function it_handles_station_name_missing_from_api()
    {
        $stations = new CafcpHydrogenStationFuelStatus();

        $station_status = $stations->getStationStatus('Fake Station here');

        $this->assertArrayHasKey('status', $station_status);
    }

    /** @test */
    public function it_uses_facade_to_get_data()
    {
        $stations = new CafcpHydrogenStationFuelStatus();

        $station_status = CafcpHydrogenStationFuelStatus::getStationStatus('Diamond Bar');

        $this->assertArrayHasKey('station', $station_status);
    }
}
