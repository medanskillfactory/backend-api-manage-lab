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
            'code' => Rule::unique('rooms')->ignore($this->room, 'id'),
            'name' => 'required|max:50',
            'description' => 'required|max:200'
        ];
    }
}
