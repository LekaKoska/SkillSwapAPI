<?php

namespace App\Http\Requests;

use App\Rules\ValidLevelName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserSkillRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'skill_id' => 'required|exists:skills,id',
            'user_id' => 'required|exists:users,id',
            'level' => ['nullable', new ValidLevelName()]
        ];
    }
}
