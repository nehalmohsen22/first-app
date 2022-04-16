<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
                'title' => ['required' , 'unique:posts' , 'min:3'],
                'description'=>['required', 'min:10'],
              'post_creator'=> ['required','exists:users,id']
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
        'title.required' => 'A title is required',
        'title.unique' => 'title must be unique',
        'title.min' => 'please insert at least 3 chars',
        'description.required' => 'A description is required',
        'description.min' => 'please insert at least 10 chars',
    ];
}
}
