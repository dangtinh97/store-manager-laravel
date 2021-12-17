<?php

namespace App\Http\Requests;

use App\Http\Responses\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'dob' => 'required|date_format:Y-m-d|before:today',
            'gender' => [
                'required',Rule::in(['MALE', 'FEMALE']),
            ]
        ];
    }
}
