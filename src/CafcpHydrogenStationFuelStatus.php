<?php

namespace Mechawrench\CafcpHydrogenStationFuelStatus;

class CafcpHydrogenStationFuelStatus
{
    const API_ENDPOINT = 'https://m.cafcp.org/nocache/soss2-statusfile.json';

    /** @test */
    public static function getStationStatus($station_name = null)
    {
        $station_list = file_get_contents(self::API_ENDPOINT);

        $stations = json_decode($station_list);

        foreach ($stations as $station) {
            if ($station->node->title == $station_name) {
                $collection = collect([
                    (object) [
                        'station' => $station->node->title,
                        'statusH70' => $station->node->status70,
                        'capacityH70' => $station->node->capacity70,
                        'statusH35' => $station->node->status35,
                        'capacityH35' => $station->node->capacity35,
                    ],
                ]);

                return $collection->first();
            }
        }

        return ['status' => 'Station not found with that name.'];
    }

    /** @test */
    public static function getAllStations()
    {
        $station_list = file_get_contents(self::API_ENDPOINT);

        $stations = json_decode($station_list);

        $collection = collect();

        foreach ($stations as $station) {
            $collection->push(
                (object) [
                        'station' => $station->node->title,
                        'statusH70' => $station->node->status70,
                        'capacityH70' => $station->node->capacity70,
                        'statusH35' => $station->node->status35,
                        'capacityH35' => $station->node->capacity35,
                    ]
            );
        }

        return $collection;
    }
}
