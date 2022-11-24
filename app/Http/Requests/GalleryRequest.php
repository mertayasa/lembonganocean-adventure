<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class GalleryRequest extends FormRequest
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

    public function rules()
    {
        $rules = [
            'image' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120',
            'caption' => 'nullable|string|max:500'
        ];

        // if($this->method() == 'POST'){
        //     $rules += ['image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120']];
        // }

        // if($this->method() == 'PATCH'){
        //     $rules += ['image' => ['required_if:image_modified,true', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120']];
        // }

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
