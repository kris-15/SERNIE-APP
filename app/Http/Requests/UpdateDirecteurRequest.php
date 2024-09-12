<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDirecteurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom'=>['string', 'min:3', 'max:25', 'required'],
            'prenom'=>['string', 'min:3', 'max:25', 'required'],
            'username'=>['string', 'min:3', 'max:25', 'required'],
            'telephone'=>['string', 'min:9', 'max:15', 'required'],
            'code'=>['string',]
        ];
    }
}
