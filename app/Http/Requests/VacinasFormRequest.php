<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacinasFormRequest extends FormRequest
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
            'rotulo' => 'required|min:2',
            'dataAplicacao' => 'required|min:10',
            'dataProximaAplicacao' => 'required|min:10'
        ];
    }

    public function messages () {
        return [
            'rotulo.required' => 'O campo Rótulo é obrigatório.',
            'rotulo.min' => 'O campo Rótulo precisa ter pelo menos dois caracteres.',
            'dataAplicacao.required' => 'O campo Data da Aplicação é obrigatório.',
            'dataAplicacao.min' => 'O campo Data da Aplicação precisa ter pelo menos 10 caracteres, sendo dd/mm/aaaa.',
            'dataProximaAplicacao.required' => 'O campo Data da Próxima Aplicação é obrigatório!',
            'dataProximaAplicacao.min' => 'O campo Data da Próxima Aplicação precisa ter pelo menos 10 caracteres, sendo dd/mm/aaaa.',
        ];
    }
}
