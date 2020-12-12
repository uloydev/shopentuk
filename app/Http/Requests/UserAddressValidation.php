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
        return [
            'title' => ['required', 'min:5', 'max:100'],
            'name' => ['required', 'min:5', 'max:100'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'digits_between:7,13', 'starts_with:0'],
            'street_address' => ['required', ''],
            'kelurahan' => ['required', 'min:5', 'max:50'],
            'kecamatan' => ['required', 'min:5', 'max:50'],
            'city' => ['required', new AlphaSpace],
            'province' => ['required', new AlphaSpace],
            'postal_code' => ['required', 'numeric'],
            'is_main_address' => ['required', 'boolean']
        ];
    }
}
