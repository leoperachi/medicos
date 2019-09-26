<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnidadeRequest extends FormRequest
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
            'nome' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'cep' => 'required|numeric',
            'bairro' => 'required',
            'latitude' => 'nullable|between:0.0,99.99|min:21',
            'longitude' => 'nullable|between:0.0,99.99|min:21'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute precisa ser preenchido!',
            'numeric' => 'O campo :attribute é somente números.'
        ];
    }
    public function attributes()
    {
        return [
            
        ];
    }
}
