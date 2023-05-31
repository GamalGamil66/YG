<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDelegate extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required',
            'password' => 'required',
            'ssn' => 'required|unique:managers,ssn,'.$this->id,
            'phone_number' => 'required',
            'Aqel_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'ssn.unique' => trans('validation.unique'),
            'password.required' => trans('validation.required'),
            'ssn.required' => trans('validation.required'),
            'phone_number.required' => trans('validation.required'),
            'Aqel_id.required' => trans('validation.required'),
        ];
    }
}
