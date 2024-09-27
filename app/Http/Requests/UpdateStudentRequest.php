<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
        $studentId = $this->route('student');
        return [
            'full_name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:students,code,' . $studentId,
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:students,email,' . $studentId, 
            'level_id' => 'required|exists:levels,id',
        ];
    }
}
