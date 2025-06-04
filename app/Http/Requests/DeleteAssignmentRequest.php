<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteAssignmentRequest extends FormRequest
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
            'machine_id' => 'required|exists:machines,id',
            'roadWork_id' => 'required|exists:road_works,id',
            'start_date' => 'required',
            'end_date' => 'required|date|after_or_equal:start_date',
            'kilometers_traveled' => 'required|numeric',
            'end_reason_id' => 'required|exists:end_reasons,id',
        ];
    }
}
