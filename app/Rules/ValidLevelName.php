<?php

namespace App\Rules;

use App\Enums\SkillLevel;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidLevelName implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach (SkillLevel::cases() as $skillLevel)
        {

            if($value === $skillLevel->value)
            {
               return;
            }
        }
        $fail("The $attribute must be valid type");
    }
}
