<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;
use DB;

class StationController extends Controller
{
    public function index()
    {
        return Station::all();
    }

    public function show($id)
    {
        return Station::find($id);
    }

    public function store(Request $request)
    {
        return Station::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $station = Station::findOrFail($id);
        $station->update($request->all());

        return $station;
    }

    public function delete(Request $request, $id)
    {
        $station = Station::findOrFail($id);
        $station->delete();

        return 204;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function showDistance(Request $request)
    {
        $allStations = Station::all();

        $lat1 = $request->post('lat');
        $long1 = $request->post('long');

        //$myDistance = $this->distance($lat1,$long1,$lat2,$long2, 'K');

        $i=0;
        $stationData = [];
        foreach ($allStations as $thisStation)
        {
            $stationData[] = [
                'id' => $thisStation->id,
                'lat' => $thisStation->lat,
                'long' => $thisStation->long,
                'company_id' => $thisStation->company_id,
                'distance' => $this->distance($lat1,$long1,$thisStation->lat,$thisStation->long, 'K')
            ];

        }

        usort($stationData, function($a, $b) {
            return $a['distance'] <=> $b['distance'];
        });

        return $stationData;

    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

}
