<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlantasRequest extends FormRequest
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
            'id' => 'required|integer|exists:plantas,id',
            'Espécie' => 'required|string|max:250',
            'Tipo' => 'required|string|max:10000',
            'Porte' => 'required',
            'Foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
