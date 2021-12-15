<?php

namespace App\Http\Requests;

use App\Http\Responses\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class ContractStoreRequest extends ApiFormRequest
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
            'name_contract' => 'required',
            'number_contract' => 'required',
            'effective_date' => 'required|date_format:Y-m-d|after:yesterday',
            'expiration_date' => 'required|date_format:Y-m-d|after:effective_date',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'quantity' => 'required|numeric|min:1'
        ];
    }
}
