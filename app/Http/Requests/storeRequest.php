<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Name'=>'required|max:1000|string',
            'file'=>'required|mimes:jpg,gif,png'
        ];
    }

    public function messages()
    {
        return [

            'file.*'=>'فایل عکس باید فرمت gif,jpeg,png باشد'
        ];

    }
}