<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTccRequest extends FormRequest
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
            'titulo' => 'required|string|min:10|max:100',
            'paginas' => 'required|integer|min:1',
            'data' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'aluno' => 'required|string|min:5|max:100',
            'resumo' => 'required|string|min:10|max:300',
            'palavras_chave' => 'required|string|min:5|max:200',
            'pdf' => 'required|file|mimes:pdf|max:10240',
            'orientador' => 'required|exists:bancas,id',
            'banca_1' => 'required|exists:bancas,id|different:orientador',
            'banca_2' => 'required|exists:bancas,id|different:orientador|different:banca_1',
        ];
    }
}
