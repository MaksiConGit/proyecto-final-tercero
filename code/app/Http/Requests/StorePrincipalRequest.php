<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrincipalRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:255',
            'lastname' => 'required|string|min:2|max:255',
            'dni' => 'required|string|max:255|unique:principals,dni',
            'phone' => 'required|string|max:14',
            'birthdate' => 'required|date|before:today',
            'city_id' => 'required|exists:cities,id',
            'instituciones' => 'required|array|min:1', // El campo debe ser un arreglo y tener al menos un valor
            'instituciones.*' => 'exists:institutions,id', // Cada valor dentro del arreglo debe ser un ID válido en la tabla
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'dni' => str_replace([' ', '.'], '', $this->dni),
            'phone' => preg_replace('/[^\d]/', '', $this->phone),
            'email' => str_replace(' ', '', trim($this->email)),
        ]);
    }
}
