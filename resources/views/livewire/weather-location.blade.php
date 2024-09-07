<form wire:submit="getWeather">
    <div class="grid gap-2">
        <div class="flex gap-2 items-end">
            <x-input-wrapper id="location" label="Location" required>
                <x-input-field wire:model="location" placeholder="e.g. London, GB" id="location" required />
            </x-input-wrapper>
            <x-button type="submit" wire:loading.attr="disabled">Get Weather</x-button>
        </div>
        @error('location')
            <x-error-message>{{ $message }}</x-error-message>
        @enderror
        <x-helper-text>
            Enter a city name followed by a comma and the 2-letter country code (ISO 3166) for precise results.
            This format ensures you get accurate information for the specific city within the chosen country.
            For example: <span class="font-bold">"London, GB"</span> for London, United Kingdom or <span
                class="font-bold">"New York, US"</span> for New York, United States.
        </x-helper-text>
    </div>
</form>
