<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OtherGeocoderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param = array(
            "address"=>"76 Buckingham Palace Road London SW1W 9TQ",
            "components"=>"country:GB"
        );
//$param = array("latlng"=>"40.714224,-73.961452");

        $response = \Geocoder::geocode('json', $param);
        dd($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
