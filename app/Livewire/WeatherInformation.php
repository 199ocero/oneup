<?php

namespace App\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class WeatherInformation extends Component
{
    public ?string $currenTemperature = null;

    public ?string $feelsLike = null;

    public ?string $precipitation = null;

    public ?string $humidity = null;

    public ?string $sunrise = null;

    public ?string $sunset = null;

    public ?bool $isDay = null;

    #[On('set-weather')]
    public function setWeather(array $weather): void
    {
        $this->currenTemperature = round($weather['current']['temp'] - 273.15, 2);
        $this->feelsLike = round($weather['current']['feels_like'] - 273.15, 2);
        $this->precipitation = isset($weather['daily'][0]['pop']) ? round($weather['daily'][0]['pop'] * 100, 2) : null;
        $this->humidity = $weather['current']['humidity'];

        $timezone = $weather['timezone'];
        $sunriseTimestamp = $weather['current']['sunrise'];
        $sunsetTimestamp = $weather['current']['sunset'];
        $currentTimestamp = $weather['current']['dt'];

        $this->sunrise = Carbon::createFromTimestamp($sunriseTimestamp, $timezone)->format('h:i A');
        $this->sunset = Carbon::createFromTimestamp($sunsetTimestamp, $timezone)->format('h:i A');

        $currentTime = Carbon::createFromTimestamp($currentTimestamp, $timezone);
        $this->isDay = $currentTime->between(
            Carbon::createFromTimestamp($sunriseTimestamp, $timezone),
            Carbon::createFromTimestamp($sunsetTimestamp, $timezone)
        );
    }

    public function render()
    {
        return view('livewire.weather-information');
    }
}
