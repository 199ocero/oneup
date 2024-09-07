<x-fieldset title="Weather Information">
    <div class="w-full" wire:key="{{ rand() }}">
        <div class="grid gap-5 mt-2 grid-col-1 md:grid-cols-2 lg:grid-cols-4">
            <x-card class="p-4 bg-gradient-to-br from-blue-400 to-blue-600 text-white !border-none">
                <div wire:loading.class="opacity-50">
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
                </div>
                <div wire:loading class="flex justify-center items-center h-full">
                    <x-loading />
                </div>
            </x-card>
            <x-card class="p-4 bg-gradient-to-br from-indigo-400 to-indigo-600 text-white !border-none">
                <div wire:loading.class="opacity-50">
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
                </div>
                <div wire:loading class="flex justify-center items-center h-full">
                    <x-loading />
                </div>
            </x-card>
            <x-card class="p-4 bg-gradient-to-br from-green-400 to-green-600 text-white !border-none">
                <div wire:loading.class="opacity-50">
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
                </div>
                <div wire:loading class="flex justify-center items-center h-full">
                    <x-loading />
                </div>
            </x-card>
            <x-card class="p-4 bg-gradient-to-br from-orange-400 to-orange-600 text-white !border-none">
                <div wire:loading.class="opacity-50">
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
                </div>
                <div wire:loading class="flex justify-center items-center h-full">
                    <x-loading />
                </div>
            </x-card>
        </div>
        <div class="mt-5 w-full" x-data="{
            weeklyTemperature: $wire.entangle('weeklyTemperature'),
            weeklyDates: $wire.entangle('weeklyDates'),
            chart: null,
            initChart() {
                try {
                    const options = {
                        chart: {
                            type: 'area',
                            height: 350
                        },
                        zoom: {
                            enabled: false
                        },
                        series: [{
                            name: 'Temperature',
                            data: this.weeklyTemperature
                        }],
                        xaxis: {
                            categories: this.weeklyDates
                        },
                        yaxis: {
                            title: {
                                text: 'Temperature (°C)'
                            }
                        }
                    };
                    this.chart = new ApexCharts(this.$refs.chartDiv, options);
                    this.chart.render();
                } catch (error) {}
            },
            updateChart() {
                if (this.chart) {
                    try {
                        this.chart.updateOptions({
                            series: [{
                                name: 'Temperature',
                                data: this.weeklyTemperature
                            }],
                            xaxis: {
                                categories: this.weeklyDates
                            }
                        });
                    } catch (error) {}
                } else {
                    this.initChart();
                }
            }
        }" x-init="$nextTick(() => {
            initChart();
            $watch('weeklyTemperature', value => {
                updateChart();
            });
            $watch('weeklyDates', value => {
                updateChart();
            });
        });">
            <div x-ref="chartDiv"
                class="p-5 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg dark:from-gray-800 dark:to-gray-900">
            </div>
        </div>
    </div>
</x-fieldset>
