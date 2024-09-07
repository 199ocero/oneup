<?php

use App\Livewire\WeatherDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', WeatherDashboard::class);
