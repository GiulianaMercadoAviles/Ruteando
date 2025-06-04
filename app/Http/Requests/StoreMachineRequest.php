<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMachineRequest extends FormRequest
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
            'serial_number' => 'required|string|max:255|unique:machines,serial_number',
            'type_machine_id' => 'required|integer|exists:types_machines,id',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'current_kilometers' => 'required|numeric|min:0',
            'maintenance_kilometers_limit' => 'required|numeric|min:0',
        ];
    }
}
