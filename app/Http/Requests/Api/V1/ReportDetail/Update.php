<?php

namespace App\Http\Requests\Api\V1\Room;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
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
            'report_id' => 'integer',
            'item_id' => 'integer',
            'status' => Rule::unique('typereports')->ignore($this->typereport, 'id'),
            'note' => Rule::unique('typereports')->ignore($this->typereport, 'id')
        ];
    }
}
