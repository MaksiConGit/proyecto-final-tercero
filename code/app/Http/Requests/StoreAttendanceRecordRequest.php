<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRecordRequest extends FormRequest
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
            'date' => 'required|date',
            // Validar que attendance sea un array
            'attendance' => 'required|array',
            // Validar que cada clave dentro de attendance corresponda a un número (ID de curso)
            'attendance.*' => 'required|in:0,1', // Cada valor debe ser 0 o 1
        ];
    }
}
