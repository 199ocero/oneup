<div class="p-5 w-full">
    <div class="flex justify-between items-center">
        <p class="text-xl font-bold text-gray-900 dark:text-white">Weather Dashboard 🌦️</p>
        <x-theme-toggle />
    </div>
    <div class="grid gap-10 mt-10">
        <livewire:weather-location />
        <x-fieldset title="Weather Information">
            <div class="grid gap-5 mt-2 grid-col-1 md:grid-cols-2 lg:grid-cols-4">
                <x-card>
                    <p class="text-sm dark:text-white">Today's Temperature</p>
                </x-card>
                <x-card>
                    <p class="text-sm dark:text-white">Precipitation</p>
                </x-card>
                <x-card>
                    <p class="text-sm dark:text-white">Humidity</p>
                </x-card>
                <x-card>
                    <p class="text-sm dark:text-white">Sunset & Sunrise</p>
                </x-card>
            </div>
        </x-fieldset>
    </div>
</div>
