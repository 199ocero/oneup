<x-fieldset title="Weather Information">
    <div class="grid gap-5 mt-2 grid-col-1 md:grid-cols-2 lg:grid-cols-4">
        <x-card class="p-4 bg-gradient-to-br from-blue-400 to-blue-600 text-white !border-none">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm font-semibold">Current Temperature</p>
                    <p class="mt-2 text-3xl font-bold">{{ $currenTemperature ?? '--' }}°C</p>
                </div>
                <div class="text-5xl">
                    @if (isset($currenTemperature))
                        @if ($currenTemperature > 25)
                            🌞
                        @elseif($currenTemperature > 15 && $currenTemperature <= 25)
                            🌤️
                        @else
                            ❄️
                        @endif
                    @else
                        🌡️
                    @endif
                </div>
            </div>
            <p class="mt-4 text-xs">Feels like: {{ $feelsLike ?? '--' }}°C</p>
        </x-card>
        <x-card class="p-4 bg-gradient-to-br from-indigo-400 to-indigo-600 text-white !border-none">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm font-semibold">Precipitation</p>
                    <p class="mt-2 text-3xl font-bold">{{ $precipitation ?? '--' }}%</p>
                </div>
                <div class="text-5xl">
                    @if (isset($precipitation))
                        @if ($precipitation > 70)
                            🌧️
                        @elseif($precipitation > 30)
                            🌦️
                        @else
                            ☀️
                        @endif
                    @else
                        ☔
                    @endif
                </div>
            </div>
            <p class="mt-4 text-xs">Chance of rain today</p>
        </x-card>
        <x-card class="p-4 bg-gradient-to-br from-green-400 to-green-600 text-white !border-none">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm font-semibold">Humidity</p>
                    <p class="mt-2 text-3xl font-bold">{{ $humidity ?? '--' }}%</p>
                </div>
                <div class="text-5xl">
                    @if (isset($humidity))
                        @if ($humidity > 70)
                            💧
                        @elseif($humidity > 30)
                            💦
                        @else
                            🏜️
                        @endif
                    @else
                        💨
                    @endif
                </div>
            </div>
            <p class="mt-4 text-xs">Current humidity level</p>
        </x-card>
        <x-card class="p-4 bg-gradient-to-br from-orange-400 to-orange-600 text-white !border-none">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm font-semibold">Sunset & Sunrise</p>
                    <p class="mt-2 text-xl font-bold">🌅 {{ $sunrise ?? '--' }}</p>
                    <p class="text-xl font-bold">🌇 {{ $sunset ?? '--' }}</p>
                </div>
                <div class="text-5xl">
                    @if (isset($isDay))
                        {{ $isDay ? '☀️' : '🌙' }}
                    @else
                        🌓
                    @endif
                </div>
            </div>
            <p class="mt-4 text-xs">Current sun cycle</p>
        </x-card>
    </div>
</x-fieldset>
