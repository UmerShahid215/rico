<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ManagerRequest extends FormRequest
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
        $rules =  [
            'f_name' => ['required'],
            'l_name' => ['required'],
            'profile_picture' => ['nullable', 'image'],
            'cninc' => ['nullable', 'string'],
            'phone_number' => ['nullable', 'string'],
            'dob' => ['nullable', 'string'],
        ];

        if (is_null($this->semi_admin)) {
            $rules['password'] = ['required', 'string', 'confirmed', 'min:6'];
            $rules['email']  = ['required', 'email', 'unique:users,email',];
        } else {
            $rules['email'] = ['required', 'email', Rule::unique('users')->ignore($this->semi_admin->id),];
        }


        return $rules;
    }
}
