<?php

namespace App\Http\Requests\Api\V1\Item;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
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
            'room_id' => 'integer',
            'code' => 'required|unique:items',
            'name' => 'required|max:50',
            'brand' => 'required|max:20',
            'purchase_year' => 'required|max:15',
            'is_include_pc' => 'boolean',
            'is_include_monitor' => 'boolean',
            'is_include_keyboard' => 'boolean',
            'is_include_headset' => 'boolean',
            'origin' => 'required|max:50',
            'acceptance_year' => 'required|max:50',
            'quantity' => 'integer'
        ];
    }
}
