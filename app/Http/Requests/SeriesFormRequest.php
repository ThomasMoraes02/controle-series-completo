<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
        ];
    }

    /**
     * Mensagens personalizadas de erro
     *
     * @return void
     */
    public function messages()
    {
        return [
            // 'name.*' => 'Mensagem padrão para todos os erros de nome',
            'name.required' => 'O campo nome é de preenchimento obrigatório',
            'name.min' => 'O campo nome deve ter pelo menos :min caracteres',
        ];
    }
}
