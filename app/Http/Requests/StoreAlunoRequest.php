<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:10','max:255'],
            'email' => ['bail','required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cpf' => ['bail', 'required', 'digits:11', 'cpf', 'unique:alunos'],
            'vinculo' => ['required'],
            'unidade' => ['required'],
            'cursos' => ['required'],
        ];
    }

    protected function prepareForValidation(){
        $cpfValue = isset($this->cpf) ? (string) $this->cpf : null;

        $this->merge([
            'cpf' => preg_replace('/[^0-9]/', '', $cpfValue ?? ''),
        ]);
    }

    public function messages(){
        return [
            'cpf.unique'    => 'O :attribute informado já está cadastrado para um aluno.',
            'cpf.cpf'       => 'O :attribute precisa ser um CPF válido.',
            'cpf.required'  => 'O campo :attribute é obrigatório.',
            'cpf.digits'    => 'O CPF deve conter exatamente 11 dígitos.',

            'name.required' => 'Por favor, preencha este campo.',
            'name.min'      => 'O nome deve ter no mínimo :min caracteres.',
            'name.max'      => 'O nome deve ter no máximo :max caracteres.',

            'email.required' => 'Por favor, preencha este campo.',
            'email.email'    => 'Por favor, preencha um email válido.',
            'email.unique'   => 'Este e-mail já está em uso.',

            'password.required'  => 'Por favor, digite uma senha.',
            'password.min'       => 'Por favor, digite uma senha com, no mínimo, 8 dígitos.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',

            'vinculo.required' => 'Por favor, selecione o tipo de vínculo.',
            'unidade.required' => 'Por favor, selecione a unidade acadêmica.',
            'cursos.required' => 'Por favor, selecione o seu curso.',
        ];
    }

}
