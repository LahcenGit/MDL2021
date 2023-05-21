<?php

namespace App\Http\Controllers;

use App\Models\Professionnel;
use Illuminate\Http\Request;

class GoogleMapsController extends Controller
{
    public function obtenirItineraire($id,$latitude,$longitude)
    {

        $pro = Professionnel::find($id);

        $latitudeDepart = $latitude;
        $longitudeDepart = $longitude;

        $latitudeArrivee = $pro->latitude;
        $longitudeArrivee = $pro->longitude;
        
        $url = 'https://www.google.com/maps/dir/' . $latitudeDepart . ',' . $longitudeDepart . '/' . $latitudeArrivee . ',' . $longitudeArrivee;



        return $url;
    }
}
