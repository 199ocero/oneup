<?php

namespace App\Http\Integrations\OpenWeather;

use App\Enums\OpenWeatherApiTypes;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class OpenWeatherConnector extends Connector
{
    use AcceptsJson;

    public function __construct(
        public OpenWeatherApiTypes $type
    ) {}

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        if ($this->type === OpenWeatherApiTypes::Weather) {
            return config('openweather.weather_api_url');
        }

        if ($this->type === OpenWeatherApiTypes::Geocoding) {
            return config('openweather.geocoding_api_url');
        }

        throw new \Exception('Invalid OpenWeather API type');
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }
}
