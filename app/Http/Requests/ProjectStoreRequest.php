<?php

namespace App\Http\Requests;

use App\Http\Responses\ApiFormRequest;
use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectStoreRequest extends ApiFormRequest
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
            'name_project' => 'required',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:100000',
            'status' => [Rule::in(Project::STATUS_NEW,Project::STATUS_ACTIVE,Project::STATUS_COMPLETED)]
        ];
    }
}
