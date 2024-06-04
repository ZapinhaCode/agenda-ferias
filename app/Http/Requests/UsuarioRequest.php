<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|size:14',
            'rg' => 'required|string|max:10',
            'sexo' => 'required|in:MASCULINO,FEMININO',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string|max:15',
            'cargo_id' => 'required|exists:cargo,id',
            'setor_id' => 'required|exists:setores,id',
            'endereco' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'estado_id' => 'required|exists:estado,id',
            'cidade_id' => 'required|exists:cidade,id',
        ];            
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais que 255 caracteres.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.size' => 'O CPF deve ter 14 caracteres.',
            'cpf.cpf' => 'O CPF informado não é válido.',
            'rg.required' => 'O campo RG é obrigatório.',
            'rg.max' => 'O RG não pode ter mais que 10 caracteres.',
            'sexo.required' => 'O campo sexo é obrigatório.',
            'sexo.in' => 'O sexo deve ser masculino ou feminino.',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.max' => 'O telefone não pode ter mais que 15 caracteres.',
            'cargo_id.required' => 'O campo cargo é obrigatório.',
            'cargo_id.exists' => 'O cargo selecionado não é válido.',
            'setor_id.required' => 'O campo setor é obrigatório.',
            'setor_id.exists' => 'O setor selecionado não é válido.',
            'endereco.required' => 'O campo endereço é obrigatório.',
            'endereco.max' => 'O endereço não pode ter mais que 255 caracteres.',
            'bairro.required' => 'O campo bairro é obrigatório.',
            'bairro.max' => 'O bairro não pode ter mais que 255 caracteres.',
            'numero.required' => 'O campo número é obrigatório.',
            'numero.max' => 'O número não pode ter mais que 10 caracteres.',
            'complemento.max' => 'O complemento não pode ter mais que 255 caracteres.',
            'estado_id.required' => 'O campo estado é obrigatório.',
            'estado_id.exists' => 'O estado selecionado não é válido.',
            'cidade_id.required' => 'O campo cidade é obrigatório.',
            'cidade_id.exists' => 'A cidade selecionada não é válida.',
        ];
    }
}
