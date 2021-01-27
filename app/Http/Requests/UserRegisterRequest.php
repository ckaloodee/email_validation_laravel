<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            User::EMAIL => User::EMAIL_RULES
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'validation.email.failed',
            'email.required' => 'validation.email.failed',
            'email.rfc' => 'validation.email.failed',
            'email.filter' => 'validation.email.failed',
            'email.unique' => 'validation.email.failed',
            'email.my_valid_email' => 'validation.email.failed',
        ];
    }
}
