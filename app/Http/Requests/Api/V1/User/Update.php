<?php

namespace App\Http\Requests\Api\V1\User;

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
            'name' => 'required',
            'email' => Rule::unique('users')->ignore($this->user, 'id'),
            'password' => 'required|min:8',
            'role' => 'required',
            'phone' => 'required|min:10|max:15',
            'address' => 'required'
        ];
    }

    protected function getValidatorInstance()
    {
        $data = $this->all();
        if (!is_null($this->password) && $this->password !== null) {
            $data['password'] = Hash::make($this->password);
        } else {
            unset($data['password']);
        }
        $this->getInputSource()->replace($data);
        return parent::getValidatorInstance();
    }
}
