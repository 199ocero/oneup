<div class="p-5 w-full">
    <div class="flex justify-between items-center">
        <p class="text-xl font-bold text-gray-900 dark:text-white">Weather Dashboard 🌦️</p>
        <x-theme-toggle />
    </div>
    <div class="grid gap-10 mt-10">
        <livewire:weather-location />
        <livewire:weather-information />
    </div>
</div>
