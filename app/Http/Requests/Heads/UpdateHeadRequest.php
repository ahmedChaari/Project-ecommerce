<?php

namespace App\Http\Requests\Heads;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHeadRequest extends FormRequest
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
            'email'        =>'required',
            'tel'          =>'required',
            'Adress'       =>'nullable',
            'colorHead'    =>'nullable',  
            'colorStyle'   =>'nullable',
            'colorNav'     =>'nullable',
            'colorStyleNav'=>'nullable',
            'fontSizeNav'  =>'nullable',
            'fontSizeHead' =>'nullable',
            'image'        =>'nullable|image',
        ];
    }
}
