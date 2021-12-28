<?php

namespace App\Http\Requests;

use App\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:250',
            'gate' => 'required|string|max:250'
        ];

        if ($this->isMethod('POST')) {
            $rules = array_merge($rules, [
                'password' => ['required', 'confirmed', 'string', 'max:250', new Password],
                'username' => ['required', 'string', 'max:250', 'min:3', 'unique:users,username'],
            ]);
        }

        if ($this->isMethod('PUT')) {
            $rules = array_merge($rules, [
                'username' => [
                    'required', 'string', 'max:250', 'min:3',
                    Rule::unique('users', 'username')->ignore($this->user),
                ],
            ]);
            if ($this->filled('password')) {
                $rules = array_merge($rules, [
                    'password' => ['required', 'confirmed', 'string', 'max:250', new Password],
                ]);
            }
        }

        return $rules;
    }
}
