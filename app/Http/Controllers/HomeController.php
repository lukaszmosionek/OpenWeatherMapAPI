<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\OpenWeatherMapAPI;



class HomeController extends Controller
{
    public function index(){

        $city = City::where('name', 'Warszawa')->first();

        $temp = new OpenWeatherMapAPI();
        $temp->setLatitude( $city->latitude );
        $temp->setLongitude( $city->longitude );
        $temp->setUnits( $city->units );
        $temp = $temp->exec();

        return view('home', [ 'temp' => $temp, 'city' => $city ] );

    }



}
