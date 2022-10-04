<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules = [
            'category_id' => [
                'required',
                'integer'
            ],
            'title' => [
                'required',
                'string'
                
            ],
            'slug' => [
                'required',
                'string'    
            ],
            'description' => [
                'required',
            ],
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png'
            ],
            'status' => [
                'nullable'    
                
            ],
        ];
        return $rules;
    }
}
