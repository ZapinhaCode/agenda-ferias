<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeriasRequest extends FormRequest
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
            'titulo' => 'required|string|max:255',
            'observacao' => 'nullable|string|max:255',
            'data_inicio' => 'required|date',
            'data_retorno' => 'required|date|after_or_equal:data_inicio',
            'local_ferias' => 'nullable|string|max:255',
            'status' => 'nullable|in:aprovado,pendente,recusado',
        ];
    }

    public function messages(): array {
        return [
            'titulo.required' => 'O título é obrigatório.',
            'data_inicio.required' => 'A data de início é obrigatória.',
            'data_retorno.required' => 'A data de retorno é obrigatória.',
            'data_retorno.after_or_equal' => 'A data de retorno deve ser igual ou posterior à data de início.',
            'status.in' => 'O status selecionado é inválido.',
        ];
    }
}
