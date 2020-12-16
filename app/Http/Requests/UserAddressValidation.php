<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpace;
use Illuminate\Foundation\Http\FormRequest;

class UserAddressValidation extends FormRequest
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
        if ($this->isMethod('post')) {

            $rules = [
                'title' => ['required', 'min:5', 'max:100', 'unique:user_addresses'],
                'name' => ['required', 'min:5', 'max:100', 'unique:user_addresses'],
                'email' => ['required', 'email'],
                'phone' => ['required', 'starts_with:0'],
                'street_address' => ['required'],
                'kelurahan' => ['required', 'min:3', 'max:50'],
                'kecamatan' => ['required', 'min:3', 'max:50'],
                'city' => ['required', new AlphaSpace],
                'province_id' => ['required', 'numeric'],
                'postal_code' => ['required', 'numeric'],
                'is_main_address' => ['required', 'boolean']
            ];
        } else {
            $rules = [
                'title' => ['required', 'min:5', 'max:100'],
                'name' => ['required', 'min:5', 'max:100'],
                'email' => ['required', 'email'],
                'phone' => ['required', 'starts_with:0'],
                'street_address' => ['required'],
                'kelurahan' => ['required', 'min:3', 'max:50'],
                'kecamatan' => ['required', 'min:3', 'max:50'],
                'city' => ['required', new AlphaSpace],
                'province_id' => ['required', 'numeric'],
                'postal_code' => ['required', 'numeric'],
                'is_main_address' => ['required', 'boolean']
            ];
        }
        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => 'You already have this address with this :attribute',
            'title.unique' => 'You already have this address with this :attribute',
            'street_address.unique' => 'You already have this address with this :attribute',
        ];
    }
}
