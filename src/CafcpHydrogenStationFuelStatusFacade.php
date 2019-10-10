<?php

namespace Mechawrench\CafcpHydrogenStationFuelStatus;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mechawrench\CafcpHydrogenStationFuelStatus\Skeleton\SkeletonClass
 */
class CafcpHydrogenStationFuelStatusFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cafcp-hydrogen-station-fuel-status';
    }
}
