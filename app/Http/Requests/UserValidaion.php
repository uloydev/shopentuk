<?php

namespace App\Http\Requests;

use App\Rules\PhoneValidation;
use Illuminate\Foundation\Http\FormRequest;

class UserValidaion extends FormRequest
{

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'phone' => str_replace(' ', '', $this->phone),
        ]);
    }

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
            'name' => ['required', 'min:3', 'max:100', 'unique:users'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'unique:users', new PhoneValidation],
            'password' => ['required', 'min:8', 'confirmed']
        ];
    }
}
