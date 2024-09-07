<?php

namespace App\Livewire;

use App\Enums\OpenWeatherApiTypes;
use App\Http\Integrations\OpenWeather\OpenWeatherConnector;
use App\Http\Integrations\OpenWeather\Requests\GetDirectGeocoding;
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

            $this->dispatch('set-weather', [
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]);
        } else {
            $this->addError('location', 'The location could not be found. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.weather-location');
    }
}
