# CAFCP Hydrogen Station Fuel Status


![cafcp-hydrogen-station-fuel-status Package](https://banners.beyondco.de/cafcp-hydrogen-station-fuel-status.png?theme=light&packageManager=composer+require&packageName=mechawrench%2Fcafcp-hydrogen-station-fuel-status&pattern=cage&style=style_1&description=Hydrogen+fuel+availability+from+CAFCP&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg "cafcp-hydrogen-station-fuel-status Package")

![run-tests](https://github.com/mechawrench/cafcp-hydrogen-station-fuel-status/workflows/run-tests/badge.svg)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/mechawrench/cafcp-hydrogen-station-fuel-status.svg?style=flat-square)](https://packagist.org/packages/mechawrench/cafcp-hydrogen-station-fuel-status)
[![Total Downloads](https://img.shields.io/packagist/dt/mechawrench/cafcp-hydrogen-station-fuel-status.svg?style=flat-square)](https://packagist.org/packages/mechawrench/cafcp-hydrogen-station-fuel-status)


Retrieves the hydrogen station fuel availability status from CAFCP.  Lists both H70 and H35 status and quantity.  This package works with Laravel 7.x.

## Installation

You can install the package via composer:

```bash
composer require mechawrench/cafcp-hydrogen-station-fuel-status
```

## Usage

``` php
// All station actions
$stations = CafcpHydrogenStationFuelStatus::getAllStations();

$stations_offline = $stations->where('statusH70', 'offline')->all();

// Single station actions
// Get Station names from https://cafcp.org/stationmap
$station = CafcpHydrogenStationFuelStatus::getStationStatus('Diamond Bar');

$station_name = $station->station;
$statusH70 = $station->statusH70;
$capacity70 = $station->capacity70;
$statusH35 = $station->statusH35;
$capacityH35 = $station->capacityH35;
```

## Find all locations directly from CAFCP
https://cafcp.org/stationmap

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Mechawrench](https://github.com/mechawrench)
- [All Contributors](../../contributors)

## License
[MIT](https://github.com/mechawrench/cafcp-hydrogen-station-fuel-status/blob/master/LICENSE.md)
