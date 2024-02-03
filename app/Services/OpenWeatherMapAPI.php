<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class OpenWeatherMapAPI
{

    private $longitude;
    private $latitude;
    private $units;
    private $APIurl;
    private $cacheTime;

    public function __construct(){
        $this->APIurl = 'https://api.openweathermap.org/data/2.5/weather';
        $this->cacheTime = 10*60; //ten minutes
    }

    public function setLatitude($latitude){
        $this->latitude = $latitude;
    }
    public function setLongitude($longitude){
        $this->longitude = $longitude;
    }
    public function setUnits($units){
        $this->units = $units;
    }

    private function api()
    {

        $response = Http::withQueryParameters([
            'lat' =>   $this->latitude,
            'lon' => $this->longitude,
            'appid' => config('services.OpenWeatherMapAPI.key'),
            'units' => $this->units,
        ])->get( $this->APIurl );

        if( $response->successful() ){
                return (object) [
                    'isOk' => true,
                    'data' => convertArrayToObject( $response->json() ),
                ];
        }else{
            $error = [
                'isOk' => false,
                'message' => __('Błąd pobierania danych. Spróbuj ponownie później'),
                'error' => $response->json(),
            ];

            Log::error( $error );

            return (object) $error;
        }
    }

    public function exec(){

        return Cache::remember('openWeatherMapAPI', $this->cacheTime , function () {
                    return $this->api();
        });

    }

}
