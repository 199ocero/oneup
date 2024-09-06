<?php

return [

    /*
    |--------------------------------------------------------------------------
    | OpenWeather API Key
    |--------------------------------------------------------------------------
    |
    | Your OpenWeather API key.
    |
    */

    'key' => env('OPENWEATHER_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | OpenWeather API URL
    |--------------------------------------------------------------------------
    |
    | The URL to the OpenWeather API.
    |
    */

    'url' => env('OPENWEATHER_API_URL', 'https://api.openweathermap.org/data/3.0'),

];
