<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Geocoding implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value) || ! preg_match('/^[^,]+,\s*[A-Z]{2}$/', $value)) {
            $fail('The :attribute must be in the format "City, CountryCode" (e.g., "London, GB").');
        }
    }
}
