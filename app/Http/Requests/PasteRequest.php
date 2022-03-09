<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasteRequest extends FormRequest
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
            'title' => 'max:120|nullable',
            'author' => 'max:120|nullable',
            'password' => 'max:128|nullable',
            'content' => 'max:65523|required',
        ];
    }
}
