# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.1.1] - 2020-05-28
### Updated
- Backlinks in the documentation should now point to correct locations

## [2.1.0] - 2020-05-28
### Added
- Ability to get all stations returned as a collection, use method getAllStations()
- Added examples for getAllStations() in the README

## [2.0.1] - 2020-05-27
### Updated 
- Removed duplicate import on CafcpStatusFactoryTest

## [2.0.0] - 2020-05-27
### Updated
- Use PHP 7.4
- Enable use in Laravel 7
- Update existing tests to not use mock (for now)
- Remove GuzzleHTTP dependency
- Use collections when returning data, removes need to access array elements

## [1.0.0] - 2019-10-10
### Added
- Initial release

[Unreleased]: https://github.com/mechawrench/cafcp-hydrogen-station-fuel-status/compare/v2.1.1...HEAD
[2.1.1]: https://github.com/mechawrench/cafcp-hydrogen-station-fuel-status/compare/v2.1.0...v2.1.1
[2.1.0]: https://github.com/mechawrench/cafcp-hydrogen-station-fuel-status/compare/v2.0.1...v2.1.0
[2.0.1]: https://github.com/mechawrench/cafcp-hydrogen-station-fuel-status/compare/v2.0.0...v2.0.1
[2.0.0]: https://github.com/mechawrench/cafcp-hydrogen-station-fuel-status/compare/1.0.0...v2.0.0
[1.0.0]: https://github.com/mechawrench/cafcp-hydrogen-station-fuel-status/releases/tag/1.0.0
