<?php

namespace App\Http\Requests\Works;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorksRequest extends FormRequest
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
            'name'=>'required',
            'title'=>'required',
            'location'=>'required',
            'description'=>'required|min:20',
            'image'=>'required|mimes:jpeg,png.jpg|max:3000',
            'link'=>'required',
            'contact'=>'required'
        ];
    }
}
