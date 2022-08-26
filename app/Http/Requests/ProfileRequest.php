<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfileRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:255'],
        ];

        if($this->method() == 'PATCH') {
            if($this->password) {
                $rules['password'] = ['required', 'string', 'min:6', 'confirmed'];
            }
            $rules += ['email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id]];
        }

        if($this->method() == 'POST') {
            $rules += ['password' => ['required', 'string', 'min:6', 'confirmed']];
            $rules += ['email' => ['required', 'string', 'email', 'max:255', 'unique:users,email']];
        }

        return $rules;
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            response()->json([
                'message' => $validator->errors()
            ], 422)
        );
    }
}
