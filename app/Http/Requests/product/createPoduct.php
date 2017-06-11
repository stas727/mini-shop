<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class createPoduct extends FormRequest
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
           'name' => 'required|max:255',
           'description' => 'required',
           'price' => 'required|integer',
           'ram' => 'required|integer',
           'storage' => 'required|integer',
           'operation_system' => 'required'
        ];
    }
}
