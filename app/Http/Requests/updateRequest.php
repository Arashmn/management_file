<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends storeRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
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