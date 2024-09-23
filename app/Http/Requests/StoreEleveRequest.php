<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEleveRequest extends FormRequest
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
            'nom'=>['required','string', 'min:3', 'max:30'],
            'postnom'=>['required','string', 'min:3', 'max:30'],
            'prenom'=>['required','string', 'min:3', 'max:30'],
            'lieu'=>['required','string', 'min:3', 'max:30'],
            'date_naissance'=>['required','date'],
            'adresse'=>['required','string', 'min:8', 'max:127'],
            'matricule'=>['required','string', 'min:3', 'max:10'],
            'classe_id'=>['required', 'integer'],
            'annee_scolaire_id'=>['required', 'integer',]
        ];
    }
}
