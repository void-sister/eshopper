<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        $emailValidation = auth()->user() ? 'required|email' : 'required|email|unique:users';


        return [
            'email' => $emailValidation,
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required',
            // 'zip' => 'required',
            'phone' => 'required|min:12|numeric',
        ];
    }

    public function messages()
    {
      return [
        'email.unique' => 'You already have account with this email address. Please <a href="/login">log in</a> to continue.',
      ];
    }
}
