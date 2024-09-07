@props(['id' => null, 'label' => null, 'placeholder' => null, 'required' => false])
<div class="grid gap-2 w-full">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-900 dark:text-white">
        {{ $label }}
        @if ($required)
            <span class="text-red-600 dark:text-red-400">*</span>
        @endif
    </label>
    {{ $slot }}
</div>
