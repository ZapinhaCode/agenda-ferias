<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use Carbon\Carbon;

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

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'titulo.required' => 'O título é obrigatório.',
            'data_inicio.required' => 'A data de início é obrigatória.',
            'data_retorno.required' => 'A data de retorno é obrigatória.',
            'data_retorno.after_or_equal' => 'A data de retorno deve ser igual ou posterior à data de início.',
            'status.in' => 'O status selecionado é inválido.',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $dataInicio = Carbon::parse($this->data_inicio);
            $dataRetorno = Carbon::parse($this->data_retorno);

            $feriados = [
                '01-01', // Ano Novo
                '03-29', // Pascoa
                '04-21', // Tiradentes 
                '05-01', // Dia do trabalhador
                '09-07', // Independencia do Brasil
                '10-12', // Dia das crianças
                '11-02', // Finados
                '11-15', // Proclamaçao da republica
                '12-25', // Natal
            ];

            // Verifica se a data de início é um final de semana ou feriado
            if ($this->isWeekendOrHoliday($dataInicio, $feriados)) {
                $validator->errors()->add('data_inicio', 'A data de início não pode ser um final de semana ou feriado.');
            }

            // Verifica se a data de retorno é um final de semana ou feriado
            if ($this->isWeekendOrHoliday($dataRetorno, $feriados)) {
                $validator->errors()->add('data_retorno', 'A data de retorno não pode  ser um final de semana ou feriado.');
            }
        });
    }

    /**
     * Verifica se uma data é um final de semana ou feriado.
     *
     * @param  array  $holidays
     * @return bool
     */
    protected function isWeekendOrHoliday(Carbon $date, array $holidays): bool
    {
        return $date->isWeekend() || in_array($date->format('m-d'), $holidays);
    }
}
