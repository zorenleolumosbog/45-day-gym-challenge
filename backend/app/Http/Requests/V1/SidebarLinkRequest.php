<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class SidebarLinkRequest extends FormRequest
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
            'title' => 'sometimes|required|max:255',
            'link' => 'sometimes|required|max:255',
            'bg_color' => 'sometimes|required|max:255',
            'file_icon' => 'sometimes|required|image|mimes:jpg,jpeg,png|max:5120', // limit 5mb
        ];
    }
}
