<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordRequirement implements Rule
{
    public function passes($attribute, $value)
    {
        
        return preg_match('/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+])[A-Za-z0-9!@#$%^&*()_+]{8,}$/', $value);
    }

    public function message()
    {
        return 'The :attribute must contain at least one alphabet, one special character, and one number.';
    }
}
