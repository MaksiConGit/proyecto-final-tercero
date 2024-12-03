<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePrincipalRequest extends FormRequest
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
            'dni' => ['required', 'string', 'max:255',Rule::unique('principals')->ignore($this->principal->id)],
            'phone' => 'required|string|max:14',
            'birthdate' => 'required|date|before:today',
            'city_id' => 'required|exists:cities,id',
            'user_id' => ['nullable', Rule::unique('principals')->ignore($this->principal->id)],
        ];
    }
}
