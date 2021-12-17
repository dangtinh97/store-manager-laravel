<?php

namespace App\Http\Requests;

use App\Http\Responses\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUpdateRequest extends ApiFormRequest
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
            'mobile' => ["required","regex:/^(0|84|\+84){1}+(3|5|8|7|9){1}+[0-9]{8}+$/mi"],
            'address' => 'required',
            'dob' => 'required|date_format:Y-m-d|before:today',
            'password' => 'nullable|string|min:5',
            'type' => 'required|string',
            'gender' => [
                'required',Rule::in(['MALE', 'FEMALE']),
            ]
        ];
    }
}
