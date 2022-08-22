<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|unique:subscriptions_mail,email',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Вы уже подписаны',
        ];
    }
}
