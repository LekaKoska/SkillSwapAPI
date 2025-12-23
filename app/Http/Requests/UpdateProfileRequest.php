<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'bio' => 'sometimes|nullable|min:3',
            'state' => 'sometimes|nullable|string|min:2',
            'years_of_experience' => 'sometimes|nullable|int|min:1'
        ];
    }
}
