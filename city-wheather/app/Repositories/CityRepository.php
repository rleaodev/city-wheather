<?php

namespace App\Repositories;

use App\Models\CityModel;
use Illuminate\Support\Facades\Cache;

class CityRepository extends Repository
{

    public function __construct()
    {
        $model = new CityModel;
        parent::__construct($model);
    }

    public function getCities()
    {
        return $this->getAllPaginatedRecords();
    }

    public function getDetail($id)
    {
        $city = $this->getById($id);
        $cityWheather = $this->getWheatherForecast($city->api_id);

        return ['data' => $city, 'cityWheather' => $cityWheather];
    }

    public function getWheatherForecast($apiId, $amountOfDays = 5)
    {
        if ($dataFromCache = $this->getFromCache($apiId)) {
            return $dataFromCache;
        }

        $url = implode('', [
            env('WHEATHER_API_ENDPOINT'),
            '?lang='.env('WHEATHER_API_DEFAULT_LANG'),
            '&APPID='.env('WHEATHER_API_KEY'),
            '&id='.$apiId, 
            '&units='.env('WHEATHER_API_DEFAULT_FORMAT'),
            '&cnt='.$amountOfDays
        ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);

        return Cache::remember('wheather_'.$apiId, 600, function () use($data) {
            return json_decode($data, true);
        });
    }

    private function getFromCache($apiId)
    {
        $key = 'wheather_'.$apiId;
        if (Cache::has($key)) {
            return Cache::get($key);
        }
    }
}