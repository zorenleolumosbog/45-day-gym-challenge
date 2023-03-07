<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'telegram_link_id' => 'nullable|exists:telegram_links,id',
            'name' => 'sometimes|required|max:255',
            'email' => 'sometimes|required_with:password|unique:users|max:255',
            'password' => 'sometimes|required_with:email|confirmed|min:8|max:255',
            'is_admin' => 'nullable',
            'telegram_link_url' => 'nullable',
        ];
    }
}
