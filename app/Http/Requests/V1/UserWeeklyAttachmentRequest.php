<?php

namespace App\Http\Requests\V1;

use App\Models\V1\UserWeeklyAttachment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserWeeklyAttachmentRequest extends FormRequest
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
            'user_id' => [
                'sometimes',
                'required',
                'exists:users,id',
                Rule::prohibitedIf(UserWeeklyAttachment::where('user_id', request()->user_id)
                    ->where('week_number', request()->week_number)
                    ->exists())
            ],
            'weight' => 'required|integer',
            'description' => 'nullable|max:255',
            'week_number' => 'required|in:1,2,3,4,5,6,7'
        ];
    }
}
