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
            'attendance_records' => 'required|array',
            'attendance_records.*.course_student_id' => 'required|exists:course_students,id',
            'attendance_records.*.has_attended' => 'required|boolean',
            'attendance_records.*.date' => 'required|date',
        ];
    }
    
}
