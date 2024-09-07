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

    'api_key' => env('OPENWEATHER_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | OpenWeather Weather API URL
    |--------------------------------------------------------------------------
    |
    | The URL to the OpenWeather Weather API.
    |
    */

    'weather_api_url' => env('OPENWEATHER_WEATHER_API_URL', 'https://api.openweathermap.org/data/3.0'),

    /*
    |--------------------------------------------------------------------------
    | OpenWeather Geocoding API URL
    |--------------------------------------------------------------------------
    |
    | The URL to the OpenWeather Geocoding API.
    |
    */

    'geocoding_api_url' => env('OPENWEATHER_GEOCODING_API_URL', 'https://api.openweathermap.org/geo/1.0'),

];
