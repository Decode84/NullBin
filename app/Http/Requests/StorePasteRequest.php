<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasteRequest extends FormRequest
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
            'content' => 'max:65523|required',
            // 'language' => 'required|exists:languages,id',
            // 'expiration' => 'required|in:never,5min,10min,1hour,1day,1week,1month,1year',
            // 'visibility' => 'required|in:public,unlisted,private',
        ];
    }
}
