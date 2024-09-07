<?php

namespace App\Enums;

enum OpenWeatherApiTypes: string
{
    case Weather = 'weather';
    case Geocoding = 'geocoding';
}
