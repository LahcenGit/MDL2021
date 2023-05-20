<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleMapsController extends Controller
{
    public function obtenirItineraire()
    {
        $latitudeDepart = 34.880705155626124;
        $longitudeDepart = -1.3337064184766843;

        $latitudeArrivee = 34.922806143127694;
        $longitudeArrivee = -1.3308486820218486;
        
        $url = 'https://www.google.com/maps/dir/' . $latitudeDepart . ',' . $longitudeDepart . '/' . $latitudeArrivee . ',' . $longitudeArrivee;

        return redirect()->away($url);
    }
}
