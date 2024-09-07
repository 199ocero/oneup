<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class WeatherDashboard extends Component
{
    public function getWeather() {}

    #[Title('Weather Dashboard')]
    public function render()
    {
        return view('livewire.weather-dashboard');
    }
}
