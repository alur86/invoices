<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFormRequest extends FormRequest
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
             'name' =>  'min:6|required',
             'email' => 'required|email',
             'password' => 'min:6|required', 
             'password_confirmation' => 'min:6|same:password'
        
        ];
    }
}
