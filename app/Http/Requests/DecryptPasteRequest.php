<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DecryptPasteRequest extends FormRequest
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
        return [
            'content' => 'required',
            'key' => 'required|min:64|max:64',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'content.required' => 'Content is required',
            'key.required' => 'A key is required',
            'key.min' => 'A key should be min 64 digits',
        ];
    }
}
