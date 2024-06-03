<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetorRequest extends FormRequest
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
    public function rules() {
        return [
            'nome' => 'required|string|max:255',
            'gerente_user_id' => 'nullable|exists:usuario,id',
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O nome do setor é obrigatório.',
            'nome.string' => 'O nome do setor deve ser uma string.',
            'nome.max' => 'O nome do setor não pode ter mais de 255 caracteres.',
            'gerente_user_id.exists' => 'O gerente selecionado não é válido.',
        ];
    }
}
