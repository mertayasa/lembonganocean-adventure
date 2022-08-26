<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PackageRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'price_start' => ['required', 'numeric'],
            'price_end' => ['nullable', 'numeric'],
            'short_description' => ['required', 'string', 'max:255'],
            'full_description' => ['required', 'string'],
        ];

        if($this->isMethod('POST')){
            $rules += ['image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120']];
        }

        if($this->isMethod('PATCH')){
            $rules += ['image' => ['required_if:image_modified,true', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120']];
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
