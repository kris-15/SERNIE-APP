<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClasseRequest extends FormRequest
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
            'cycle' =>['required', 'string'],
            // 'salle_maternel' =>['string'],
            // 'niveau_maternel' =>['integer', 'min:1', 'max:3'],
            // 'salle_primaire' =>['string'],
            // 'niveau_primaire' =>['integer', 'min:1', 'max:6'],
            // 'indice_primaire' =>['string', 'nullable'],
            // 'salle_secondaire' =>['string'],
            // 'niveau_secondaire' =>['integer', 'min:7', 'max:8'],
            // 'indice_secondaire' =>['string', 'nullable'],
            // 'salle_humanite' =>['string'],
            // 'niveau_humanite' =>['integer', 'min:1', 'max:4'],
            // 'section' =>['integer'],
        ];
    }
}
