<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //modificar para true
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
            'name' => 'required|min:3|max:60',
            'email' => [
                'required',
                'email',
                'max:60',
                'unique:users'
            ],
            'password' => [
                'sometimes',
                'required',
                'min:6',
                'max:100',
            ],

        ];
        if($this->method() === 'PATCH' || $this->method() === 'PUT'){

            $rules['password'] = [
                    'sometimes',
                    'nullable',
                    'max:60',
                    //"unique:users,email,{$this->id},id"
                    Rule::unique('users')->ignore($this->id)//Mesma validação da linha acima
            ];

            $rules['email'] = [
                'required',
                'email',
                'min:6',
                'max:100',
        ]   ;
        }

        return $rules;
    }
}
