<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BannerRequest extends FormRequest
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
            'title' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:500',
            'link' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:50',
        ];

        if($this->method() == 'POST'){
            $rules += ['image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120']];
        }

        if($this->method() == 'PATCH'){
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
