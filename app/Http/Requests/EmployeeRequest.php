<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class EmployeeRequest extends FormRequest
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
            'parent_id' => ['required', 'exists:users,id'],
        ];

        if (is_null($this->employee)) {
            $rules['password'] = ['required', 'string', 'confirmed', 'min:6'];
            $rules['email']  = ['required', 'email', 'unique:users,email',];
        } else {
            $rules['email'] = ['required', 'email', Rule::unique('users')->ignore($this->employee->id),];
        }

        return $rules;
    }
}
