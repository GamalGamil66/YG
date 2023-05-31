<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCitizen extends FormRequest
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
            'ssn' => 'required|numeric|unique:managers,ssn,'.$this->id,
            'phone_number' => 'required|numeric',
            'delegate_id' => 'required',
            'no_of_males' => 'required|numeric',
            'no_of_females' => 'required|numeric',
            'state_of_house' => 'required',
            'card_no' => 'numeric',
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
            'delegate_id.required' => trans('validation.required'),
            'no_of_males.required' => trans('validation.required'),
            'no_of_females.required' => trans('validation.required'),
            'state_of_house.required' => trans('validation.required'),
            'card_no.numeric' => trans('validation.numeric'),
            'no_of_females.numeric' => trans('validation.numeric'),
            'no_of_males.numeric' => trans('validation.numeric'),
            'phone_number.numeric' => trans('validation.numeric'),
            'ssn.numeric' => trans('validation.numeric'),
        ];
    }
}
