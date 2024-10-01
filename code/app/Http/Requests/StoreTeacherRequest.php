<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>  'required|string|min:2|max:255',
            'lastname' => 'required|string|min:2|max:255',
            'dni' => 'required|string|max:255|unique',
            'phone' => 'required|string|max:14',
            'birthdate' => 'required|date|before:today',
            'city_id' => 'required|exists:cities,id',
            'user_id' => 'required|exists:users,id',
            'is_deleted' => 'boolean'
        ];
    }
}
