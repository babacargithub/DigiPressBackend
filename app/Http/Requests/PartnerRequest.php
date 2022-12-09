<?php

namespace App\Http\Requests;

use App\Policies\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PartnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        return [
//             'nom' => 'required|min:5|max:255',
//             'email' => 'required|email|unique:partners',
//            'telephone'=>['required','unique:partners','integer', new PhoneNumber()]
//        ];
        return [
            'nom' => [
                'required',
                'min:3'
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('partners')->ignore($this->id),
            ],
            'telephone' => [
                'required',
                Rule::unique('partners')->ignore($this->id),
                new PhoneNumber()
            ],
            //
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
