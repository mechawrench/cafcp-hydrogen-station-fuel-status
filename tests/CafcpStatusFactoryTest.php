<?php

namespace Mechawrench\CafcpHydrogenStationFuelStatus\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Mechawrench\CafcpHydrogenStationFuelStatus\CafcpHydrogenStationFuelStatus;
use PHPUnit\Framework\TestCase;

class CafcpStatusFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_station_status()
    {
        $mock = new MockHandler([
            new Response(200, [], '[{"node":{"nid":"15527","title":"Anaheim","station":"15021","status35":"offline","status70":"limited","enabled35":false,"enabled70":true,"capacity35":"34 kg","capacity70":"34 kg","modified":"1570750005","stationHours":[]}},{"node":{"nid":"15531","title":"Diamond Bar","station":"15004","status35":"offline","status70":"offline","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"0 kg","modified":"1570749989","stationHours":[]}},{"node":{"nid":"15532","title":"Fairfax-LA","station":"14999","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"163 kg","capacity70":"161 kg","modified":"1570749990","stationHours":[]}},{"node":{"nid":"15537","title":"Lake Forest","station":"15039","status35":"offline","status70":"offline","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"0 kg","modified":"1570749923","stationHours":[]}},{"node":{"nid":"15542","title":"Riverside","station":"15046","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"62 kg","capacity70":"62 kg","modified":"1570749643","stationHours":[]}},{"node":{"nid":"15544","title":"San Juan Capistrano","station":"15005","status35":"limited","status70":"limited","enabled35":false,"enabled70":true,"capacity35":"41 kg","capacity70":"41 kg","modified":"1570750006","stationHours":[]}},{"node":{"nid":"15546","title":"Santa Monica","station":"14996","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"201 kg","capacity70":"198 kg","modified":"1570749990","stationHours":[]}},{"node":{"nid":"15550","title":"UC Irvine","station":"15007","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"70 kg","capacity70":"68 kg","modified":"1570749989","stationHours":[]}},{"node":{"nid":"15551","title":"West LA","station":"15000","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"133 kg","capacity70":"131 kg","modified":"1570749977","stationHours":[]}},{"node":{"nid":"15552","title":"West Sacramento","station":"15006","status35":"limited","status70":"limited","enabled35":true,"enabled70":true,"capacity35":"61 kg","capacity70":"61 kg","modified":"1570749936","stationHours":[]}},{"node":{"nid":"15553","title":"Woodland Hills","station":"15014","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"58 kg","capacity70":"55 kg","modified":"1570749988","stationHours":[{"day":"0","starthours":"600","endhours":"2200","comment":""},{"day":"1","starthours":"600","endhours":"2200","comment":""},{"day":"2","starthours":"600","endhours":"2200","comment":""},{"day":"3","starthours":"600","endhours":"2200","comment":""},{"day":"4","starthours":"600","endhours":"2200","comment":""},{"day":"5","starthours":"600","endhours":"2200","comment":""},{"day":"6","starthours":"600","endhours":"2200","comment":""}]}},{"node":{"nid":"15564","title":"Lawndale","station":"15003","status35":"limited","status70":"limited","enabled35":true,"enabled70":true,"capacity35":"2 kg","capacity70":"2 kg","modified":"1570749990","stationHours":[]}},{"node":{"nid":"15587","title":"San Ramon","station":"15030","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"47 kg","capacity70":"47 kg","modified":"1570749954","stationHours":[]}},{"node":{"nid":"15663","title":"Mountain View","station":"15010","status35":"offline","status70":"online","enabled35":true,"enabled70":true,"capacity35":"42 kg","capacity70":"42 kg","modified":"1570749953","stationHours":[{"day":"0","starthours":"600","endhours":"2200","comment":""},{"day":"1","starthours":"600","endhours":"2200","comment":""},{"day":"2","starthours":"600","endhours":"2200","comment":""},{"day":"3","starthours":"600","endhours":"2200","comment":""},{"day":"4","starthours":"600","endhours":"2200","comment":""},{"day":"5","starthours":"600","endhours":"2200","comment":""},{"day":"6","starthours":"600","endhours":"2200","comment":""}]}},{"node":{"nid":"15666","title":"El Pueblo de Nuestra Señora la Reina de los Ángeles del Río de Porciúncula currently known as the City of Los Angeles in the County of Los Angeles in the State of California United States of America","station":"15459","status35":"offline","status70":"offline","enabled35":false,"enabled70":false,"capacity35":"200 kg","capacity70":"200 kg","modified":"1570749901","stationHours":[]}},{"node":{"nid":"15667","title":"Test Cafcp Legacy Station","station":"15460","status35":"online","status70":"online","enabled35":false,"enabled70":false,"capacity35":"200 kg","capacity70":"200 kg","modified":"1570749901","stationHours":[]}},{"node":{"nid":"15824","title":"Palo Alto","station":"15026","status35":"offline","status70":"offline","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"0 kg","modified":"1570750007","stationHours":[{"day":"0","starthours":"600","endhours":"2200","comment":""},{"day":"1","starthours":"600","endhours":"2200","comment":""},{"day":"2","starthours":"600","endhours":"2200","comment":""},{"day":"3","starthours":"600","endhours":"2200","comment":""},{"day":"4","starthours":"600","endhours":"2200","comment":""},{"day":"5","starthours":"600","endhours":"2200","comment":""},{"day":"6","starthours":"600","endhours":"2200","comment":""}]}},{"node":{"nid":"15825","title":"LAX","station":"15015","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"107 kg","capacity70":"107 kg","modified":"1570750009","stationHours":[]}},{"node":{"nid":"15528","title":"Campbell","station":"15022","status35":"offline","status70":"limited","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"3 kg","modified":"1570749848","stationHours":[]}},{"node":{"nid":"15529","title":"Costa Mesa","station":"15036","status35":"offline","status70":"online","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"41 kg","modified":"1570749820","stationHours":[]}},{"node":{"nid":"15530","title":"Del Mar","station":"15047","status35":"offline","status70":"online","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"36 kg","modified":"1570749816","stationHours":[]}},{"node":{"nid":"15533","title":"Harris Ranch","station":"15035","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"93 kg","capacity70":"84 kg","modified":"1570749826","stationHours":[]}},{"node":{"nid":"15534","title":"Hayward","station":"15023","status35":"offline","status70":"offline","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"0 kg","modified":"1570749824","stationHours":[]}},{"node":{"nid":"15535","title":"Hollywood","station":"15041","status35":"offline","status70":"online","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"104 kg","modified":"1570749806","stationHours":[]}},{"node":{"nid":"15536","title":"La Canada Flintridge","station":"15037","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"50 kg","capacity70":"41 kg","modified":"1570749822","stationHours":[]}},{"node":{"nid":"15538","title":"Lake Tahoe-Truckee","station":"15033","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"125 kg","capacity70":"116 kg","modified":"1570749828","stationHours":[]}},{"node":{"nid":"15540","title":"Mill Valley","station":"15024","status35":"offline","status70":"offline","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"0 kg","modified":"1570749840","stationHours":[]}},{"node":{"nid":"15541","title":"Playa Del Rey","station":"15042","status35":"offline","status70":"online","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"102 kg","modified":"1570749808","stationHours":[]}},{"node":{"nid":"15543","title":"San Jose","station":"15029","status35":"offline","status70":"online","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"88 kg","modified":"1570749842","stationHours":[]}},{"node":{"nid":"15545","title":"Santa Barbara","station":"15048","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"62 kg","capacity70":"53 kg","modified":"1570749838","stationHours":[]}},{"node":{"nid":"15692","title":"SOSS Test XML","station":"15691","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"300 kg","capacity70":"300 kg","modified":1570749602,"stationHours":[]}},{"node":{"nid":"15697","title":"SOSS Test XML 2","station":"15696","status35":"online","status70":"online","enabled35":"1","enabled70":"1","capacity35":"600 kg","capacity70":"600 kg","modified":1570749602,"stationHours":[]}},{"node":{"nid":"15547","title":"Saratoga","station":"15031","status35":"online","status70":"offline","enabled35":true,"enabled70":true,"capacity35":"135 kg","capacity70":"0 kg","modified":"1570749810","stationHours":[{"day":"0","starthours":"700","endhours":"2100","comment":""},{"day":"1","starthours":"600","endhours":"2100","comment":""},{"day":"2","starthours":"600","endhours":"2100","comment":""},{"day":"3","starthours":"600","endhours":"2100","comment":""},{"day":"4","starthours":"600","endhours":"2100","comment":""},{"day":"5","starthours":"600","endhours":"2100","comment":""},{"day":"6","starthours":"700","endhours":"2100","comment":""}]}},{"node":{"nid":"15548","title":"South Pasadena","station":"15049","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"57 kg","capacity70":"48 kg","modified":"1570749832","stationHours":[{"day":"0","starthours":"600","endhours":"2200","comment":""},{"day":"1","starthours":"600","endhours":"2200","comment":""},{"day":"2","starthours":"600","endhours":"2200","comment":""},{"day":"3","starthours":"600","endhours":"2200","comment":""},{"day":"4","starthours":"600","endhours":"2200","comment":""},{"day":"5","starthours":"600","endhours":"2200","comment":""},{"day":"6","starthours":"600","endhours":"2200","comment":""}]}},{"node":{"nid":"15549","title":"South San Francisco","station":"15032","status35":"offline","status70":"offline","enabled35":true,"enabled70":true,"capacity35":"0 kg","capacity70":"0 kg","modified":"1570749830","stationHours":[]}},{"node":{"nid":"15566","title":"Long Beach","station":"15040","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"20 kg","capacity70":"11 kg","modified":"1570749818","stationHours":[]}},{"node":{"nid":"15574","title":"Zaventem","station":"15573","status35":"offline","status70":"offline","enabled35":false,"enabled70":false,"capacity35":"94 kg","capacity70":"94 kg","modified":"1570749813","stationHours":[]}},{"node":{"nid":"15579","title":"Alma","station":"15578","status35":"limited","status70":"offline","enabled35":false,"enabled70":true,"capacity35":"1 kg","capacity70":"0 kg","modified":"1570749813","stationHours":[]}},{"node":{"nid":"15580","title":"Rhoon","station":"15576","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"72 kg","capacity70":"72 kg","modified":"1570749813","stationHours":[]}},{"node":{"nid":"15581","title":"Grenoble","station":"15577","status35":"offline","status70":"limited","enabled35":true,"enabled70":false,"capacity35":"20 kg","capacity70":"20 kg","modified":"1570749813","stationHours":[]}},{"node":{"nid":"15596","title":"Torrance","station":"15595","status35":"offline","status70":"offline","enabled35":true,"enabled70":true,"capacity35":"H2 Pipeline","capacity70":"H2 Pipeline","modified":"1570749844","stationHours":[]}},{"node":{"nid":"15602","title":"Fremont","station":"15280","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"72 kg","capacity70":"63 kg","modified":"1570749814","stationHours":[]}},{"node":{"nid":"15610","title":"Paris - Orly","station":"15609","status35":"online","status70":"online","enabled35":false,"enabled70":false,"capacity35":"90 kg","capacity70":"90 kg","modified":"1570749813","stationHours":[]}},{"node":{"nid":"15668","title":"Cal State LA","station":"14972","status35":"online","status70":"online","enabled35":false,"enabled70":false,"capacity35":"0 kg","capacity70":"0 kg","modified":"1570749961","stationHours":[]}},{"node":{"nid":"15678","title":"Thousand Oaks","station":"15281","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"125 kg","capacity70":"116 kg","modified":"1570749834","stationHours":[]}},{"node":{"nid":"15759","title":"Emeryville","station":"15688","status35":"offline","status70":"offline","enabled35":true,"enabled70":true,"capacity35":"46 kg","capacity70":"46 kg","modified":"1562753440","stationHours":[]}},{"node":{"nid":"15823","title":"Citrus Heights","station":"15488","status35":"offline","status70":"online","enabled35":"0","enabled70":"1","capacity35":"0 kg","capacity70":"109 kg","modified":1570750000,"stationHours":[]}},{"node":{"nid":"15886","title":"Sacramento","station":"15486","status35":"offline","status70":"offline","enabled35":"0","enabled70":"1","capacity35":"0 kg","capacity70":"41 kg","modified":1570750002,"stationHours":[]}},{"node":{"nid":"15555","title":"Newport Beach","station":"14995","status35":"offline","status70":"offline","enabled35":false,"enabled70":true,"capacity35":"N/A","capacity70":"N/A","modified":"1560765690","stationHours":[]}},{"node":{"nid":"15675","title":"Ontario","station":"15043","status35":"offline","status70":"offline","enabled35":true,"enabled70":true,"capacity35":"80 kg","capacity70":"60 kg","modified":"1551307501","stationHours":[]}},{"node":{"nid":"15928","title":"Oakland - Grand Ave","station":"15483","status35":"online","status70":"online","enabled35":true,"enabled70":true,"capacity35":"674.05 kg","capacity70":"674.05 kg","modified":"1570749846","stationHours":[]}},{"node":{"nid":"15934","title":"San Francisco - Harrison St","station":"15478","status35":"offline","status70":"offline","enabled35":"1","enabled70":"1","capacity35":"0 kg","capacity70":"82 kg","modified":1570750010,"stationHours":[]}},{"node":{"nid":"15937","title":"San Francisco - Mission St","station":"15477","status35":"offline","status70":"offline","enabled35":"0","enabled70":"1","capacity35":"0 kg","capacity70":"79 kg","modified":1570750007,"stationHours":[]}},{"node":{"nid":"15939","title":"San Francisco - Third St","station":"15476","status35":"offline","status70":"offline","enabled35":"0","enabled70":"1","capacity35":"0 kg","capacity70":"93 kg","modified":1570750005,"stationHours":[]}}]'),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $stations = new CafcpHydrogenStationFuelStatus($client);

        $station_status = $stations->getStationStatus('Diamond Bar');

        $should_match = collect([
            'station'     => 'Diamond Bar',
            'statusH70'   => 'offline',
            'capacityH70' => '0 kg',
            'statusH35'   => 'offline',
            'capacityH35' => '0 kg',
        ]);

        $this->assertEquals($station_status, $should_match);
    }

    /** @test */
    public function the_fuel_station_should_return_an_array_with_same_title_as_name()
    {
        $stations = new CafcpHydrogenStationFuelStatus();

        $station_status = $stations->getStationStatus('Diamond Bar');

        $this->assertEquals($station_status['station'], 'Diamond Bar');
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

        $this->assertArrayHasKey('station', $station_status);
    }
}
