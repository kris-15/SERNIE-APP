<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEcoleRequest extends FormRequest
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
            'denomination'=>['string', 'required', 'min:3'],
            'nom'=>['string', 'required', 'min:3'],
            'type'=>['string', 'required', 'min:3'],
            'adresse'=>['string', 'required', 'min:3'],
            'directeur_id'=>['int', 'required']
        ];
    }
}
