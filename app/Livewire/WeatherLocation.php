<?php

namespace App\Livewire;

use App\Enums\OpenWeatherApiTypes;
use App\Http\Integrations\OpenWeather\OpenWeatherConnector;
use App\Http\Integrations\OpenWeather\Requests\GetDirectGeocoding;
use App\Http\Integrations\OpenWeather\Requests\GetWeather;
use App\Rules\Geocoding;
use Livewire\Component;

class WeatherLocation extends Component
{
    public string $location;

    public function getWeather()
    {
        $this->resetValidation();

        $this->validate([
            'location' => ['required', 'string', new Geocoding],
        ]);

        $location = explode(',', $this->location);
        $cityName = trim($location[0]);
        $countryCode = trim($location[1]);

        /**
         * OpenWeather's Weather API requires geographical coordinates (latitude and longitude)
         * to fetch weather data. However, our user input is in the format of "City, CountryCode".
         *
         * To bridge this gap, we first use OpenWeather's Geocoding API to convert the
         * user-provided location into precise geographical coordinates. This two-step process
         * allows us to:
         *
         * 1. Validate and standardize the user input through the Geocoding API.
         * 2. Obtain the exact latitude and longitude for the specified location.
         * 3. Use these coordinates to fetch accurate weather data from the Weather API.
         *
         * This approach ensures we get the most relevant and accurate weather information
         * for the user's requested location, even if there are multiple cities with the same name
         * in different countries.
         */
        $openWeatherConnector = new OpenWeatherConnector(OpenWeatherApiTypes::Geocoding);
        $geocodingResponse = $openWeatherConnector->send(new GetDirectGeocoding(
            $cityName,
            $countryCode,
            config('openweather.api_key')
        ));

        $geocoding = $geocodingResponse->json();

        if (! empty($geocoding) && isset($geocoding[0])) {
            $latitude = $geocoding[0]['lat'];
            $longitude = $geocoding[0]['lon'];

            /**
             * Now that we have obtained the precise geographical coordinates (latitude and longitude)
             * for the user-specified location, we can proceed to fetch the current weather information.
             *
             * We'll use these coordinates with the OpenWeather Weather API to retrieve accurate
             * and up-to-date weather data for the exact location the user requested.
             *
             * This two-step process (geocoding followed by weather data retrieval) ensures
             * we provide the most relevant and location-specific weather information possible.
             */
            $openWeatherConnector = new OpenWeatherConnector(OpenWeatherApiTypes::Weather);
            $weatherResponse = $openWeatherConnector->send(new GetWeather(
                $latitude,
                $longitude,
                config('openweather.api_key')
            ));

            $this->dispatch('set-weather', $weatherResponse->json());
        } else {
            $this->addError('location', 'The location could not be found. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.weather-location');
    }
}
